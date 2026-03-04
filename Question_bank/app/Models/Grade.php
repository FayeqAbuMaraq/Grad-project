<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'stage'];

    // المرحلة لها مواد كثيرة
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function students()
    {
        return $this->hasMany(User::class); 
    }
}
