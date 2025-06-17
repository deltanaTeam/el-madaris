<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageVideo extends Model
{
    use HasFactory;
    protected $fillable = ['subject_stage_id', 'title', 'video_path'];

    public function stage()
    {
        return $this->belongsTo(SubjectStage::class, 'subject_stage_id');
    }
}
