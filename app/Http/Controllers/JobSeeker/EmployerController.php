<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-05-11T17:04:19+01:00




namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\Role;
use App\Models\JobCategory;
use Hash;


class EmployerController extends Controller
{

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
        $employers = Employer::simplepaginate(5);
        // $jobs = Job::where('employer_id', $employer->id)->get();
        $jobCategories = JobCategory::all();

        return view('jobSeeker.employers.index', compact('employers'), [
        // 'jobs' => $jobs,
        'employers' => $employers,
        'jobCategories' => $jobCategories


      ] );
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();

      return view('jobSeeker.employers.create', [
      'jobs' => $jobs,
      'employers' => $employers,
      'jobCategories' => $jobCategories,

    ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      {
        $request->validate([
          'name' => 'required|max:191',
          'phone' => 'required|max:191',
          'email' => 'required|max:191',
          'company_postal_address' => 'required',
          'category' => 'required',
      ]);

        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_employer = Role::where('name', 'employer')->first();

        // $visit = Visit::findOrFail($id);
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_employer);

        $employer = new Employer();
        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');
        $employer->user_id = $user->id;
        $employer->save();

        smilify('success', 'Employer Created Successfully');


        return redirect()->route('jobSeeker.employers.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employer = Employer::findOrFail($id);
      $jobs = Job::where('employer_id', $employer->id)->get();

      // $employer->load('job');


      return view('jobSeeker.employers.show', [
        'employer' => $employer,
        'jobs' => $jobs,
        // 'employer_id' => $employer_id,

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

      $employer = Employer::findOrFail($id);
      $user = User::all();


      return view('jobSeeker.employers.edit', [
      'employer' => $employer,
      'user' => $user,

    ] );
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
      {
        $request->validate([
          'name' => 'required|max:191',
          'phone' => 'required|max:191',
          'email' => 'required|max:191',
          'company_postal_address' => 'required',
          'category' => 'required',

        ]);
        $user = User::findOrFail($id);
        $employer = Employer::findOrFail($id);

        $employer->user->name = $request->input('name');
        $employer->user->phone = $request->input('phone');
        $employer->user->email = $request->input('email');
        $employer->user->password = Hash::make('secret');
        $employer->user->save();


        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');
        $employer->save();

        return redirect()->route('jobSeeker.employers.index');

      }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employer = Employer::findOrFail($id);
      $employer->user->delete();
      $employer->delete();


      return redirect()->route('jobSeeker.employers.index');
    }
}
