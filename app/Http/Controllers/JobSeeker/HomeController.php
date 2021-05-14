<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-05-11T15:16:44+01:00




namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\User;
use App\Models\Employer;
use App\Models\Role;
use App\Models\Skill;
use App\Models\JobCategory;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:jobSeeker');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
     {
       $user = Auth::user();
       $skill = Skill::all();
       // $jobs = Job::all();
       $job = Job::all();
       $employers = Employer::all();
       // $user->load('jobSeeker');
       $jobs = Job::where('skill_id', $user->jobSeeker->skill)->get();       // $jobs = Job::where('skill_id', $user->jobSeeker->skill);
       // $user->roles()->attach(Role::where('name','jobSeeker')->first());

       // $jobs->load('skill');


       return view('jobSeeker.home', [
       'employers' => $employers,
       'jobs' => $jobs,
       'job' => $job,
       'skill' => $skill,
       'user' => $user,
       // 'jobCategories' => $jobCategories
     ]);


     }
}
