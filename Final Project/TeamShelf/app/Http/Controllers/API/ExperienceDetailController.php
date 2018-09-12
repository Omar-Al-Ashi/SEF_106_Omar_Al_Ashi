<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\experience_detail;
use Illuminate\Http\Request;
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
        $experience = experience_detail::all();
        return response()->json($experience);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\experience_detail  $experience_detail
     * @return \Illuminate\Http\Response
     */
    public function show(experience_detail $experience_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\experience_detail  $experience_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(experience_detail $experience_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\experience_detail  $experience_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experience_detail $experience_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\experience_detail  $experience_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience_detail $experience_detail)
    {
        //
    }
}
