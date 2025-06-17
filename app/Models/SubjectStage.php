<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectStage extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'name', 'order'];

   public function subject()
   {
       return $this->belongsTo(Subject::class);
   }

   public function videos()
   {
       return $this->hasMany(StageVideo::class);
   }

   public function files()
   {
       return $this->hasMany(StageFile::class);
   }

   public function exam()
   {
       return $this->hasOne(StageExam::class);
   }
}
