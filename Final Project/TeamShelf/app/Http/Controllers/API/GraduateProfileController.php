<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\graduate_profile;
use Illuminate\Http\Request;
// Added this
use App\Http\Controllers\Controller;

class GraduateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduates = graduate_profile::all();
        return response()->json($graduates);
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
     * @param  \App\graduate_profile  $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function show(graduate_profile $graduate_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\graduate_profile  $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(graduate_profile $graduate_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\graduate_profile  $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, graduate_profile $graduate_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\graduate_profile  $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(graduate_profile $graduate_profile)
    {
        //
    }
}
