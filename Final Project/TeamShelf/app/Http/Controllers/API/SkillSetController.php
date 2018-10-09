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
}
