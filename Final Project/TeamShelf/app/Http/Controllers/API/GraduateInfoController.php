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
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class GraduateInfoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        //validation
        $validationArray = [
            $request->id => 'required',
            $request->first_name => 'required',
            $request->last_name => 'required',
            $request->residency_location => 'required',
            $request->major => 'required',
            $request->institute => 'required',
            $request->education_start_date => 'required',
            $request->education_end_date => 'required',
            $request->gpa => 'required',
            $request->certificate_name => 'required',
            $request->isCurrentJob => 'required',
            $request->experience_start_date => 'required',
            $request->experience_end_date => 'required',
            $request->title => 'required',
            $request->company_name => 'required',
            $request->company_location => 'required',
            $request->description => 'required',
            $request->skills => 'required',
            $request->linkedin => 'required',
            $request->github => 'required',
        ];


//        $validator = Validator::make($request->all(), $validationArray);
//        if ($validator->fails()) {
//            $response = ['errors' => $validator->messages()->all()];
//            return Response::json($response, 200);
//        } else {
            DB::table('graduate_profiles')->insert([
                'user_id' => $request->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'residency_location' => $request->residency_location,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('education_details')->insert([
                'user_id' => $request->id,
                'major' => $request->major,
                'institute_university_name' => $request->institute,
                'starting_date' => $request->education_start_date,
                'ending_date' => $request->education_end_date,
                'grade_gpa' => $request->gpa,
                'description' => $request->education_description,
                'certificate_degree_name' => $request->certificate_name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('experience_details')->insert([
                'user_id' => $request->id,
                'is_current_job' => $request->isCurrentJob,
                'starting_date' => $request->experience_start_date,
                'ending_date' => $request->experience_end_date,
                'job_title' => $request->title,
                'company_name' => $request->company_name,
                'job_location' => $request->company_location,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('skill_sets')->insert([
                'user_id' => $request->id,
                'skill_set_name' => $request->skills,
                'skill_level' => $request->skill_level,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('social_media')->insert([
                'user_id' => $request->id,
                'linkedin' => $request->linkedin,
                'github' => $request->github,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $response = array('response_message' => 'done successfully', 'response_code' => 1, 'result' => $request->all());
            return json_encode($response);
        }
//    }
}
