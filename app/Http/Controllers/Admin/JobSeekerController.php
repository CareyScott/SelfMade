<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-05-14T15:23:09+01:00




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



// admin has the ability to manage $jobSeekers

class JobSeekerController extends Controller
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
    public function index()
    {
      {
        $jobSeekers = JobSeeker::simplePaginate(5);

        $jobs = Job::all();
        $employers = Employer::all();
        $jobCategories = JobCategory::all();
        $skills = Skill::all();


        return view('admin.jobSeekers.index', compact('jobSeekers'), [
        'jobSeekers' => $jobSeekers,
        'jobs' => $jobs,
        'employers' => $employers,
        'jobCategories' => $jobCategories,
        'skills' => $skills
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
        'skill' => 'required',
        // 'skill_id_2' => 'required',
        // 'skill_id_3' => 'required',

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
      $jobSeeker->skill = $request->input('skill');
      // $jobSeeker->skill_id_2 = $request->input('skill_id_2');
      // $jobSeeker->skill_id_3 = $request->input('skill_id_3');
      $jobSeeker->user_id = $user->id;
      $jobSeeker->save();

      $skill_jobSeeker = Skill::where('name', $jobSeeker->skill)->first();

      $jobSkill = new JobSkill();
      $jobSkill->skill_id = $jobSeeker->skill;
      $jobSkill->jobSeeker_id =  $jobSeeker->id;
      $jobSkill->save();
      $jobSkill->skills()->attach($skill_jobSeeker);


      // $jobSkill = new JobSkill();
      //
      //
      // if(is_array($jobSeeker->skill)){
      //
      //   foreach (request('skill') as $skill_jobSeeker) {
      //     $jobSkill->skill_id = $jobSeeker->skill;
      //     $jobSkill->jobSeeker_id =  $jobSeeker->id;
      //     $jobSkill->save();
      //     $jobSkill->skills()->attach($skill_jobSeeker);
      //   }
      //   }

      //
      // $jobSkill = new JobSkill();
      // $jobSkill->skill_id = $jobSeeker->skill_id_2;
      // $jobSkill->jobSeeker_id =  $jobSeeker->id;
      // $jobSkill->save();
      //
      // $jobSkill = new JobSkill();
      // $jobSkill->skill_id = $jobSeeker->skill_id_3;
      // $jobSkill->jobSeeker_id =  $jobSeeker->id;
      // $jobSkill->save();

      smilify('success', 'Job Created Successfully');

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
      $skills = Skill::all();

      // $jobSeeker->load('skills');

      return view('admin.jobSeekers.show', [
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
      $jobSeeker = JobSeeker::findOrFail($id);
      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();
      $jobSkills = JobSkill::all();
      $skills = Skill::all();

      return view('admin.jobSeekers.edit', [
      'jobSeeker' => $jobSeeker,
      'jobs' => $jobs,
      'employers' => $employers,
      'jobCategories' => $jobCategories,
      'jobSkills' => $jobSkills,
      'skills' => $skills,
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
      {
      $request->validate([
        'name' => 'required|max:191',
        'phone' => 'required|max:191',
        'email' => 'required|max:191',
        'personal_postal_address' => 'required|max:191',
        'personal_bio' => 'required|max:191',
        'education' => 'required',
        'skill' => 'required',

      ]);

      $jobSeeker = JobSeeker::findOrFail($id);
      $user = User::findOrFail($id);
      // $jobSkill = JobSkill::findOrFail($id);

      $jobSeeker->user->name = $request->input('name');
      $jobSeeker->user->phone = $request->input('phone');
      $jobSeeker->user->email = $request->input('email');
      $jobSeeker->user->password = Hash::make('secret');
      $jobSeeker->user->save();


      $jobSeeker->personal_postal_address = $request->input('personal_postal_address');
      $jobSeeker->personal_bio = $request->input('personal_bio');
      $jobSeeker->education = $request->input('education');
      $jobSeeker->skill = $request->input('skill');
      $jobSeeker->save();


      // $jobSkill->skill_id = $jobSeeker->skill;
      // $jobSkill->jobSeeker_id =  $jobSeeker->id;
      // $jobSkill->save();

      smilify('success', 'User Updated Successfully');


      return redirect()->route('admin.jobSeekers.index');

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $jobSeeker = JobSeeker::findOrFail($id);
      $jobSeeker->user->delete();
      $jobSeeker->delete();

      smilify('success', 'User Deleted Successfully');


      return redirect()->route('admin.jobSeekers.index');
    }
}
