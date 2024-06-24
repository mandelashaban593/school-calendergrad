<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ClassModel; // Changed from Class to ClassModel to avoid conflicts
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClasscredController extends Controller
{
    public function classcred(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new class record
        $class = ClassModel::create([
            'name' => $validatedData['name'],
        ]);

        // Return a success response
        return response()->json(['message' => 'Class saved successfully'], 201)->header('Referrer-Policy', 'no-referrer');
    }

    // public function getClassNames(Request $request)
    // {
    //     // Fetch class names from the database using pluck('name')
    //     $classNames = ClassModel::pluck('name');
    
    //     // Return the class names as JSON response
    //     return response()->json($classNames);
    // }

    public function getClassNames(Request $request)
    {
        // Fetch class names with both id and name columns
        $classNames = ClassModel::select('id', 'name')->get();
        
        // Return the class names as JSON response
        return response()->json($classNames);
    }


    
    public function getClasses()
    {
        $subjects = ClassModel::all(); // Fetch all subjects from database

        return response()->json($subjects);
    }

    public function classesDetail($classId)
    {
       # $studentId = $request->get('studentId', ''); // Get the 'role' query parameter
       \Log::info('Classes detail id: ' . $classId);

        // Query users based on role
        $classes = ClassModel::where('id', $classId)->get();
        \Log::info('Classes detail in ClassesDetail function: ' . $classes);

        return response()->json($classes);
    }
 
    
}
