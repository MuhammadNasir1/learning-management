<?php

namespace App\Http\Controllers;

use App\Mail\TeacherMail;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class teacherController extends Controller
{
    public function addteacher(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'dob' => 'required|date',
                'gender' => 'required',
                'phone_no' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'skill' => 'required',
                'join_date' => 'required|date',
                'address' => 'required',
                'teacher_cv' => 'nullable|mimes:jpeg,png,jpg,JPG,pdf',
            ]);

            $teacher = teacher::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'dob' => $validatedData['dob'],
                'gender' => $validatedData['gender'],
                'phone_no' => $validatedData['phone_no'],
                'email' => $validatedData['email'],
                'subject' => $validatedData['subject'],
                'skill' => $validatedData['skill'],
                'join_date' => $validatedData['join_date'],
                'address' => $validatedData['address'],
            ]);

            // Generate a password
            $password = \Illuminate\Support\Str::random(8);

            $user = User::create([
                'name' => $validatedData['first_name'] . $validatedData['last_name'],
                'email' => $validatedData['email'],
                'role' => 'teacher',
                'password' => Hash::make($password),

            ]);

            if ($request->hasFile('teacher_cv')) {
                $teacher_cv = $request->file('teacher_cv');
                $cvName = time() . '.' . $teacher_cv->getClientOriginalExtension();
                $teacher_cv->storeAs('public/teacherCv', $cvName); // Adjust storage path as needed
                $teacher->teacher_cv = 'storage/teacherCv/' . $cvName;
            }
            $teacher->save();
            // Send  email with password
            $email = $validatedData['email'];
            $Mpassword = $password;
            Mail::to($validatedData['email'])->send(new TeacherMail($email, $Mpassword));

            return response()->json(['success' => true, 'message' => 'Teacher add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    //  get teacher data
    public function teacherdata()
    {
        try {
            $teacherdata = teacher::all();
            return response()->json(['success' => true, 'message' => 'Data get successfully', 'teacher' => $teacherdata], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    //  delete teacher data
    public function delteacher($teacher_id)
    {
        try {

            $teacher = teacher::find($teacher_id);
            if (!$teacher) {
                return response()->json(['success' => false, 'message' => 'teacher not found'], 500);
            }
            // Delete  file from storage if it exists
            if (!empty($teacher->teacher_cv)) {
                $file_path = public_path($teacher->teacher_cv);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $teacher->delete();
            return response()->json(['success' => true, 'message' => 'teacher successfully delete'], 200);
        } catch (\Exception $e) {
            return redirect('../admin/teacher');
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    //   teacher data update
    public function updateteacher(Request $request, $teacher_id)
    {


        try {
            $teacher = Teacher::find($teacher_id);

            if (!$teacher) {
                return response()->json(['success' => false, 'message' => 'Teacher not found'], 404);
            }

            // Handle file upload
            if ($request->hasFile('teacher_cv')) {
                $teacher_cv = $request->file('teacher_cv');
                $cvName = time() . '.' . $teacher_cv->getClientOriginalExtension();
                $teacher_cv->storeAs('public/teacherCv', $cvName); // Adjust storage path as needed

                // Update teacher record with file path
                $teacher->teacher_cv = 'storage/teacherCv/' . $cvName;
            }



            // Generate a password
            if ($teacher->email !== $request->email) {
                $password = \Illuminate\Support\Str::random(8);

                $user = User::where('email', $teacher->email);
                $user->update(['email' => $request->email, 'password' => hash::make($password)]);

                $email = $request['email'];
                $Mpassword = $password;
                Mail::to($request['email'])->send(new TeacherMail($email, $Mpassword));
            }
            $teacher->update($request->except('teacher_cv')); // Exclude teacher_cv from updating
            // $teacher->update($request->all());
            return response()->json(['success' => true, 'message' => 'Teacher updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getsteacherdata()
    {
        $teachers = teacher::all();
        return view('admin.teacher', ['teachers' => $teachers]);
    }

    public function teacherUpdataData(Request $request, $id)
    {
        try {
            $teacher = Teacher::find($id);
            return response()->json(['success' => true,  'message' => 'Data get successfull', 'teacher' => $teacher], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => true,  'message' => $e->getMessage()], 500);
            //throw $th;
        }
    }
}
