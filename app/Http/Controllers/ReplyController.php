<?php

namespace App\Http\Controllers;

use App\Models\ReplyModel as Reply;
use App\Models\QuestionModel as Question;
use App\Http\Resources\ReplyResource;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
   public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($questionSlug)
    {
        // Return replies of spesific question
        $question = Question::whereSlug($questionSlug)->first();

        if (is_null($question)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        return ReplyResource::collection($question->getReply);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $questionSlug)
    {
        // Store reply for a particular question
        $question = Question::whereSlug($questionSlug)->first();
     
        $request->validate([
            'body' => 'required|min:3',
            'user_id' => 'required',
        ]);
        
        // Store
        $reply = new Reply;
        $reply->body = $request->body;
        $reply->question_id = $question->id;
        $reply->user_id = $request->user_id;
        $reply->save();

        return new ReplyResource($reply);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplyModel  $replyModel
     * @return \Illuminate\Http\Response
     */
    public function show($questionSlug, $id)
    {
        // $questionSlug must be here otherwise error occurs
        $reply = Reply::find($id);
        if (is_null($reply)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        
        return new ReplyResource($reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplyModel  $replyModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplyModel $replyModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $questionSlug, $id)
    {
        $reply = Reply::find($id);
        if(is_null($reply)){
            return response()->json(['message' => 'Record not found!'], 404);
        }
        
        $request->validate([
            'body' => 'required|min:3',
            'user_id' => 'required',
        ]);
        
        $reply->body = $request->body;
        $reply->user_id = $request->user_id;
        $reply->save();

        return new ReplyResource($reply);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplyModel  $replyModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($questionSlug, $id)
    {
        $reply = Reply::find($id);
        if (is_null($id)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }

        // Delete
        $reply->delete();
        return response()->json(null, 204);
    }
}
