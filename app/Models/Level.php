<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Level extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'levels';

    protected $fillable = ['name','description'];
    public $translatable = ['name','description'];
    public $timestamps = false;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'level_subject');
    }
}
