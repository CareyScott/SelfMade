<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-03-12T13:13:29+00:00




namespace App\Http\Controllers\JobSeeker;

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
      $jobSeeker = JobSeeker::all();
      $skills = Skill::all();
      $user = Auth::user();

      $user->load('jobSeeker');

      return view('jobSeeker.profile', [
        // 'jobSeeker' => $jobSeeker,
        'skills' => $skills,
        'user' => $user,
      ]);
    }
}
