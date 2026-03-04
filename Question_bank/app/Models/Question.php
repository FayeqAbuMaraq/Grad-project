<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function exam()
    {
    return $this->belongsToMany(Exam::class);    
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
