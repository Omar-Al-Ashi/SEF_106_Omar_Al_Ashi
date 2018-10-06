<?php /** @noinspection SqlDialectInspection */

//changed the namespace
namespace App\Http\Controllers\API;

use App\graduate_profile;
// Added the bellow usages to add the data to the tables
use App\education_detail;
use App\experience_detail;
use App\skill_set;
use App\social_media;
use App\user;
use Illuminate\Support\Facades\DB;
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

    public function returnAllGraduatesWithAllInfo()
    {
        $allGraduates = DB::select('SELECT *
                            FROM graduate_profiles,
                                          experience_details,
                                          education_details,
                                          skill_sets,
                                          social_media,
                                          users
                            WHERE graduate_profiles.user_id = experience_details.user_id
                            AND graduate_profiles.user_id =  education_details.user_id
                            AND graduate_profiles.user_id =  skill_sets.user_id
                            AND graduate_profiles.user_id =  social_media.user_id
                            AND graduate_profiles.user_id =  users.id;');

        return response()->json($allGraduates);
    }

    public function returnSpecificGraduateInfo($id)
    {
        $allGraduates = DB::select("SELECT *
                            FROM graduate_profiles,
                                          experience_details,
                                          education_details,
                                          skill_sets,
                                          social_media,
                                          users
                            WHERE graduate_profiles.user_id = experience_details.user_id
                            AND graduate_profiles.user_id =  education_details.user_id
                            AND graduate_profiles.user_id =  skill_sets.user_id
                            AND graduate_profiles.user_id =  social_media.user_id
                            AND graduate_profiles.user_id =  users.id
                            AND graduate_profiles.user_id = $id;");

        return response()->json($allGraduates);
    }

    public function search(Request $request)
    {
//        return "Hello";
//        $result = DB::select("SELECT *
//FROM graduate_profiles,
//     experience_details,
//     education_details,
//     skill_sets,
//     social_media,
//     users
//WHERE graduate_profiles.user_id = experience_details.user_id
//              AND graduate_profiles.user_id = education_details.user_id
//              AND graduate_profiles.user_id = skill_sets.user_id
//              AND graduate_profiles.user_id = social_media.user_id
//              AND graduate_profiles.user_id = users.id
//  /**           AND graduate_profiles.first_name LIKE '%$request->query%'*/
//              AND graduate_profiles.first_name LIKE '%React%'
///**   OR graduate_profiles.last_name LIKE '%$request->query%' */
//   OR graduate_profiles.last_name LIKE '%React%'
///**   OR skill_sets.skill_set_name LIKE '%$request->query%' */
//   OR skill_sets.skill_set_name LIKE '%React%'
//   ");

        $result = DB::select("SELECT graduate_profiles.user_id, first_name, last_name, job_title, institute_university_name, github, linkedin, email, user_image
FROM graduate_profiles,
     experience_details,
     education_details,
     skill_sets,
     social_media,
     users
WHERE graduate_profiles.user_id = experience_details.user_id
              AND graduate_profiles.user_id = education_details.user_id
              AND graduate_profiles.user_id = skill_sets.user_id
              AND graduate_profiles.user_id = social_media.user_id
              AND graduate_profiles.user_id = users.id
              AND graduate_profiles.first_name LIKE '%Omar%'
   OR graduate_profiles.last_name LIKE '%Omar%'
   OR skill_sets.skill_set_name LIKE '%Omar%'
   ");

        return response()->json($result);

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
     * @return array
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\graduate_profile $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function show(graduate_profile $graduate_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\graduate_profile $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(graduate_profile $graduate_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\graduate_profile $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, graduate_profile $graduate_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\graduate_profile $graduate_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(graduate_profile $graduate_profile)
    {
        //
    }
}
