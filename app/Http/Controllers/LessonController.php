<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class LessonController extends Controller
{
    public function lesson(Request $request)
    {
        try {
            // Define validation rules
            $rules = [
                'weekday' => 'required|date_format:Y-m-d', // expecting a date in YYYY-MM-DD format
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'subject' => 'required|string',
                'teacher' => 'required|string',
                'room' => 'required|string',
                'school_year' => 'required|string', // assuming it's a string representing school year
                'term' => 'required|string',
                'schclass' => 'required|string',
                'class_size' => 'required|integer'
            ];

            // Validate the input data
            // $validator = Validator::make($request->all(), $rules);

            // if ($validator->fails()) {
            //     return response()->json(['errors' => $validator->errors()], 422);
            // }

            // Retrieve and convert the input values
            $weekday = Carbon::parse($request->input('weekday'))->format('Y-m-d');
            $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');
            $end_time = Carbon::parse($request->input('end_time'))->format('H:i:s');
            $subject = $request->input('subject');
            $teacher = $request->input('teacher');
            $room = $request->input('room');
            $school_year = $request->input('school_year');
            $term = $request->input('term');
            $schclass = $request->input('schclass');
            $class_size = $request->input('class_size');

            // Log the values
            \Log::info('Weekday: ' . $weekday);
            \Log::info('Start Time: ' . $start_time);
            \Log::info('End Time: ' . $end_time);
            \Log::info('Subject: ' . $subject);
            \Log::info('Teacher: ' . $teacher);
            \Log::info('Room: ' . $room);
            \Log::info('School Year: ' . $school_year);
            \Log::info('Term: ' . $term);
            \Log::info('Class Size: ' . $class_size);
            \Log::info('Class: ' . $schclass);

            // Check if there is an ID in the request to determine if it's an edit or add operation
            $lessonId = $request->input('id');

            if ($lessonId) {
                // Update the existing lesson record
                $lesson = Lesson::findOrFail($lessonId);
                $lesson->update([
                    'weekday' => $weekday,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'subject' => $subject,
                    'teacher' => $teacher,
                    'room' => $room,
                    'school_year' => $school_year,
                    'term' => $term,
                    'class_size' => $class_size,
                    'schclass' => $schclass,
                ]);
            } else {
                // Create a new lesson record
                $lesson = Lesson::create([
                    'weekday' => $weekday,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'subject' => $subject,
                    'teacher' => $teacher,
                    'room' => $room,
                    'school_year' => $school_year,
                    'term' => $term,
                    'class_size' => $class_size,
                    'schclass' => $schclass,
                ]);
            }

            // Return the values as a JSON response
            return response()->json(['message' => 'Lesson saved successfully'], 201)
                             ->header('Referrer-Policy', 'no-referrer');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422)->header('Referrer-Policy', 'no-referrer');
        }
    }

    public function deleteLesson($id)
    {
        try {
            $lesson = Lesson::findOrFail($id);
            $lesson->delete();
            return response()->json(['message' => 'Lesson deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422)->header('Referrer-Policy', 'no-referrer');
        }
    }


    public function lessonlist(Request $request)
    {
        $perPage = $request->input('per_page', 5); // Default to 5 records per page
        $lessons = Lesson::paginate($perPage);
        \Log::info('Lesson list retrieved: ' . $lessons);

        return response()->json($lessons);
    }


    public function lesscalendlist()
    {
        $lessons = Lesson::all(); // Fetch all subjects from database
        \Log::info('Lesson list retrieved: ' . $lessons);

        return response()->json($lessons);
    }
   


    
}
