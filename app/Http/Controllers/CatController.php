<?php

namespace App\Http\Controllers;

use App\Models\CatModel as Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;

class CatController extends Controller
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

    public function index()
    {   
        $cats = Cat::latest()->get();
        return CatResource::collection($cats);
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
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $cat = new Cat;
        $cat->name = $request->name;
        $cat->slug = str_slug($cat->name);
        $cat->save();

        return new CatResource($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cat = Cat::whereSlug($slug)->first();
        if (is_null($cat)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }

        return new CatResource($cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatModel  $catModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CatModel $catModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $cat = Cat::whereSlug($slug)->first();
        if (is_null($cat)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $request->validate([
            'name' => 'required|min:3',
        ]);

        $cat->name = $request->name;
        $cat->slug = str_slug($cat->name);
        $cat->save();

        return new CatResource($cat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $cat = Cat::whereSlug($slug)->first();
        if (is_null($cat)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $cat->delete();
        return response()->json(null, 204);
    }
}
