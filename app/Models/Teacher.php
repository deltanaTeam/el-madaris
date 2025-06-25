<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'teacher';
    public $fillable = ['name','user_id','subject_id','cv','image','experience','address','status'];
    public $translatable = ['title','description'];

    public function levelSubject()
    {
        return $this->belongsTo(LevelSubject::class);
    }
}
