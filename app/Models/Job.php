<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'state',
        'open_date',
        'close_date',
        'admin_id'
    ];

    public function Admin(){
        return $this->belongsTo(Admin::class);
    }

    public function Question(){
        return $this->hasMany(JobQuestion::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function jobsUser()
    {
        return $this->belongsToMany(User::class)
        ->withPivot('answer_count', 'rightAnswer_count', 'status')
        ->withTimestamps();
    }
}
