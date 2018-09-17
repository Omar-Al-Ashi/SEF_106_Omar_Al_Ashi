<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\education_detail;
use Illuminate\Http\Request;
// Added this
use App\Http\Controllers\Controller;

class EducationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = education_detail::all();
        return response()->json($educations);
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
     * @param  \App\education_detail  $education_detail
     * @return \Illuminate\Http\Response
     */
    public function show(education_detail $education_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\education_detail  $education_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(education_detail $education_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\education_detail  $education_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, education_detail $education_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\education_detail  $education_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(education_detail $education_detail)
    {
        //
    }
}
