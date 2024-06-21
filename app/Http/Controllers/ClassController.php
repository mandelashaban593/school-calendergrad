<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        return ClassModel::paginate($perPage);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return ClassModel::create($validatedData);
    }

    public function update(Request $request, ClassModel $classModel)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classModel->update($validatedData);

        return response()->json(['message' => 'Class updated successfully']);
    }

    public function destroy(ClassModel $classModel)
    {
        $classModel->delete();

        return response()->json(['message' => 'Class deleted successfully']);
    }
}
