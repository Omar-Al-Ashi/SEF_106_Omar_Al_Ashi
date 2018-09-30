<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\social_media;
use Illuminate\Http\Request;
// Added this
use App\Http\Controllers\Controller;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_medias = social_media::all();
        return response()->json($social_medias);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\social_media $social_media
     * @return \Illuminate\Http\Response
     */
    public function show(social_media $social_media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\social_media $social_media
     * @return \Illuminate\Http\Response
     */
    public function edit(social_media $social_media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\social_media $social_media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, social_media $social_media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\social_media $social_media
     * @return \Illuminate\Http\Response
     */
    public function destroy(social_media $social_media)
    {
        //
    }
}
