<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\company_profile;
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
}