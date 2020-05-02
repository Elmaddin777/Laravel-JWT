<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function getReply(){
        return $this->hasMany('ReplyModel');
    }

    public function getCat(){
        return $this->belongsTo('CatModel');
    }

}
