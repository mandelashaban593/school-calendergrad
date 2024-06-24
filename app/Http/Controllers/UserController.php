<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users =  User::paginate($request->input('per_page', 10));
        return response()->json($users);
    }

    public function users(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'email' => 'required|string|email|max:255|unique:users',
                'role' => 'required|string',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'address' => 'required|string',
                'phone_number' => 'required|string',
                'joining_date' => 'required|date',
                'department_id' => 'required|integer',
            ]);
   

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $data = $request->all();
        $data['token'] = Str::random(60); // Automatically generate a token
        $user = User::create($data);
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        try {
            $this->validate($request, [
                'username' => 'required|string|max:255',
                'password' => 'nullable|string|min:8',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'role' => 'required|string',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'address' => 'required|string',
                'phone_number' => 'required|string',
                'joining_date' => 'required|date',
                'department_id' => 'required|integer',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $data = $request->all();
        $user->update($data);
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function students(Request $request)
    {
        $role = $request->get('role', ''); // Get the 'role' query parameter

        // Query users based on role
        $users = User::where('role', $role)->get();

        return response()->json($users);
    }

    public function studentsDetail($studentId)
    {
       # $studentId = $request->get('studentId', ''); // Get the 'role' query parameter
       \Log::info('Student detail id: ' . $studentId);

        // Query users based on role
        $users = User::where('id', $studentId)->get();
        \Log::info('Student detail in studentsDetail function: ' . $users);

        return response()->json($users);
    }

    public function getTeachers(Request $request)
    {
        $role = $request->get('role', ''); // Get the 'role' query parameter

        // Query users based on role
        $users = User::where('role', $role)->get();

        return response()->json($users);
    }


    

}
