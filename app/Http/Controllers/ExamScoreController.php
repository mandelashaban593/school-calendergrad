<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\ExamScore;


class ExamScoreController extends Controller
{
    public function index(Request $request)
    {
        $examScores = ExamScore::paginate($request->input('per_page', 10));
        return response()->json($examScores);
    }

    
    
public function store(Request $request)
{
    $exam_id = $request->input('exam_id');
    $student_id = $request->input('student_id');
    $subject_id = $request->input('subject_id');
    $class_id = $request->input('class_id');
    $score = $request->input('score');

    // Log the input values
    \Log::info('exam_id: ' . $exam_id);
    \Log::info('student_id: ' . $student_id);
    \Log::info('subject_id: ' . $subject_id);
    \Log::info('class_id: ' . $class_id);
    \Log::info('Score: ' . $score);

    // Retrieve student information
    $student = User::findOrFail($student_id);
    $student_name = $student->name;
    $email = $student->email;
    $first_name = $student->first_name;
    $last_name = $student->last_name;
    $phone = $student->phone_number;

    // Retrieve subject information
    $subject = Subject::findOrFail($subject_id);
    $subject_name = $subject->name;

    // Retrieve class information
    $class = ClassModel::findOrFail($class_id);
    $class_name = $class->name;

    // Log the values        \Log::info('Weekday: ' . $weekday);
    \Log::info('exam_name: ' . $exam_id);
    \Log::info('student_name: ' . $student_name);
    \Log::info('email: ' . $email);
    \Log::info('first_name: ' . $first_name);
    \Log::info('last_name: ' . $last_name);
    \Log::info('phone: ' . $phone);
    \Log::info('subject_name: ' . $subject_name);
    \Log::info('class_name: ' . $class_name);
    \Log::info('Score: ' . $score);

    // Create a new ExamScore instance with validated fields
   // Create a new ExamScore instance with validated fields
   $examScore = new ExamScore();
   $examScore->exam_id = $exam_id;
   $examScore->student_id = $student_id;
   $examScore->subject_id = $subject_id;
   $examScore->class_id = $class_id;
   $examScore->score = $score;
   $examScore->student_name = $first_name . ' ' . $last_name;
   $examScore->email = $email;
   $examScore->first_name = $first_name;
   $examScore->last_name = $last_name;
   $examScore->phone_number = $phone;
   $examScore->subject_name = $subject_name;
   $examScore->class_name = $class_name;

   $examScore->save();

   return response()->json($examScore, 201);
}

    
public function update(Request $request, $id)
{
    $examScore = ExamScore::findOrFail($id);
    $exam_id = $request->input('exam_id');
    $student_id = $request->input('student_id');
    $subject_id = $request->input('subject_id');
    $class_id = $request->input('class_id');
    $score = $request->input('score');

    // Log the input values
    \Log::info('exam_id: ' . $exam_id);
    \Log::info('student_id: ' . $student_id);
    \Log::info('subject_id: ' . $subject_id);
    \Log::info('class_id: ' . $class_id);
    \Log::info('Score: ' . $score);

    // Retrieve student information
    $student = User::findOrFail($student_id);
    $student_name = $student->name;
    $email = $student->email;
    $first_name = $student->first_name;
    $last_name = $student->last_name;
    $phone = $student->phone_number;

    // Retrieve subject information
    $subject = Subject::findOrFail($subject_id);
    $subject_name = $subject->name;

    // Retrieve class information
    $class = ClassModel::findOrFail($class_id);
    $class_name = $class->name;

    // Log the values
    \Log::info('exam_name: ' . $exam_id);
    \Log::info('student_name: ' . $student_name);
    \Log::info('email: ' . $email);
    \Log::info('first_name: ' . $first_name);
    \Log::info('last_name: ' . $last_name);
    \Log::info('phone: ' . $phone);
    \Log::info('subject_name: ' . $subject_name);
    \Log::info('class_name: ' . $class_name);
    \Log::info('Score: ' . $score);

    try {
        $this->validate($request, [
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required|numeric|min:0|max:100', // Assuming score range
            'class_id' => 'required', // Validate class_id appropriately
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['error' => $e->errors()], 422);
    }

    // Update the ExamScore instance with validated fields
    $examScore->exam_id = $exam_id;
    $examScore->student_id = $student_id;
    $examScore->subject_id = $subject_id;
    $examScore->class_id = $class_id;
    $examScore->score = $score;
    $examScore->student_name = $first_name . ' ' . $last_name;
    $examScore->email = $email;
    $examScore->phone_number = $phone;
    $examScore->subject_name = $subject_name;
    $examScore->class_name = $class_name;

    $examScore->save();

    return response()->json($examScore);
}

    public function destroy($id)
    {
        $examScore = ExamScore::findOrFail($id);
        $examScore->delete();

        return response()->json(null, 204);
    }


    // Grading report cards
    public function generateReport(Request $request)
    {
        $className = $request->input('class_name');
        $examScores = ExamScore::where('class_name', $className)
            ->orderBy('student_name')
            ->get();

        // Group exam scores by student
        $students = [];
        foreach ($examScores as $score) {
            if (!isset($students[$score->student_id])) {
                $students[$score->student_id] = [
                    'student_name' => $score->student_name,
                    'email' => $score->email,
                    'scores' => [],
                ];
            }
            $students[$score->student_id]['scores'][] = [
                'subject_name' => $score->subject_name,
                'score' => $score->score,
                'grade' => $this->calculateGrade($score->score), // Calculate grade based on score
            ];
        }

        // Determine division for each student
        foreach ($students as &$student) {
            $student['division'] = $this->calculateDivision($student['scores']);
        }

        return response()->json(['students' => array_values($students)]);
    }

    private function calculateGrade($score)
    {
        // Implement your grading logic here
        if ($score >= 80) {
            return 'D1';
        } elseif ($score >= 70) {
            return 'D2';
        } elseif ($score >= 60) {
            return 'C';
        } elseif ($score >= 50) {
            return 'E';
        } else {
            return 'F';
        }
    }

    private function calculateDivision($scores)
    {
        // Determine if student passes in Division 1, 2, 3 or fails based on their grades
        $div1Count = 0;
        $div2Count = 0;
        $div3Count = 0;
        $failCount = 0;

        foreach ($scores as $subject) {
            $grade = $subject['grade'];
            if ($grade === 'D1') {
                $div1Count++;
            } elseif ($grade === 'D2') {
                $div2Count++;
            } elseif ($grade === 'C') {
                $div3Count++;
            } elseif ($grade === 'E' || $grade === 'F') {
                $failCount++;
            }
        }

        if ($div1Count > 0) {
            return 'Division 1';
        } elseif ($div2Count > 0) {
            return 'Division 2';
        } elseif ($div3Count > 0) {
            return 'Division 3';
        } else {
            return 'Failed';
        }
    }


}
