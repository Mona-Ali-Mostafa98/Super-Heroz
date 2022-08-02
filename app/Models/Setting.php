<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
        'logo',
        'title',
        'description',
        'image',
        'region' , 'street' , // 'address',
        'phone',
        'email',
        'evening_care_times',
        'day_care_times',
        'daily_care_times'
    ];
}
