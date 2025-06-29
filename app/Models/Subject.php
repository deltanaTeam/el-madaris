<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Subject extends Model
{
    use HasFactory;
    use HasTranslations;
    public $timestamps = false;
    protected $table = 'subjects';

    protected $fillable = ['name','description'];
    public $translatable = ['name','description'];

    public function levels()
    {
        return $this->belongsToMany(Level::class,'level_subject');
    }

    public function teachers()
    {
        return $this->hasMany(User::class,'teacher_id');
    }
}
