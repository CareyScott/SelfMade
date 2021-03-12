<?php
# @Date:   2021-01-23T15:44:26+00:00
# @Last modified time: 2021-03-12T18:07:03+00:00





namespace App\Http\Controllers;

        use Illuminate\Http\Request;
        use Auth;

        class EmployersIndexController extends Controller
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
            public function index(Request $request)
            {

              $user = Auth::user();
              $employer = 'employer';

              if($user->hasRole('admin')){
                $employer = 'admin.employers.index';
              }
              else if ($user->hasRole('employer')) {
                $employer = 'employer.employers.index';
              }
              else if ($user->hasRole('user')) {
                $employer = 'user.employers.index';
              }
              else if ($user->hasRole('jobSeeker')) {
                $employer = 'jobSeeker.employers.index';
              }




                return redirect()->route($employer);
            }
        }
