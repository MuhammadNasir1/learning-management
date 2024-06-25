<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\students;
use App\Models\teacher;
use App\Models\teacher_rec;
use App\Models\training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{


    public function language_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
    // dashboard  Users Couny
    public function adminDashboard()
    {
        $parentsCount = parents::count();
        $studentsCount = students::count();
        $teachersCount = teacher::count();

        return view('admin.dashboard', compact('parentsCount', 'studentsCount', 'teachersCount'));
    }

    public function parentDashboard()
    {
        return view('parent.dashboard');
    }

    public function teacherDashboard()
    {
        $trainingCount = training::count();
        $videoCount = teacher_rec::count();
        return view('teacher.dashboard', compact('trainingCount', 'videoCount'));
    }

    // permission


    public function permissionView()
    {

        $users = User::where('role', '<>', 'superAdmin')->get();
        $permissions = [];
        foreach ($users as $user) {
            $permissions[$user->permission] = json_decode($user->permission, true);
        }
        return view('admin.user_permission', ['users' => $users, 'permissions' => $permissions]);
    }

    public  function changePermission(Request $request, $user_id)
    {
        try {

            $validatedData = $request->validate([
                'insert' => 'nullable',
                'delete' => 'nullable',
                'update' => 'nullable',
            ]);
            $user =  User::find($user_id);

            $permissions = [
                'insert' => isset($validatedData['insert']) ? true : false,
                'delete' => isset($validatedData['delete']) ? true : false,
                'update' => isset($validatedData['update']) ? true : false,
            ];
            $user->permission = json_encode($permissions);
            $user->save();
            return redirect('../admin/permission');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
