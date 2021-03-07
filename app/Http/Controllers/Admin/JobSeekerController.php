<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-03-07T15:14:44+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use Hash;
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
        $jobSeekers = JobSeeker::paginate(5);

        $jobs = Job::all();
        $employers = Employer::all();
        $jobCategories = JobCategory::all();


        return view('admin.jobSeekers.index', compact('jobSeekers'), [
        'jobSeekers' => $jobSeekers,
        'jobs' => $jobs,
        'employers' => $employers,
        'jobCategories' => $jobCategories
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
      $jobSeekers = JobSeeker::all();
      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();
      $jobSkills = JobSkill::all();
      $skills = Skill::all();

      return view('admin.jobSeekers.create', [
      'jobSeekers' => $jobSeekers,
      'jobs' => $jobs,
      'employers' => $employers,
      'jobCategories' => $jobCategories,
      'jobSkills' => $jobSkills,
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
        'personal_postal_address' => 'required|max:191',
        'personal_bio' => 'required|max:191',
        'education' => 'required',
        'skill_id_1' => 'required',
        'skill_id_2' => 'required',
        'skill_id_3' => 'required',

      ]);

      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();
      $role_jobSeeker = Role::where('name', 'jobSeeker')->first();

      // $visit = Visit::findOrFail($id);
      $user = new User();
      $user->name = $request->input('name');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_jobSeeker);


      $jobSeeker = new JobSeeker();
      $jobSeeker->personal_postal_address = $request->input('personal_postal_address');
      $jobSeeker->personal_bio = $request->input('personal_bio');
      $jobSeeker->education = $request->input('education');
      $jobSeeker->skill_id_1 = $request->input('skill_id_1');
      $jobSeeker->skill_id_2 = $request->input('skill_id_2');
      $jobSeeker->skill_id_3 = $request->input('skill_id_3');
      $jobSeeker->user_id = $user->id;
      $jobSeeker->save();

      $jobSkill = new JobSkill();
      $jobSkill->skill_id = $jobSeeker->skill_id_1;
      $jobSkill->jobSeeker_id =  $jobSeeker->id;
      $jobSkill->save();

      $jobSkill = new JobSkill();
      $jobSkill->skill_id = $jobSeeker->skill_id_2;
      $jobSkill->jobSeeker_id =  $jobSeeker->id;
      $jobSkill->save();

      $jobSkill = new JobSkill();
      $jobSkill->skill_id = $jobSeeker->skill_id_3;
      $jobSkill->jobSeeker_id =  $jobSeeker->id;
      $jobSkill->save();

      smilify('success', 'User Created Successfully');

      return redirect()->route('admin.jobSeekers.index');

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
      $skill = Skill::all();

      return view('admin.jobSeekers.show', [
        'jobSeeker' => $jobSeeker,
        'skill' => $skill,
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

      return view('admin.jobSeekers.edit', [
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
        'personal_postal_address' => 'required|max:191',
        'personal_bio' => 'required|max:191',
        'skills' => 'required',
        'skill_id_1' => 'required',
        'skill_id_2' => 'required',
        'skill_id_3' => 'required',
      ]);

      $job = Job::findOrFail($id);

      $job->title = $request->input('title');
      $job->employer_id = $request->input('employer_id');
      $job->date_uploaded = $request->input('date_uploaded');
      $job->valid_until = $request->input('valid_until');
      $job->salary = $request->input('salary');
      $job->description = $request->input('description');
      $job->job_category_id = $request->input('job_category_id');

      $job->save();

      return redirect()->route('admin.jobSeekers.index');

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

      return redirect()->route('admin.jobSeekers.index');
    }
}
