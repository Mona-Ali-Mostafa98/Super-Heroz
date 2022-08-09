<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    use HasFactory;

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

}
