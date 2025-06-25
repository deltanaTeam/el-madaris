<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Course extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'courses';
    public $fillable = ['title','description','level_subject_id','image','price','is_free','teacher_id'];
    public $translatable = ['title','description'];

    public function levelSubject()
    {
        return $this->belongsTo(LevelSubject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function goals()
    {
        return $this->hasMany(CourseGoal::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function ratings()
   {
       return $this->hasMany(CourseRating::class);
   }

   public function getStudentCountAttribute()
   {
       return $this->enrollments()->count();
   }

   public function getTopicCountAttribute()
   {
       return $this->topics()->count();
   }

   public function getvideoCountAttribute()
   {
       return  Video::whereIn('topic_id',$this->topics()->pluck('id')->count());

   }
}
