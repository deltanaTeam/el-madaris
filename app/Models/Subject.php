<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'description', 'teacher_id', 'grade_id', 'is_free', 'price','image'];
    protected $table = 'subjects';
    public $translatable = ['name','description'];
   
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
