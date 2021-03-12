<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-03-12T11:53:39+00:00




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
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      {
        $jobs = Job::paginate(5);

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


      smilify('success', 'Job Created Successfully');

      return redirect()->route('admin.jobs.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

      return redirect()->route('admin.jobs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $job = Job::findOrFail($id);
      $job->delete();

      return redirect()->route('admin.jobs.index');
    }
}
