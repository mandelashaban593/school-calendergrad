<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $exams = Exam::paginate($request->input('per_page', 10));
        return response()->json($exams);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255|unique:exams',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $data = $request->all();

        // Ensure exam_date is properly formatted if present
        if (isset($data['exam_date'])) {
            $data['exam_date'] = date('Y-m-d', strtotime($data['exam_date']));
        }

        $exam = Exam::create($data);
        return response()->json($exam, 201);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255|unique:exams,name,' . $exam->id,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $data = $request->all();

        // Ensure exam_date is properly formatted if present
        if (isset($data['exam_date'])) {
            $data['exam_date'] = date('Y-m-d', strtotime($data['exam_date']));
        }

        $exam->update($data);
        return response()->json($exam);
    }

    public function destroy($id)
    {
        Exam::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
