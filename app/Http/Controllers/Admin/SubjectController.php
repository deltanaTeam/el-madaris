<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{Subject,Course,User};
use App\DataTables\SubjectDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubjectDataTable $dataTable)
    {
      $data['title'] = 'courses';

      return $dataTable->render('admin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //$teachers = User::role('teacher')->get(); // باستخدام Spatie
      $teachers = User::get();
      return view('admin.subjects.create', compact( 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'name_en'        => 'required|string|max:100',
          'name_ar'        => 'required|string|max:100',
          'description_ar' => 'nullable|string|max:500',
          'description_en' => 'nullable|string|max:500',
          'grade'       => 'required|exists:levels,id',
          'teacher'     => 'required|exists:users,id',
          'is_free'        => 'required|boolean',
          'price'          => 'nullable|numeric|min:0',
          'image'          => 'nullable|image|max:10000'
      ]);
      $image = null;
      if ($request->hasFile('image'))
      {
        $image = $request->file('image')->store('subjects/images', 'public');

      }
      $subject = new Course;
      $subject ->setTranslation('name', 'en',$request->name_en );
      $subject ->setTranslation('name', 'ar',$request->name_ar );
      $subject ->setTranslation('description', 'en',$request->description_en );
      $subject ->setTranslation('description', 'ar',$request->description_ar );
      $subject ->grade_id   = $request->grade ;
      $subject ->teacher_id = $request->teacher ;
      $subject ->is_free    = $request->is_free ;
      $subject ->price      = abs($request->price) ;
      $subject ->image      = $image;
      $subject ->save();
      return redirect()->route('admin.subjects.index')->with('success','saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $subject = Subject::with('teacher','level')->withAvg('ratings','rating')->withCount('students','stages')->findOrFail($id);
        // return view('admin.subjects.edit', compact('subject'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $subject)
    {
      $teachers = User::get();
      return view('admin.subjects.edit', compact('subject', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $subject)
    {
      $request->validate([
           'name_en'        => 'required|string|max:100',
          'name_ar'        => 'required|string|max:100',
          'description_ar' => 'nullable|string|max:500',
          'description_en' => 'nullable|string|max:500',
          'grade'       => 'required|exists:levels,id',
          'teacher'     => 'required|exists:users,id',
          'is_free'        => 'required|boolean',
          'price'          => 'nullable|numeric|min:0',
          'image'          => 'nullable|image|max:10000'

      ]);
      if ($request->hasFile('image'))
      {
        $image = $request->file('image')->store('subjects/images', 'public');

      }
      $subject ->setTranslation('name', 'en',$request->name_en );
      $subject ->setTranslation('name', 'ar',$request->name_ar );
      $subject ->setTranslation('description', 'en',$request->description_en );
      $subject ->setTranslation('description', 'ar',$request->description_ar );
      $subject ->grade_id   = $request->grade ;
      $subject ->teacher_id = $request->teacher ;
      $subject ->is_free    = $request->is_free ;
      $subject ->price      = abs($request->price) ;
      $subject ->image      = $image??$subject->image;

      $subject ->save();

      return redirect()->route('admin.subjects.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $subject)
    {
      if (Storage::disk('public')->exists($subject->image))
      {
        Storage::disk('public')->delete($subject->image);
      }
      $subject->delete();
      return redirect()->route('admin.subjects.index')->with('success','deleted successfully');
    }
}
