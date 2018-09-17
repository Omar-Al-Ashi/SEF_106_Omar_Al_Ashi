<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\skill_set;
use Illuminate\Http\Request;
// Added this
use App\Http\Controllers\Controller;

class SkillSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = skill_set::all();
        return response()->json($skills);
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
     * @param  \App\skill_set  $skill_set
     * @return \Illuminate\Http\Response
     */
    public function show(skill_set $skill_set)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\skill_set  $skill_set
     * @return \Illuminate\Http\Response
     */
    public function edit(skill_set $skill_set)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\skill_set  $skill_set
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skill_set $skill_set)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\skill_set  $skill_set
     * @return \Illuminate\Http\Response
     */
    public function destroy(skill_set $skill_set)
    {
        //
    }
}
