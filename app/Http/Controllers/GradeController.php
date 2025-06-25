<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Level,Course};
class GradeController extends Controller
{

    public function index(){
      // $courses = Course::with('teacher','levelSubject')->withAvg('ratings','rating')->get();
      // $coursesJson = $courses->map(function($s) {
      //   $image = $s->image ? asset('storage/' . $s->image) : asset('images/1.gif');
      //   return [
      //       'id' => $s->id,
      //       'name' => $s->title,
      //       'image' => $image,
      //       'description'=> $s->description,
      //       'teacher' => $s->teacher->name ?? 'غير محدد',
      //       'grade' => $s->level->name ?? 'غير محدد',
      //       'students_count' => $s->student_count,
      //       'stages_count' => $s->topic_count,
      //       'video_count' => $s->video_count,
      //
      //       'rating' => number_format($s->ratings_avg_rating, 1),
      //   ];
      // })->values()->toJson();
      $coursesJson =
        $image1 =  asset('images/1.gif');
        $image2 =  asset('images/2.gif');
        $image3 =  asset('images/3.gif');

          $coursesJson = [
          [
            'id' => 1,
            'name' => "مقدمة في حساب المثلثات",
            'image' => $image1,
            'description'=> "هذ الكورس هو مقدمة لحساب المثلثات للصف الثالث الاعدادي ",
            'teacher' => 'محمد أحمد',
            'subject' => 'رياضيات',
            'grade' => 'الصف الثالث الاعدادي',
            'students_count' => 5020,
            'stages_count' => 7,
            'video_count' => 8,

            'rating' => number_format(4.5, 1)
          ],
          [
            'id' => 2,
            'name' => "الكيمياء العضوية",
            'image' => $image2,
            'description'=> "هذا الكورس يتناول شرح بسيط  عن كيفية ربط المعادلات",
            'teacher' => 'محمود محمد',
            'subject' => 'كيمياء',
            'grade' => ' الصف الثالث الثانوي',
            'students_count' => 1250,
            'stages_count' => 6,
            'video_count' => 6,

            'rating' => number_format(4, 1)
          ],
          [
            'id' => 3,
            'name' => "الفيزياء الحديثة",
            'image' => $image3,
            'description'=> "هذا الكورس يتناول شرح بسيط  عن  عن اهم استخدمات الفيوياء الحديثه ",
            'teacher' => 'احمد علي',
            'subject' => 'فيزياء',
            'grade' => ' الصف الثالث الثانوي',
            'students_count' => 2250,
            'stages_count' => 3,
            'video_count' => 3,

            'rating' => number_format(3.5, 1)
          ]
        ];
        $coursesJson = json_encode($coursesJson);

      return view('index',compact('coursesJson'));

    }
    public function show($id){
      $subjects = Subject::with('teacher','grade')->withAvg('ratings','rating')
      ->withCount('students','stages')
      ->where('grade_id',$id)
      ->latest()->paginate(1);
      return view('grade-subjects',compact('subjects'));
    }
}
