<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageExam extends Model
{
    use HasFactory;
    protected $fillable = ['subject_stage_id', 'title', 'is_required'];

    public function stage()
    {
        return $this->belongsTo(SubjectStage::class, 'subject_stage_id');
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }
}
