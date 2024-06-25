<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{

    // update UserDetails
    public function updateSettings(Request $request)
    {
        try {
            $user = Auth()->user();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not authenticated.'], 401);
            }

            $validatedData = $request->validate([
                'name' => 'nullable',
                'phone' => 'nullable',
                'city' => 'nullable',
                'country' => 'nullable',
                'language' => 'nullable',
                'old_password' => 'nullable',
                'confirm_password' => 'nullable',
                'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $user->name = $validatedData['name'];
            $user->phone = $validatedData['phone'];
            $user->city = $validatedData['city'];
            $user->country = $validatedData['country'];
            $user->language = $validatedData['language'];

            if (isset($validatedData['old_password'])) {
                if (Hash::check($validatedData['old_password'], $user->password)) {
                    $user->password = Hash::make($validatedData['confirm_password']);
                }
            }

            if ($request->hasFile('user_image')) {
                $image = $request->file('user_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/user_images', $imageName); // Adjust storage path as needed
                $user->user_image = 'storage/user_images/' . $imageName;
            }
            $user->save();

            return response()->json(['success' => true, 'message' => 'Profile Updated!', 'updated_data' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
    // get UserDetails
    public function getUserProfile()
    {
        try {
            $user = Auth()->user();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not authenticated.'], 401);
            }

            $userdata = [
                [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'phone' => $user->phone,
                    'city' => $user->city,
                    'country' => $user->country,
                    'language' => $user->language,
                    'user_image' => $user->user_image,
                ]
            ];

            return response()->json(['success' => true, 'message' => 'Data retrieved successfully!', 'userdata' => $userdata], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    public function register(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|in:teacher,admin,superAdmin,parent',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
                'password' => Hash::make($validatedData['password']),
            ]);

            $token = $user->createToken($request->email)->plainTextToken;
            session(['user_det' => [
                'user_id' => $user->id,
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
            ]]);
            return response()->json([
                'token' => $token,
                'success' => true,
                'user' => $user,
                'message' => 'Register successful',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
                'errors' => $e->validator->getMessageBag(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([

                'email' => "required",
                'password' => "required|string|min:8",
            ]);


            $user = User::where('email',  $request->email)->first();
            $role = $user->role;
            $name = $user->name;
            if ($user && Hash::check($request->password, $user->password)) {

                $token = $user->createToken($request->email)->plainTextToken;
                session(['user_det' => [
                    'user_id' => $user->id,
                    'name' => $name,
                    'email' => $validatedData['email'],
                    'role' =>  $role,
                ]]);
                session(['user_image' => [
                    'user_image' => $user['user_image'],

                ]]);
                $permissionData = json_decode($user['permission'], true);  // Decode JSON string to array
                session(['permissions' => $permissionData]);  // Store directly in the session

                return  response()->json([
                    'token' => $token,
                    'message' => 'login  Successful',
                    'success' => true,
                    'user' => $user,
                ],  200);
            } else {

                return response()->json([
                    'message' => 'Wrong credentials',
                    'success' => false,
                    'status' => 'eror',
                ], 422);
            }
        } catch (\Exception $eror) {

            return response()->json([
                'message' =>  'login failed',
                'success' => false,
                'error' => $eror->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json([
                'message' =>  'logout successfully',
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  'logout faild',
                'success' => false,
                'eror' => $e->getMessage(),
            ],  500);
        }
    }

    public function weblogout(Request $request)
    {

        $request->session()->forget('user_det');
        $request->session()->regenerate();
        return redirect('/');
    }
    public function updateSet(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'name' => 'nullable',
                'phone' => 'nullable',
                'city' => 'nullable',
                'country' => 'nullable',
                'language' => 'nullable',
                'old_password' => 'nullable',
                'confirm_password' => 'nullable',
                'upload_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $user = User::where('id', $validatedData['user_id'])->first();
            $user->name = $validatedData['name'];
            $user->phone = $validatedData['phone'];
            $user->city = $valid階段atedData['city'];
            $user->country = $validatedData['country'];
            $user->language = $validatedData['language'];



            if ($request->hasFile('upload_image')) {
                $image = $request->file('upload_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/user_images', $imageName); // Adjust storage path as needed
                $user->user_image = 'storage/user_images/' . $imageName;
            }

            session(['user_image' => [
                'user_image' => $user['user_image'],

            ]]);
            $user->save();
            // return redirect('../setting');
            return response()->json(['success' => true, 'message' => 'Profile Updated!', 'updated_data' => $user], 200);
        } catch (\Exception $e) {
            return redirect('../setting');
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }


    public function settingdata()
    {
        $user_id  = session('user_det')['user_id'];
        $user = User::where('id', $user_id)->first();

        return view('setting', ['user' => $user]);
    }
}
