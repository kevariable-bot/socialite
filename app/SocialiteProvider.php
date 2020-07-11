<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialiteProvider extends Model
{
    /**
     * Mass Assignment
     */
    protected $fillable = [
        'provider_id', 'provider_name'
    ];

    /**
     * Many to One SocialiteProvider -> User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
