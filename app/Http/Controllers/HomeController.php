<?php
# @Date:   2020-11-30T10:42:41+00:00
# @Last modified time: 2021-05-14T15:48:09+01:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // this function gets the current users auth role and redirects them to the correct home view
    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'guest.home';

        if($user->hasRole('admin')){
          $home = 'admin.home';
        }
        else if ($user->hasRole('employer')) {
          $home = 'employer.home';
        }
        else if ($user->hasRole('user')) {
          $home = 'user.home';
        }
        else if ($user->hasRole('jobSeeker')) {
          $home = 'jobSeeker.home';
        }
        else if ($user->hasRole('guest')) {
          $home = 'guest.home';
        }

        return redirect()->route($home);
    }
}
