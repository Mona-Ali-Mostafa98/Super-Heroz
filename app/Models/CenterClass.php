<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'age',
        'teacher_name',
        'image',
        'status',
    ];
}
