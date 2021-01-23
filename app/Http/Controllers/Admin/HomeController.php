<?php
# @Date:   2020-11-30T10:54:30+00:00
# @Last modified time: 2021-01-23T15:30:32+00:00




namespace App\Http\Controllers\Admin;

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
         $this->middleware('role:admin');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = Auth::user();

        //$user->authorizeRoles('admin');

        return view('admin.home');
    }
}
