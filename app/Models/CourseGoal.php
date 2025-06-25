<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CourseGoal extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'course_goals';
    public $fillable = ['course_id','goal_text'];
    public $translatable = ['goal_text'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
