<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'exam_question_id', 'answer_text'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function question()
    {
        return $this->belongsTo(ExamQuestion::class, 'exam_question_id');
    }
}
