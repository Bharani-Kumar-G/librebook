<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable =[
        'id',
        'user_id',
        'bio',
        'url',
        'profile_image',
        'cover_image',
        'is_online',
        'last_logged_in'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
