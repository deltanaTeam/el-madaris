<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
     protected $fillable = ['stage_exam_id', 'type', 'question_text', 'options', 'correct_option'];

     protected $casts = [
         'options' => 'array',
     ];

     public function exam()
     {
         return $this->belongsTo(StageExam::class, 'stage_exam_id');
     }

     public function answers()
     {
         return $this->hasMany(ExamAnswer::class);
     }
}
