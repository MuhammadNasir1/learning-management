<?php

namespace App\Http\Controllers;

use App\Models\training;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class trainingController extends Controller
{
    public function  addTraining(Request $request)
    {
        $currentDate = date('Y-m-d');
        try {
            $validatedData  = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'video' => 'required'
            ]);

            $training = training::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'duration' => $request['duration'],
                'date' => $currentDate,
            ]);
            if ($request->hasFile('video')) {
                $training_video = $request->file('video');
                $videoName = time() . '.' . $training_video->getClientOriginalExtension();
                $training_video->storeAs('public/trainingVideo', $videoName); // Adjust storage path as needed
                $training->video = 'storage/trainingVideo/' . $videoName;
            }

            $training->save();
            return response()->json(['success' => true, 'message' => 'Training add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function  trainingdata(Request $request)
    {

        try {
            $training = training::all();
            return response()->json(['success' => true, 'message' => 'Training data  successfully', 'training'  => $training], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function  deltraining($training_id)
    {
        try {

            $training = training::find($training_id);
            if (!$training) {
                return response()->json(['success' => false, 'message' => 'training not found'], 500);
            }
            // Delete  file from storage if it exists
            if (!empty($training->video)) {
                $file_path = public_path($training->video);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $training->delete();
            return response()->json(['success' => true, 'message' => 'training successfully delete'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function  updatetraining(Request $request, $training_id)
    {
        try {
            $training = training::find($training_id);
            if (!$training) {
                return response()->json(['success' => false, 'message' => 'training not found'], 500);
            }

            if ($request->hasFile('video')) {
                $training_video = $request->file('video');
                $videoName = time() . '.' . $training_video->getClientOriginalExtension();
                $training_video->storeAs('public/trainingVideo', $videoName);
                $training->video = 'storage/trainingVideo/' . $videoName;
            }


            $training->update($request->except('video'));
            return response()->json(['success' => true, 'message' => 'training Updated successfully '], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function gettrainingdata()
    {
        $trainings = training::all();
        return view('training', ['trainings' => $trainings]);
    }

    public function trainingUpdataData($id)
    {

        try {

            $training = training::where('id',  $id)->first();
            if (!$training) {
                return response()->json(['success' => false, 'message' => 'Training  not found'], 500);
            }
            return response()->json(['success' => true, 'message' => 'Data get successfull', 'training' => $training], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
