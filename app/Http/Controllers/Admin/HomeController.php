<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-03-11T17:04:48+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\User;
use App\Models\Employer;
use App\Models\Role;
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
         $this->middleware('role:admin');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $jobSeekers = JobSeeker::all();

      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();


      return view('admin.home', [
      'jobSeekers' => $jobSeekers,
      'jobs' => $jobs,
      'employers' => $employers,
      'jobCategories' => $jobCategories
    ]);


    }
}
