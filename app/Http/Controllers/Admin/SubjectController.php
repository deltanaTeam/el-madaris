<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $subjects = Subject::with('grade', 'teacher')->latest()->get();
      return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $grades = Grade::all();
      $teachers = User::role('teacher')->get(); // باستخدام Spatie
      return view('admin.subjects.create', compact('grades', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'name'        => 'required',
          'description' => 'nullable',
          'grade_id'    => 'required|exists:grades,id',
          'teacher_id'  => 'required|exists:users,id',
          'is_free'     => 'required|boolean',
          'price'       => 'nullable|numeric|min:0'
      ]);

      Subject::create($request->all());

      return redirect()->route('admin.subjects.index');
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
    public function edit(Subject $subject)
    {
      $grades = Grade::all();
      $teachers = User::role('teacher')->get();
      return view('admin.subjects.edit', compact('subject', 'grades', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
      $request->validate([
          'name'        => 'required',
          'description' => 'nullable',
          'grade_id'    => 'required|exists:grades,id',
          'teacher_id'  => 'required|exists:users,id',
          'is_free'     => 'required|boolean',
          'price'       => 'nullable|numeric|min:0'
      ]);

      $subject->update($request->all());

      return redirect()->route('admin.subjects.index')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
      $subject->delete();
      return redirect()->route('admin.subjects.index')
    }
}
