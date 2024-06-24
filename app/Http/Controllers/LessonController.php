<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassModel;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class LessonController extends Controller

{

        
public function savelesson(Request $request)
{
    // Validate incoming request data
     // Define validation rules
   

    // Retrieve input values
    $title = $request->input('title');
    $description = $request->input('description');
    $weekday = Carbon::parse($request->input('weekday'))->format('Y-m-d');
    $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');
    $end_time = Carbon::parse($request->input('end_time'))->format('H:i:s');
    $subjectId = $request->input('subject');
    $teacherId = $request->input('teacher');
    $room = $request->input('room');
    $school_year = $request->input('school_year');
    $term = $request->input('term');
    $schclassId = $request->input('schclass');
    $class_size = $request->input('class_size');

    
    // Check if there is an ID in the request to determine if it's an edit or add operation
    $lessonId = $request->input('id');

    try {
        // Retrieve related models
        $teacher = User::findOrFail($teacherId);
        $teacher_name = $teacher->first_name . ' ' . $teacher->last_name;

        $subject = Subject::findOrFail($subjectId);
        $subject_name = $subject->name;

        $class = ClassModel::findOrFail($schclassId);
        $class_name = $class->name;

        // Log the values
        \Log::info('Title: ' . $title);
        \Log::info('Description: ' . $description);
        \Log::info('Weekday: ' . $weekday);
        \Log::info('Start Time: ' . $start_time);
        \Log::info('End Time: ' . $end_time);
        \Log::info('Subject: ' . $subject);
        \Log::info('Teacher: ' . $teacher);
        \Log::info('Room: ' . $room);
        \Log::info('School Year: ' . $school_year);
        \Log::info('Term: ' . $term);
        \Log::info('Class Size: ' . $class_size);
        \Log::info('Teacher Name: ' . $teacher_name);
        \Log::info('Subject Name: ' . $subject_name );
        \Log::info('Class Name: ' . $class_name);
        

        // Save the lesson
        $lessonData = [
            'title' => $title,
            'description' => $description,
            'weekday' => $weekday,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'subject' => $subjectId,
            'teacher' => $teacherId,
            'teacher_name' => $teacher_name,
            'subject_name' => $subject_name,
            'class_name' => $class_name,
            'room' => $room,
            'school_year' => $school_year,
            'term' => $term,
            'schclass' => $schclassId,
            'class_size' => $class_size,
        ];

      
            // Create a new lesson record
            $lesson = Lesson::create($lessonData);
        // Optionally, you can return the saved lesson as a response
        return response()->json($lesson, 201);
    } catch (\Exception $e) {
        // Return error response if something goes wrong
        return response()->json(['error' => 'Failed to save lesson. ' . $e->getMessage()], 500);
    }
}

#update lesson
public function updatelesson(Request $request)
{
    // Validate incoming request data
     // Define validation rules
   

    // Retrieve input values
    $title = $request->input('title');
    $description = $request->input('description');
    $weekday = Carbon::parse($request->input('weekday'))->format('Y-m-d');
    $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');
    $end_time = Carbon::parse($request->input('end_time'))->format('H:i:s');
    $subjectId = $request->input('subject');
    $teacherId = $request->input('teacher');
    $room = $request->input('room');
    $school_year = $request->input('school_year');
    $term = $request->input('term');
    $schclassId = $request->input('schclass');
    $class_size = $request->input('class_size');

    
    // Check if there is an ID in the request to determine if it's an edit or add operation
    $lessonId = $request->input('id');

    try {
        // Retrieve related models
        $teacher = User::findOrFail($teacherId);
        $teacher_name = $teacher->first_name . ' ' . $teacher->last_name;

        $subject = Subject::findOrFail($subjectId);
        $subject_name = $subject->name;

        $class = ClassModel::findOrFail($schclassId);
        $class_name = $class->name;

        // Log the values
        \Log::info('Title: ' . $title);
        \Log::info('Description: ' . $description);
        \Log::info('Weekday: ' . $weekday);
        \Log::info('Start Time: ' . $start_time);
        \Log::info('End Time: ' . $end_time);
        \Log::info('Subject: ' . $subject);
        \Log::info('Teacher: ' . $teacher);
        \Log::info('Room: ' . $room);
        \Log::info('School Year: ' . $school_year);
        \Log::info('Term: ' . $term);
        \Log::info('Class Size: ' . $class_size);
        \Log::info('Teacher Name: ' . $teacher_name);
        \Log::info('Subject Name: ' . $subject_name );
        \Log::info('Class Name: ' . $class_name);
        

        // Save the lesson
        $lessonData = [
            'title' => $title,
            'description' => $description,
            'weekday' => $weekday,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'subject' => $subjectId,
            'teacher' => $teacherId,
            'teacher_name' => $teacher_name,
            'subject_name' => $subject_name,
            'class_name' => $class_name,
            'room' => $room,
            'school_year' => $school_year,
            'term' => $term,
            'schclass' => $schclassId,
            'class_size' => $class_size,
        ];

        if ($lessonId) {
            \Log::info('Update Lesson Id: ' . $lessonId);
            // Update the existing lesson record
            $lesson = Lesson::findOrFail($lessonId);
            $lesson->update($lessonData);
        }

        // Optionally, you can return the saved lesson as a response
        return response()->json($lesson, 201);
    } catch (\Exception $e) {
        // Return error response if something goes wrong
        return response()->json(['error' => 'Failed to save lesson. ' . $e->getMessage()], 500);
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

    public function getLesson($id)
    {
   # $studentId = $request->get('studentId', ''); // Get the 'role' query parameter
   \Log::info('Lesson detail id: ' . $id);

    // Query users based on role
    $lessons = lesson::where('id', $id)->get();
    \Log::info('lesson detail in lessons function: ' . $lessons);

    return response()->json($lessons);
    }
   


    
}
