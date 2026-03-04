<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
protected $guarded = [];

    public function questions() {
        return $this->belongsToMany(Question::class);
    }
    // علاقة المادة (ينتمي إلى مادة)
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // علاقة المحاولات
    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class);
    }
}

