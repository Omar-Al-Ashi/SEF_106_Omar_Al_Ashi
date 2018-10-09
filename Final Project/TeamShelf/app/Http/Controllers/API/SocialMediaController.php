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
}
