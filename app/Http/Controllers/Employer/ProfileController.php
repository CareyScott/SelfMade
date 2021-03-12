<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-03-12T13:13:12+00:00




namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Skill;
use App\Models\Job;

use Auth;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:employer');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $employer = Employer::all();
      $skill = Skill::all();
      $jobs = Job::all();
      $user = Auth::user();

      $user->load('employer');
      $employer->load('jobs');

      return view('employer.profile', [
        'jobs' => $jobs,
        'skill' => $skill,
        'user' => $user,
      ]);
    }
}
