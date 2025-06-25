<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelSubject extends Model
{
    use HasFactory;
    protected $table = 'level_subject';
    public $timestamps = false;

    protected $fillable = ['level_id','subject_id'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
