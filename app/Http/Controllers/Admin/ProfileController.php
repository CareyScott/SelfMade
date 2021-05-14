<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-05-14T15:23:07+01:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSeeker;
use App\Models\Skill;

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
       // middleware ensures the correct user role is accessing this page

         $this->middleware('auth');
         $this->middleware('role:admin');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //gets all of the data needed for the users profile
    public function index()
    {
      $jobSeeker = JobSeeker::all();
      $skill = Skill::all();
      $user = Auth::user();

      // loads the users job seeker object
      $user->load('jobSeeker');

      return view('admin.profile', [
        // 'jobSeeker' => $jobSeeker,
        'skill' => $skill,
        'user' => $user,
      ]);
    }
}
