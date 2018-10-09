<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\experience_detail;
// Added this
use App\Http\Controllers\Controller;

class ExperienceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = experience_detail::all();
        return response()->json($experiences);
    }
}
