<?php

//changed the namespace
namespace App\Http\Controllers\API;

use App\education_detail;
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
}
