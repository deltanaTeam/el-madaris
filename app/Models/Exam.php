<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Exam extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'exams';
    public $fillable = ['title','topic_id','is_required','duration','total','pass_mark'];
    public $translatable = ['title'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function results()
    {
        return $this->hasMany(ExamResult::class);
    }

}
