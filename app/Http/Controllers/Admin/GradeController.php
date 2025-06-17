<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $grades = Grade::latest()->get();
      return view('admin.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'name' => 'required|unique:grades,name',
          'description' => 'nullable',
      ]);

      Grade::create($request->only('name', 'description'));

      return redirect()->route('admin.grades.index');
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
    public function edit(Grade $grade)
    {
      return view('admin.grades.edit', compact('grade'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
      $request->validate([
          'name' => 'required|unique:grades,name,' . $grade->id,
          'description' => 'nullable',
      ]);

      $grade->update($request->only('name', 'description'));

      return redirect()->route('admin.grades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
      $grade->delete();

      return redirect()->route('admin.grades.index')
    }
}
