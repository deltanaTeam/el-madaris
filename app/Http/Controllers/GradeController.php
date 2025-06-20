<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Grade,Subject};
class GradeController extends Controller
{
    
    public function index(){
      $subjects = Subject::with('teacher','grade')->withAvg('ratings','rating')->withCount('students','stages')->get();
      return view('index',compact('subjects'));
    }
    public function show($id){
      $subjects = Subject::with('teacher','grade')->withAvg('ratings','rating')
      ->withCount('students','stages')
      ->where('grade_id',$id)
      ->latest()->paginate(1);
      return view('grade-subjects',compact('subjects'));
    }
}
