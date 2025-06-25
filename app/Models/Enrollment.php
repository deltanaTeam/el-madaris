<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'enrollments';
    public $fillable = ['course_id','student_id','enrolled_at','progress','completed'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
