<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyModel extends Model
{
    public function getLike(){
        $this->hasMany('LikeModel');
    }

    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function getQuestion(){
        return $this->belongsTo('QuestionModel');
    }
}
