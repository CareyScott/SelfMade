<?php
# @Date:   2021-01-22T15:28:03+00:00
# @Last modified time: 2021-03-07T16:22:06+00:00

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobId;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();

        // if incorrect
        // return response()->json([], 405)
        //
        // if correct
        // return response()->json([], 200)
         return response()->json([
           'status' => 'success',
           'data' => $jobs
         ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'title' => 'required',
          'date_uploaded' => 'required',
          'valid_until' => 'required',
          'employer_id' => 'required|integer|exists:employers,id',
          'salary' => 'required|numeric|min:0',
          'description' => 'required',
          'job_category_id' => 'required|integer|exists:job_categories,id',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }

        $job = new Job();


        $job->title = $request->input('title');
        $job->date_uploaded = $request->input('date_uploaded');
        $job->valid_until = $request->input('valid_until');
        $job->employer_id = $request->input('employer_id');
        $job->salary = $request->input('salary');
        $job->description = $request->input('description');
        $job->job_category_id = $request->input('job_category_id');

        $job->save();

        $job_ids = new JobId();
        $job_ids->job_id = $job->id;
        $job_ids->employer_id = $job->employer_id;
        $job_ids->save();

        return response()->json([
          'status' => 'success',
          'data' => $job
        ], 200);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);

        if ($job === null){
          $statusMsg = "Job Not Found";
          $statusCode = 404;
        }
        else{
          $job->load('employer');
          $job->load('job_category');
          $statusMsg = "Success";
          $statusCode = 200;
        }
        return response()->json([
          'status' => $statusMsg,
          'data' => $job
        ], $statusCode);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if($job === null) {
          return response()->json([
            'status' => 'Job Not Found',
            'data' => null
          ], 404) ;

        }

        $rules = [
          'title' => 'required',
          'date_uploaded' => 'required',
          'valid_until' => 'required',
          'employer_id' => 'required|integer|exists:employers,id',
          'salary' => 'required|numeric|min:0',
          'description' => 'required',
          'job_category_id' => 'required|integer|exists:job_categories,id',

        ];
        $validator = Validator::make($request->all(), $rules);

        $job->title = $request->input('title');
        $job->date_uploaded = $request->input('date_uploaded');
        $job->valid_until = $request->input('valid_until');
        $job->employer_id = $request->input('employer_id');
        $job->salary = $request->input('salary');
        $job->description = $request->input('description');
        $job->job_category_id = $request->input('job_category_id');

        $job->save();

        return response()->json([
          'status' => 'success',
          'data' => $job
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::Find($id);

        if ($job === null){
          $statusMsg = "Job Not Found";
          $statusCode = 404;
        }
        else{
          $job->delete();
          $statusMsg = "Success Job Deleted";
          $statusCode = 200;
        }
        return response()->json([
          'status' => $statusMsg,
          'data' => null
        ], $statusCode);
    }
}
