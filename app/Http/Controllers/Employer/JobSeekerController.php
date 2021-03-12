<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-03-12T12:36:20+00:00




namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\JobSkill;
use App\Models\Skill;
use App\Models\JobId;
use App\Models\JobCategory;


class JobSeekerController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:employer');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $jobSeeker = JobSeeker::findOrFail($id);
      $skills = Skill::all();

      // $jobSeeker->load('skills');

      return view('employer.jobSeekers.show', [
        'jobSeeker' => $jobSeeker,
        'skills' => $skills,
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
      //
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
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }
}
