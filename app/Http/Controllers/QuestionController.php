<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel as Question;
use Validator;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::latest()->get(); 
        return QuestionResource::collection($question);
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
    public function store(Request $request)
    {
        // Validate
        $rules = [
            'title' => 'required|min:3',
            'slug'  => 'required',
            'body'  => 'required|min:10',
            'cat_id' => 'required',
            'user_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create
        $question = Question::create($request->all());
        return new QuestionResource($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $question = Question::whereSlug($slug)->first();
        if(is_null($question)){
            return response()->json(['message' => 'Record not found!'], 404);
        }
        
        return new QuestionResource($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $question = Question::whereSlug($slug)->first();
        if (is_null($question)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }   

        // Validate
        $rules = [
            'title' => 'required|min:3',
            'slug'  => 'required',
            'body'  => 'required|min:10',
            'cat_id' => 'required',
            'user_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $question->update($request->all());
        return new QuestionResource($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $question = Question::whereSlug($slug)->first();
        if (is_null($question)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $question->delete();
        return response()->json(null, 204);
    }
}
