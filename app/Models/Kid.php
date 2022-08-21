<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kid extends Model
{
    use HasFactory , Notifiable;

    protected $guarded = [];
    // protected $fillable = ['terms' , 'images_terms'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function persons_take_kid()
    {
        return $this->hasMany(PersonsTakeKid::class, 'kid_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(KidImage::class, 'kid_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(KidMessage::class, 'kid_id', 'id');
    }

    public function reports()
    {
        return $this->hasMany(KidReport::class, 'kid_id', 'id');
    }

    public function getAgeAttribute()
{
    return Carbon::parse($this->attributes['birth_date'])->age;
}

}
