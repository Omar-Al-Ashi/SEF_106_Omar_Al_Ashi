<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\admin_profile;
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
}
