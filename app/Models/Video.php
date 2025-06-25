<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Video extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'videos';
    public $fillable = ['title','topic_id','url','duration'];
    public $translatable = ['title'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
