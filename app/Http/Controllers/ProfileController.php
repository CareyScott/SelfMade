<?php
# @Date:   2020-11-30T10:42:41+00:00
# @Last modified time: 2021-05-14T15:50:06+01:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // redirects the user to their designated user profile
    public function index(Request $request)
    {

        $user = Auth::user();
        $profile = 'profile';

        if($user->hasRole('admin')){
          $profile = 'admin.profile';
        }
        else if ($user->hasRole('employer')) {
          $profile = 'employer.profile';
        }
        else if ($user->hasRole('user')) {
          $profile = 'user.profile';
        }
        else if ($user->hasRole('jobSeeker')) {
          $profile = 'jobSeeker.profile';
        }




        return redirect()->route($profile);
    }
}
