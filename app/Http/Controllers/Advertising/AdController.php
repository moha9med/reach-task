<?php

namespace App\Http\Controllers\Advertising;

use App\Http\Controllers\Controller;
use App\Models\Advertising\Ad;
use App\Http\Requests\Advertising\StoreAdRequest;
use App\Http\Requests\Advertising\UpdateAdRequest;
use App\Models\Advertising\Advertiser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ads = Ad::query();
        if (request('category_id')) {
            $ads->FilterCategory($request->category_id);
        }
        if (request('tag_id')) {
            $ads->FilterTag($request->tag_id);
        }

        $ads = $ads->with('tags', 'category')->get();
        return response()->json($ads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        $validated = $request->validated();

        $ad = Ad::create($validated);
        return response()->json($ad);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return response()->json($ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdRequest  $request
     * @param  \App\Models\Advertising\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $validated = $request->validated();

        $ad->update($validated);
        return response()->json($ad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        return response()->json($ad->delete());
    }

    public function advertiserAds($id)
    {
        $ads = Ad::where('advertiser_id', $id)->get();
        return response()->json($ads);
    }
}
