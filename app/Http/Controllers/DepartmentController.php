<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();
        return view('admin_panel.departments.index', compact('departments'));
    }

    public function create() {
        return view('admin_panel.departments.create');
    }

    public function store(Request $request) {
        $request->validate([
            'department_name' => 'required',
            'location' => 'required',
            'timing' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department Added Successfully');
    }

    public function edit($id) {
        $department = Department::findOrFail($id);
        return view('admin_panel.departments.edit', compact('department'));
    }

    public function update(Request $request, $id) {
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department Updated Successfully');
    }

    public function delete($id) {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department Deleted Successfully');
    }
}
