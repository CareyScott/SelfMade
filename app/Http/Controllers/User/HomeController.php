<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-01-23T15:37:37+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
         $this->middleware('role:user');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = Auth::user();

        //$user->authorizeRoles('user');

        return view('user.home');
    }
}
