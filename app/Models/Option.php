<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Option extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'options';
    public $fillable = ['question_id','text','is_correct'];
    public $translatable = ['text'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
