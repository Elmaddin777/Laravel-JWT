<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    
    public function getUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getReply(){
        return $this->hasMany('App\Models\ReplyModel', 'reply_id', 'id');
    }

    public function getCat(){
        return $this->belongsTo('App\Models\CatModel', 'cat_id', 'id');
    }

}
