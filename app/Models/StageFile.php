<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageFile extends Model
{
    use HasFactory;
    protected $fillable = ['subject_stage_id', 'title', 'file_path'];

   public function stage()
   {
       return $this->belongsTo(SubjectStage::class, 'subject_stage_id');
   }
}
