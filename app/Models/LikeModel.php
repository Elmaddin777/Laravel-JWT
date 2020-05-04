<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    protected $table = 'likes';
    protected $fillable = [
        'reply_id', 'user_id'
    ];
}
