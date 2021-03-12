<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-03-12T13:26:50+00:00




namespace App\Http\Controllers\JobSeeker;

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
use Hash;
use App\Models\JobCategory;


class JobSeekerController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:jobSeeker');
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
      $skill = Skill::all();

      // $jobSeeker->load('skills');

      return view('jobSeeker.jobSeekers.show', [
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
      // $user = User::findOrFail($id);
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

      return redirect()->route('jobSeeker.profile');

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

      return redirect()->route('home');
    }
}
