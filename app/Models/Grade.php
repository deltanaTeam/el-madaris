<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Grade extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'grades';
    public $timestamps = false;
    public $translatable = ['name'];
    protected $fillable = ['name', 'description'];

   public function subjects()
   {
       return $this->hasMany(Subject::class);
   }
   
   
}
