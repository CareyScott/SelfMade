<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-03-08T18:11:42+00:00




namespace App\Http\Controllers\Employer;

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
         $this->middleware('role:employer');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $employer = JobSeeker::all();
      $skill = Skill::all();
      $user = Auth::user();

      $user->load('employer');

      return view('employer.profile', [
        // 'employer' => $employer,
        'skill' => $skill,
        'user' => $user,
      ]);
    }
}
