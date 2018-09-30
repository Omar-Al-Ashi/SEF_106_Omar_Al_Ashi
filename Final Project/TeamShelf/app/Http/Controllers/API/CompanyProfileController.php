<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\company_profile;
use Illuminate\Http\Request;
// Added this
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company_profile::all();
        return response()->json($companies);
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
     * @param  \App\company_profile $company_profile
     * @return \Illuminate\Http\Response
     */
    public function show(company_profile $company_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company_profile $company_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(company_profile $company_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\company_profile $company_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company_profile $company_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company_profile $company_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(company_profile $company_profile)
    {
        //
    }
}
