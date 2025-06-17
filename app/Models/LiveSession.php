<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveSession extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'title', 'session_url', 'start_at', 'end_at'];

    protected $dates = ['start_at', 'end_at'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
