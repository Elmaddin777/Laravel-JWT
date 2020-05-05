<?php

namespace App\Http\Controllers;

use App\Models\LikeModel as Like;
use App\Models\ReplyModel as Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
    }
    
    public function likeIt($reply_id){
        Like::create([
            'reply_id' => $reply_id,
            'user_id' => 1
        ]);
    }

    public function unlikeIt($reply_id){
        Like::where(['reply_id' => $reply_id, 'user_id' => 1])
            ->first()
            ->delete();
    }
}
