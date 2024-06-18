<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $attendances = Attendance::paginate($request->input('per_page', 10));
        return response()->json($attendances);
    }

    public function store(Request $request)
    {
        // Retrieve field values from request
        $student_id = $request->input('student_id');
        $subject_id = $request->input('subject_id');
        $class_id = $request->input('class_id');
        $date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $status = $request->input('status'); // Added status field

            // Log the input values
        \Log::info('student_id: ' . $student_id);
        \Log::info('subject_id: ' . $subject_id);
        \Log::info('class_id: ' . $class_id);
        \Log::info('date:  ' . $date );
        \Log::info('Status:  ' . $status);


        // Retrieve related models
        $student = User::findOrFail($student_id);
        $subject = Subject::findOrFail($subject_id);
        $class = ClassModel::findOrFail($class_id);

        // Create a new Attendance instance
        $attendance = new Attendance();
        $attendance->student_id = $student_id;
        $attendance->subject_id = $subject_id;
        $attendance->class_id = $class_id;
        $attendance->date = $date;
        $attendance->status = $status;
        $attendance->student_name = $student->first_name . ' ' . $student->last_name;
        $attendance->email = $student->email;
        $attendance->first_name = $student->first_name;
        $attendance->last_name = $student->last_name;
        $attendance->phone_number = $student->phone_number;
        $attendance->subject_name = $subject->name;
        $attendance->class_name = $class->name;

        $attendance->save();

        return response()->json($attendance, 201);
    }

    public function update(Request $request, $id)
    {
        // Find the attendance record
        $attendance = Attendance::findOrFail($id);

        // Retrieve field values from request
        $student_id = $request->input('student_id');
        $subject_id = $request->input('subject_id');
        $class_id = $request->input('class_id');
        $date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $status = $request->input('status'); // Added status field

        // Retrieve related models
        $student = User::findOrFail($student_id);
        $subject = Subject::findOrFail($subject_id);
        $class = ClassModel::findOrFail($class_id);

        // Update the Attendance instance
        $attendance->student_id = $student_id;
        $attendance->subject_id = $subject_id;
        $attendance->class_id = $class_id;
        $attendance->date = $date;
        $attendance->status = $status;
        $attendance->student_name = $student->first_name . ' ' . $student->last_name;
        $attendance->email = $student->email;
        $attendance->first_name = $student->first_name;
        $attendance->last_name = $student->last_name;
        $attendance->phone_number = $student->phone_number;
        $attendance->subject_name = $subject->name;
        $attendance->class_name = $class->name;

        $attendance->save();

        return response()->json($attendance);
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return response()->json(null, 204);
    }
}
