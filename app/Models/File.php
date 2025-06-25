<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class File extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'files';
    public $fillable = ['title','topic_id','file_path'];
    public $translatable = ['title'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
