<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-03-10T18:06:58+00:00




namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\JobId;
use App\Models\JobCategory;
use Auth;

class JobController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      {
        $jobs = Job::paginate(5);

        // $jobs = Job::all();
        $employers = Employer::all();
        $jobCategories = JobCategory::all();


        return view('jobSeeker.jobs.index', compact('jobs'), [
        'jobs' => $jobs,
        'employers' => $employers,
        'jobCategories' => $jobCategories

        // ->whereRaw('DATEDIFF(CURDATE(),STR_TO_DATE(created_at, '%Y-%m-%d'))'), $daysTillTrialEnds)
      ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $job = Job::findOrFail($id);

      return view('jobSeeker.jobs.show', [
        'job' => $job,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
    }
  }
