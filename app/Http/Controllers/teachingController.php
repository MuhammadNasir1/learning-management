<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\recent_teaching;
use App\Models\students;
use App\Models\teacher;
use App\Models\teacher_rec;
use App\Models\teaching;
use App\Models\words;
use Illuminate\Http\Request;

class teachingController extends Controller
{
    public function addteachingdata(Request $request)
    {
        try {
            $userId   = session("user_det")['user_id'];
            $name   = session("user_det")['name'];
            $validatedData  = $request->validate([
                "word_id" => "required",
                "student_name" => "required",
                "lesson_date" => "required",
                "word" => "required",
            ]);

            $count = count($request['course_id']);
            $teachingDataArray = [];
            for ($i = 0; $i < $count; $i++) {
                $teachingData =  [
                    "teacher_id" => $userId,
                    "student_id" => $request['studentid'],
                    "student_name" => $validatedData['student_name'],
                    "teacher_name" => $name,
                    "lesson_date" => $validatedData['lesson_date'],
                    "course" => $request['course'],
                    "course_id" => $request['course_id'][$i],
                    "word_id" => $validatedData['word_id'][$i],
                    "word" => $validatedData['word'][$i],
                    "audio_1" => $request['audio1'][$i],
                    "audio_2" => $request['audio2'][$i],
                    "audio_3" => $request['audio3'][$i],
                ];
                $teachingDataArray[] = $teachingData;
                $wordsArray[] = $validatedData['word'][$i];
            }
            $recentTeaching = recent_teaching::create([
                "teacher_id" => $userId,
                "student_id" => $request['studentid'],
                "student_name" => $validatedData['student_name'],
                "teacher_name" => $name,
                "word" => json_encode($wordsArray),
            ]);
            session([
                'teachingData' => $teachingDataArray,
                'wordDet' => [
                    "student_id" => $request['studentid'],
                    "student_name" => $validatedData['student_name'],
                    "lesson_date" => $validatedData['lesson_date'],
                ],
            ]);
            // return response()->json(['success' => true, 'message'  => "data add successfully", 'teachingData'  =>   $teachingData], 200);
            return redirect('../video');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message'  => $e->getMessage()], 500);
        }
    }
    public function teacherRecordingData(Request $request)
    {
        $userId   = session("user_det")['user_id'];
        try {
            $validatedData  = $request->validate([
                'teacher_comment' => 'required',
                'video' => 'nullable',

            ]);
            $teacherRec = teacher_rec::create([
                'student_id' => session("wordDet")['student_id'],
                'student_name' => session("wordDet")['student_name'],
                'teacher_id' => $userId,
                'lesson_date' => session("wordDet")['lesson_date'],
                'teacher_name' => session("user_det")['name'],
                'teacher_comment' => $validatedData['teacher_comment'],
            ]);
            if ($request->hasFile('video')) {
                $teaching_video = $request->file('video');
                $videoName = time() . '.' . $teaching_video->getClientOriginalExtension();
                $teaching_video->storeAs('public/teacherVideo', $videoName); // Adjust storage path as needed
                $teacherRec->video = 'storage/teacherVideo/' . $videoName;
            }

            $teacherRec->save();
            return response()->json(['success' => true, 'message' => 'Recording add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // teacher  recodrding data
    public function teacherRecdata(Request $request)
    {
        try {
            $validatedData  = $request->validate([
                'teacher_comment' => 'required',
                'video' => 'nullable',

            ]);

            $teacherRec = teacher_rec::create([
                'student_id' => $request['student_id'],
                'teacher_id' => $request['teacher_id'],
                'student_name' => $request['student_name'],
                'teacher_name' => $request['teacher_name'],
                'lesson_date' => $request['lesson_date'],
                'teacher_comment' => $validatedData['teacher_comment'],
            ]);
            if ($request->hasFile('video')) {
                $teaching_video = $request->file('video');
                $videoName = time() . '.' . $teaching_video->getClientOriginalExtension();
                $teaching_video->storeAs('public/teacherVideo', $videoName); // Adjust storage path as needed
                $teacherRec->video = 'storage/teacherVideo/' . $videoName;
            }

            $teacherRec->save();
            return response()->json(['success' => true, 'message' => 'Recording add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public  function  getRecording()
    {
        $userRole = session('user_det')['role'];
        $userId = session('user_det')['user_id'];
        if ($userRole == "admin" || $userRole == "superAdmin") {

            $recordingData = teacher_rec::all();
        } else if ($userRole == "parent") {
            $student = students::where('parent_id', $userId)->first();
            $recording = teacher_rec::where('student_id', $student->id)->get();
            $recordingData = $recording;
        } else if ($userRole == "teacher") {
            $recordingData = teacher_rec::where('teacher_id', $userId)->get();
        }
        return view('std_recording',  ['recordingData' => $recordingData]);
    }


    public function teachingData()
    {
        $students = students::all();
        $words = words::all();
        $courses = courses::all();
        return view('teachingpage', ['students' => $students, 'courses' =>  $courses, 'words' => $words]);
    }


    public function filterOptions(Request $request)
    {
        if ($request->has('course_id')) {
            // Get levels  adn lesson based on the selected course
            $courseId = $request->input('course_id');
            $levels = words::where('course_id', $courseId)->get();
            return response()->json(['levels' => $levels, 'lessons' => $levels,  'words' => $levels]);
        } elseif ($request->has('level_id')) {
            // Get lessons based on the selected level
            $levelId = $request->input('level_id');
            $lessons = words::where('level', $levelId)->get();
            return response()->json(['lessons' => $lessons, 'words' => $lessons]);
        }
    }
    //  teaching page filters

    function filtersCourse(Request $request)
    {
        try {

            if ($request->has('course')) {
                $courseId = $request->input('course');
                $courses = courses::all();
                $words = words::where('course_id', $courseId)->get();
                return response()->json(['success' =>  true, 'message' => 'Data get  Successfully',  'words' => $words], 200);
            } else {

                $courses = courses::all();
                $words = words::all();
                return response()->json(['success' =>  true, 'message' => 'Data get  Successfully', 'courses' => $courses, 'words' => $words], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' =>  false, 'message' => $e->getMessage()], 500);
        }
    }


    // delete teacher screen recording
    public function  delRecording($id)
    {
        try {
            $recording = teacher_rec::find($id);
            if (!$recording) {
                return response()->json(['success' => false, 'message' => 'Recording not found'], 500);
            }
            // Delete  file from storage if it exists
            if (!empty($recording->video)) {
                $file_path = public_path($recording->video);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $recording->delete();
            return response()->json(['success' => true, 'message' => 'Recording successfully delete'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    //  api controller

    public function addteaching(Request $request)
    {
        try {
            $validatedData  = $request->validate([
                "word_id" => "required",
                "student_name" => "required",
                "lesson_date" => "required",
                "course" => "required",
                "word" => "required",
            ]);

            $count = count($request['course_id']);
            for ($i = 0; $i < $count; $i++) {
                $teachingData = teaching::create([
                    "teacher_id" => $request['teacher_id'],
                    "student_id" => $request['studentid'],
                    "student_name" => $validatedData['student_name'],
                    "teacher_name" => $request['teacher_name'],
                    "lesson_date" => $validatedData['lesson_date'],
                    "course" => $validatedData['course'],
                    "course_id" => $request['course_id'][$i],
                    "word_id" => $validatedData['word_id'][$i],
                    "word" => $validatedData['word'][$i],
                    "audio_1" => $request['audio1'][$i],
                    "audio_2" => $request['audio2'][$i],
                    "audio_3" => $request['audio3'][$i],
                ]);
                $teachingData->save();
            }

            return response()->json(['success' => true, 'message'  => "data add successfully", 'teachingData'  =>   $teachingData], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message'  => $e->getMessage()], 500);
        }
    }

    public function addteachingrecdata(Request  $request)
    {
        try {
            $validatedData = $request->validate([
                "word_id" => "required|array",
                "student_id" => "required",
                "teacher_id" => "required",
                "student_name" => "required",
                "teacher_name" => "required",
                "lesson_date" => "required",
                "course" => "required",
            ]);

            $count = count($request['word_id']);
            $wordsArray = [];
            for ($i = 0; $i < $count; $i++) {
                $wordData = Words::find($validatedData['word_id'][$i]);
                $teachingData = [
                    "teacher_id" => $validatedData['teacher_id'],
                    "student_id" => $validatedData['student_id'],
                    "student_name" => $validatedData['student_name'],
                    "teacher_name" => $validatedData['teacher_name'],
                    "lesson_date" => $validatedData['lesson_date'],
                    "course" => $validatedData['course'],
                    "course_id" => $wordData['course_id'],
                    "word_id" => $validatedData['word_id'][$i],
                    "word" => $wordData['word'],
                    "audio_1" => $wordData['audio_1'],
                    "audio_2" => $wordData['audio_2'],
                    "audio_3" => $wordData['audio_3'],
                ];
                $teachingDataArray[] = $teachingData;
                $wordsArray[] = $wordData['word'];
            }
            $recentTeaching = recent_teaching::create([
                "teacher_id" => $validatedData['teacher_id'],
                "student_id" => $validatedData['student_id'],
                "student_name" => $validatedData['student_name'],
                "teacher_name" => $validatedData['teacher_name'],
                "word" => json_encode($wordsArray),
            ]);

            return response()->json(['success' => true, 'message'  => "data add successfully", 'teachingData'  =>   $teachingDataArray], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message'  => $e->getMessage()], 500);
        }
    }
    // public function addteachingrecdata(Request  $request)
    // {
    //     try {
    //         $validatedData = $request->validate([
    //             "word_id" => "required|array",
    //             "student_id" => "required",
    //             "teacher_id" => "required",
    //             "student_name" => "required",
    //             "teacher_name" => "required",
    //             "lesson_date" => "required",
    //             "course" => "required",
    //         ]);

    //         $count = count($request['word_id']);
    //         for ($i = 0; $i < $count; $i++) {
    //             $wordData = Words::find($validatedData['word_id'][$i]);
    //             $teachingData = Teaching::create([
    //                 "teacher_id" => $validatedData['teacher_id'],
    //                 "student_id" => $validatedData['student_id'],
    //                 "student_name" => $validatedData['student_name'],
    //                 "teacher_name" => $validatedData['teacher_name'],
    //                 "lesson_date" => $validatedData['lesson_date'],
    //                 "course" => $validatedData['course'],
    //                 "course_id" => $wordData['course_id'],
    //                 "word_id" => $validatedData['word_id'][$i],
    //                 "word" => $wordData['word'],
    //                 "audio_1" => $wordData['audio_1'],
    //                 "audio_2" => $wordData['audio_2'],
    //                 "audio_3" => $wordData['audio_3'],
    //             ]);
    //             $teachingData->save();
    //             $teachingDataArray[] = $teachingData;
    //         }

    //         return response()->json(['success' => true, 'message'  => "data add successfully", 'teachingData'  =>   $teachingDataArray], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'message'  => $e->getMessage()], 500);
    //     }
    // }

    public function getParentWords($parent_id)
    {
        try {
            $students = students::where('parent_id', $parent_id)->get();
            $recent_teaching = []; // Initialize the variable outside of the loop
            // foreach ($students as $student) {
            //     $recent_teaching = array_merge($recent_teaching, recent_teaching::where('student_id', $student->id)->get()->toArray());
            // }
            foreach ($students as $student) {
                $teachings = recent_teaching::where('student_id', $student->id)->get()->toArray();
                foreach ($teachings as &$teaching) {
                    $teaching['word'] = json_decode($teaching['word'], true);
                }
                $recent_teaching = array_merge($recent_teaching, $teachings);
            }
            return response()->json(['success' => true, 'message' => "Words Get Successfully", 'recentWords' =>  $recent_teaching], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }

    public function getTeacherWords($teacher_id)
    {

        try {
            $recentWords = recent_teaching::where('teacher_id', $teacher_id)->get()->toArray();
            foreach ($recentWords as $word) {
                $word['word'] = json_decode($word['word'], true);
            }
            return response()->json(['success' => true, 'message' => "Words Get Successfully", 'recentWords' =>  $recentWords], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }

    public function getAllWords()
    {
        try {
            $recentWords = recent_teaching::all()->toArray();
            foreach ($recentWords as &$word) {
                $word['word'] = json_decode($word['word'], true);
            }
            return response()->json(['success' => true, 'message' => "Words Get Successfully", 'recentWords' =>  $recentWords], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }

    public function getAllRecording()
    {

        try {
            $recordings = teacher_rec::all();

            return response()->json(['success' => true, 'message' => "Recording Get Successfully", 'recordings' =>  $recordings], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }

    public  function getTeacherRec($teacher_id)
    {
        try {
            $recordings = teacher_rec::where('teacher_id', $teacher_id)->get();
            return response()->json(['success' => true, 'message' => "Recording Get Successfully", 'recordings' =>  $recordings], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }

    public  function getParentRecording($parent_id)
    {
        try {
            $students = students::where('parent_id', $parent_id)->get();
            $recordings = [];

            foreach ($students as $student) {
                $recording = teacher_rec::where('student_id', $student->id)->get();
                $recordings = $recording;
            }
            return response()->json(['success' => true, 'message' => "Recording Get Successfully", 'recordings' =>  $recordings], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }
}
