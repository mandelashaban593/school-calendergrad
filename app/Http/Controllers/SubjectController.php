<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::paginate($request->input('per_page', 10));
        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255|unique:subjects',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $data = $request->all();
        $subject = Subject::create($data);
        return response()->json($subject, 201);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255|unique:subjects,name,' . $subject->id,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $data = $request->all();
        $subject->update($data);
        return response()->json($subject);
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getSubjects()
    {
        $subjects = Subject::all(); // Fetch all subjects from database

        return response()->json($subjects);
    }

    public function subjectsDetail($subjectId)
    {
       # $studentId = $request->get('studentId', ''); // Get the 'role' query parameter
       \Log::info('Subject detail id: ' . $subjectId);

        // Query users based on role
        $subjects = Subject::where('id', $subjectId)->get();
        \Log::info('Subject detail in SubjectsDetail function: ' . $subjects);

        return response()->json($subjects);
    }



}
