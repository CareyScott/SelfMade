<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-05-14T15:01:18+01:00

// this controller handles all of the data being passed to the admin home page


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
       // middleware ensures the correct user role is accessing this page
         $this->middleware('auth');
         $this->middleware('role:admin');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     // displays the correct data to the home page
    public function index()
    {

      // assigns $jobSeekers to each of the jobSeekers from the model class
      $jobSeekers = JobSeeker::all();

      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();


      // data recieved and returned to the home view
      return view('admin.home', [
      'jobSeekers' => $jobSeekers,
      'jobs' => $jobs,
      'employers' => $employers,
      'jobCategories' => $jobCategories
    ]);


    }
}
