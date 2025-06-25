<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Question extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'questions';
    public $fillable = ['question','exam_id','type'];
    public $translatable = ['question'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }


    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
