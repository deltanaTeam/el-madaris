<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Topic extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'topics';
    public $fillable = ['title','order','course_id'];
    public $translatable = ['title'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }
}
