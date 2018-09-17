<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\admin_profile;
use Illuminate\Http\Request;
// Added this
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_profile = admin_profile::all();
        return response()->json($admin_profile);
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
     * @param  \App\admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function show(admin_profile $admin_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(admin_profile $admin_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin_profile $admin_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin_profile $admin_profile)
    {
        //
    }
}
