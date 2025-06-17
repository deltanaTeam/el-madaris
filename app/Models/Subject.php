<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'teacher_id', 'grade_id', 'is_paid', 'price'];

   public function teacher()
   {
       return $this->belongsTo(User::class, 'teacher_id');
   }

   public function grade()
   {
       return $this->belongsTo(Grade::class);
   }

   public function stages()
   {
       return $this->hasMany(SubjectStage::class);
   }

   public function students()
   {
       return $this->belongsToMany(User::class, 'subject_students', 'subject_id', 'student_id');
   }

   public function ratings()
   {
       return $this->hasMany(SubjectRating::class);
   }

   public function liveSessions()
   {
       return $this->hasMany(LiveSession::class);
   }
}
