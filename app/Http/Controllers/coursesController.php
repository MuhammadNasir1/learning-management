<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\words;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class coursesController extends Controller
{
    //  addd course
    public function addcourse(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "course_name" => "required",
                "level" => "required",
                "lesson" => "required",
                "word" => "required",
                "audio_1" => "nullable|max:2048",
                "audio_2" => "nullable|max:2048",
                "audio_3" => "nullable|max:2048",
            ]);
            $course = courses::create([
                'course_name' => $validatedData['course_name'],
            ]);
            foreach ($request['word'] as $j => $wordData) {
                $word = words::create([
                    'course_id' => $course->id,
                    'course_name' => $course->course_name,
                    'level' => $validatedData['level'][$j],
                    'lesson' => $validatedData['lesson'][$j],
                    'word' => $validatedData['word'][$j],
                ]);

                // Loop through audio files
                for ($i = 1; $i <= 3; $i++) {
                    $audioFieldName = "audio_$i";
                    if ($request->hasFile("$audioFieldName.$j")) {
                        $audioFile = $request->file("$audioFieldName.$j");
                        $audioName = time() . '_' . $audioFile->getClientOriginalName(); // Use original name instead of extension
                        $audioFile->storeAs('public/audio', $audioName);
                        $word->$audioFieldName = 'storage/audio/' . $audioName; // Assign the file path to the dynamic field name
                    }
                }

                // Save the word data including audio file paths
                $word->save();
            }








            return response()->json(['success' => true, 'message' =>  "course add successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function coursedata()
    {
        try {
            $courses = words::all();
            $formattedCourses = [];

            foreach ($courses as $course) {
                $formattedCourse = $course->toArray();
                $formattedCourse['created_at'] = date('Y-m-d', strtotime($course->created_at));
                $formattedCourses[] = $formattedCourse;
            }

            return response()->json(['success' => true, 'message' => "Course get successful", 'courses' => $formattedCourses], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function updatecourse(Request $request, $id)
    {
        try {
            $course = words::find($id);
            if (!$course) {
                return response()->json(['success' => false, 'message' => 'course not found'], 500);
            }

            for ($i = 1; $i <= 3; $i++) {
                $audioFieldName = "audio_$i";
                if ($request->hasFile("$audioFieldName")) {
                    $audioFile = $request->file("$audioFieldName");
                    $audioName = time() . '_' . $audioFile->getClientOriginalName(); // Use original name instead of extension
                    $audioFile->storeAs('public/audio', $audioName);
                    $course->$audioFieldName = 'storage/audio/' . $audioName; // Assign the file path to the dynamic field name
                }
            }
            $course->update($request->except('audio_1', 'audio_2', 'audio_3'));
            return response()->json(['success' => true, 'message' =>  "course add successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // delete course
    function  deleteCourse($id)
    {
        try {
            $course = words::where('id', $id)->first();
            if (!$course) {
                return response()->json(['success' => false, 'message' =>  "course not found"], 200);
            }

            $course->delete();
            return response()->json(['success' => true, 'message' =>  "course delete successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function getcoursedata()
    {
        $courses =  words::all();


        return view('course', ['courses' => $courses]);
    }

    public function getteachingWords($id)
    {
        $words = words::where('id', $id)->first();
        return response()->json(['success' => true, 'words' => $words]);
    }


    public function getcourseUpdataData($id)
    {

        try {

            $course = words::where('id',  $id)->first();
            if (!$course) {
                return response()->json(['success' => false, 'message' => 'Course  not found'], 500);
            }
            return response()->json(['success' => false, 'message' => 'Data get successfull', 'course' => $course], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function Courseimport(Request $request)
    {

        $validateData = $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');
        $data = Excel::toArray([], $file);

        // Assuming the first row contains course data
        $courseData = $data[0][0];

        // Insert course
        $course = courses::create([
            'course_name' => $courseData[0], // Assuming course name is in the first column
        ]);

        // Iterate over rows starting from the second row (since the first row contains course data)
        for ($i = 1; $i < count($data[0]); $i++) {
            $row = $data[0][$i];
            words::create([
                'course_id' => $course->id,
                'course_name' => $course->course_name,
                'level' => $row[1], // Assuming level is in the second column
                'lesson' => $row[2], // Assuming lesson is in the third column
                'word' => $row[3], // Assuming word is in the fourth column
                // Add more columns as needed
            ]);
        }


        return redirect()->back();
    }
}
