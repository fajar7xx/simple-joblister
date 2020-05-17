<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'image',
        'description',
        'url',
        'kota',
        'pendidikan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
