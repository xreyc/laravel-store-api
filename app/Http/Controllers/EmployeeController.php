<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display a listing of the employees
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    // Store a newly created employee
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id', // Ensure the store exists
            'user_id' => 'required|exists:users,id',   // Ensure the user exists
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);
        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    // Display the specified employee
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    // Update the specified employee
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id' => 'exists:stores,id', // Ensure the store exists
            'user_id' => 'exists:users,id',   // Ensure the user exists
            'position' => 'string|max:255',
            'salary' => 'numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee);
    }

    // Remove the specified employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(null, 204);
    }
}
