<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'right_option',
    ];

    public function Job(){
        return $this->belongsTo(Job::class);
    }
}
