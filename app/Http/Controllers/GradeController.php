<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Grade,Subject};
class GradeController extends Controller
{
    
    public function index(){
      $subjects = Subject::with('teacher','grade')->withAvg('ratings','rating')->withCount('students','stages')->get();
      $subjectsJson = $subjects->map(function($s) {
        $image = $s->image ? asset('storage/' . $s->image) : asset('images/subject.jpg');
        return [
            'id' => $s->id,
            'name' => $s->name,
            'image' => $image,
            'description'=> $s->description,
            'teacher' => $s->teacher->name ?? 'غير محدد',
            'grade' => $s->grade->name ?? 'غير محدد',
            'students_count' => $s->students_count,
            'stages_count' => $s->stages_count,
            'rating' => number_format($s->ratings_avg_rating, 1),
        ];
      })->values()->toJson();
      
      return view('index',compact('subjectsJson'));
      
    }
    public function show($id){
      $subjects = Subject::with('teacher','grade')->withAvg('ratings','rating')
      ->withCount('students','stages')
      ->where('grade_id',$id)
      ->latest()->paginate(1);
      return view('grade-subjects',compact('subjects'));
    }
}
