<?php
# @Date:   2021-01-23T15:44:26+00:00
# @Last modified time: 2021-05-14T15:48:39+01:00





namespace App\Http\Controllers;

        use Illuminate\Http\Request;
        use Auth;

        class JobsMarketController extends Controller
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
             // redurects the user to their designated jobs market 
            public function index(Request $request)
            {

              $user = Auth::user();
              $market = 'market';

              if($user->hasRole('admin')){
                $market = 'admin.jobs.index';
              }
              else if ($user->hasRole('employer')) {
                $market = 'employer.jobs.index';
              }
              else if ($user->hasRole('user')) {
                $market = 'user.jobs.index';
              }
              else if ($user->hasRole('jobSeeker')) {
                $market = 'jobSeeker.jobs.index';
              }




                return redirect()->route($market);
            }
        }
