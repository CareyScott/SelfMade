<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-05-14T15:11:55+01:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\JobId;
use App\Models\Skill;
use App\Models\JobCategory;


class JobController extends Controller
{

  public function __construct()
  {
    // middleware ensures the correct user role is accessing this page

      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // gets all data to display in index
    public function index()
    {
      {
        // paginate separates results to pages of 5 with links at the bottom 
        $jobs = Job::simplePaginate(5);

        // $jobs = Job::all();
        $employers = Employer::all();
        $jobCategories = JobCategory::all();
        $skills = Skill::all();



        return view('admin.jobs.index', compact('jobs'), [
        'jobs' => $jobs,
        'employers' => $employers,
        'jobCategories' => $jobCategories,
        'skills' => $skills,


        // ->whereRaw('DATEDIFF(CURDATE(),STR_TO_DATE(created_at, '%Y-%m-%d'))'), $daysTillTrialEnds)
      ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //create form gets all data needed for this page
    public function create()
    {
      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();
      $job_ids = JobId::all();
      $skills = Skill::all();

      return view('admin.jobs.create', [
      'jobs' => $jobs,
      'employers' => $employers,
      'jobCategories' => $jobCategories,
      'job_ids' => $job_ids,
      'skills' => $skills,


    ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // POST for jobs
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|max:191',
        'employer_id' => 'required|max:191',
        'date_uploaded' => 'required',
        'valid_until' => 'required|after:today',
        'salary' => 'required|between:0,99.99',
        'description' => 'required',
        'job_category_id' => 'required',
        'skill_id' => 'required',

      ]);

      $job = new Job();

      $job->title = $request->input('title');
      $job->employer_id = $request->input('employer_id');
      $job->date_uploaded = $request->input('date_uploaded');
      $job->valid_until = $request->input('valid_until');
      $job->salary = $request->input('salary');
      $job->description = $request->input('description');
      $job->job_category_id = $request->input('job_category_id');
      $job->skill_id = $request->input('skill_id');
      $job->save();

      $job_ids = new JobId();
      $job_ids->job_id = $job->id;
      $job_ids->employer_id = $job->employer_id;
      $job_ids->save();

      // confirmation from notify
      smilify('success', 'Job Created Successfully');

      return redirect()->route('admin.jobs.show', $job->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // gets and returns the job from the id which was passed into the function from the resources view
    public function show($id)
    {
      $job = Job::findOrFail($id);
      $skills = Skill::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();



      return view('admin.jobs.show', [
        'job' => $job,
        'skills' => $skills,
        'employers' => $employers,
        'jobCategories' => $jobCategories,

      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // data inputted and sent to update function
    public function edit($id)
    {
      $job = Job::findOrFail($id);
      $employers = Employer::all();
      $jobCategories = JobCategory::all();

      return view('admin.jobs.edit', [
      'job' => $job,
      'employers' => $employers,
      'jobCategories' => $jobCategories,

    ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //PUT for jobs
    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required|max:191',
        'employer_id' => 'required|max:191',
        'date_uploaded' => 'required',
        'valid_until' => 'required',
        'salary' => 'required|between:0,99.99',
        'description' => 'required',
        'job_category_id' => 'required',
        'skill_id' => 'required',

      ]);

      $job = Job::findOrFail($id);

      $job->title = $request->input('title');
      $job->employer_id = $request->input('employer_id');
      $job->date_uploaded = $request->input('date_uploaded');
      $job->valid_until = $request->input('valid_until');
      $job->salary = $request->input('salary');
      $job->description = $request->input('description');
      $job->job_category_id = $request->input('job_category_id');
      $job->skill_id = $request->input('skill_id');

      $job->save();

      smilify('success', 'Job Updated Successfully');

      // the route followed by id passes the job object which has just being updated back to the view page
      return redirect()->route('admin.jobs.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //deletes the job retrieved correlating with the corrisponding id
    public function destroy($id)
    {
      $job = Job::findOrFail($id);
      $job->delete();

// confirmation of the job being deleted
      smilify('success', 'Job Deleted Successfully');

//return home
      return redirect()->route('admin.jobs.index');
    }
}
