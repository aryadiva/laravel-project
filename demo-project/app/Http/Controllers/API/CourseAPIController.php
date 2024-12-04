<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseAPIController extends Controller
{
    // POST single
    public function store(Request $request){
        $validatedData=$request->validate([
            'courseName'=>'required|string|max:255',
            'courseDescription'=>'required|string'
        ]);
        $course = new Course();
        $course->courseName=$validatedData['courseName'];
        $course->courseDescription=$validatedData['courseDescription'];
        $course->save();

        return response()->json(['message'=>'Course has been added successfully...', 'course'=>$course],201);
    }

    // GET All
    public function index(){
        $courses=Course::all();
        return response()->json(['message'=>'Course has been fetched successfully...', 'course'=>$courses],201);
    }

    // GET single
    public function show($id){
        $course = Course::find($id);

        if ($course) {
            return response()->json([
                'message' => 'Fetching course...',
                'course' => $course
            ]);
        } else {
            return response()->json([
                'message' => 'Course not found.'
            ], 404);
        }
    }

    // UPDATE
    public function update(Request $request, $id){
        // Find the course by ID
        $course = Course::find($id);

        // Check if course exists
        if (!$course) {
            return response()->json([
                'message' => 'Course not found.'
            ], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'courseName' => 'required|string|max:255',
            'courseDescription' => 'required|string'
        ]);

        // Update course attributes
        $course->update($validatedData);

        // Return success response
        return response()->json([
            'message' => 'Course updated successfully.',
            'course' => $course
        ]);
    }

    // DELETE
    public function destroy($id){
        $course=Course::find($id);
        // Check if course exists
        if (!$course) {
            return response()->json([
                'message' => 'Course not found.'
            ], 404);
        }

        // Delete the course
        $course->delete();

        // Return success response
        return response()->json([
            'message' => 'Course deleted successfully.'
        ]);
    }
}
