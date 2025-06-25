<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\DataTables\GradeDataTable;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(GradeDataTable $dataTable)
    {
      $data['title'] = 'grades';

      return $dataTable->render('admin.index',compact('data'));
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
        'name_ar' => ['required', 'string', 'max:90','unique:levels,name->ar'],
        'name_en' => ['required', 'string', 'max:90','unique:levels,name->en'],
      ]);
      $level = new Level;
      $level ->setTranslation('name', 'en',$request->name_en );
      $level ->setTranslation('name', 'ar',$request->name_ar );
      $level->save();
      return redirect()->route('admin.grades.index')->with('success','saved successfully');
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
    public function edit(Level $level)
    {
      return view('admin.grades.edit', compact('level'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $grade)
    {
      $request->validate([
        'name_ar' => ['required', 'string', 'max:90',Rule::unique('levels','name->ar')->ignore($grade->id)],
        'name_en' => ['required', 'string', 'max:90',Rule::unique('levels','name->ar')->ignore($grade->id)],

      ]);

      $grade ->setTranslation('name', 'en',$request->name_en );
      $grade ->setTranslation('name', 'ar',$request->name_ar );
      $grade->save();

      return redirect()->route('admin.grades.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
      $level->delete();

      return redirect()->route('admin.grades.index')->with('success','deleted successfully');
    }
}
