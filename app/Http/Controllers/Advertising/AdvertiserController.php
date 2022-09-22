<?php

namespace App\Http\Controllers\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertising\AdvertiserRequest;
use App\Models\Advertising\Advertiser;


class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisers = Advertiser::get();
        return response()->json($advertisers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdvertiserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertiserRequest $request)
    {
        $validated = $request->validated();

        $advertiser = Advertiser::create($validated);
        return response()->json($advertiser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(Advertiser $advertiser)
    {
        return response()->json($advertiser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdvertiserRequest  $request
     * @param  \App\Models\Advertising\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertiserRequest $request, Advertiser $advertiser)
    {
        $validated = $request->validated();

        $advertiser->update($validated);
        return response()->json($advertiser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertiser $advertiser)
    {
        return response()->json($advertiser->delete());
    }
}
