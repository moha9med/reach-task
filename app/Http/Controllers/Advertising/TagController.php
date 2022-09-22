<?php

namespace App\Http\Controllers\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertising\TagRequest;
use App\Models\Advertising\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::get();
        return response()->json($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $validated = $request->validated();

        $tag = Tag::create($validated);
        return response()->json($tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response()->json($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @param  \App\Models\Advertising\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        $tag->update($validated);
        return response()->json($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        return response()->json($tag->delete());
    }
}
