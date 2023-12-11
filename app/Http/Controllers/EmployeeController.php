<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['skills'] = Skill::all();
        return view('backend/Feature/Employee/index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = 'employee' . '_' . date('ymhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads/infopicture', $fileName);
        }
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $fileName,
            'gender' => $request->gender,
            'skill' => json_encode($request->skill),
        ]);
        return response()->json(['message' => 'Employee created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}