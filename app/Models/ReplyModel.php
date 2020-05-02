<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyModel extends Model
{
    protected $table = 'replies';

    public function getLike(){
        return $this->hasMany('App\Models\LikeModel', 'reply_id', 'id');
    }

    public function getUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getQuestion(){
        return $this->belongsTo('App\Models\QuestionModel', 'question_id', 'id');
    }
}
