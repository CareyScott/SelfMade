<?php
# @Date:   2021-01-23T15:54:28+00:00
# @Last modified time: 2021-05-14T14:02:11+01:00




namespace App\Http\Controllers\Admin;

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
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // displays all in list for index
    public function index()
    {
      {
        $jobs = Job::all();
        $employers = Employer::simplePaginate(5);
        $jobCategories = JobCategory::all();

        return view('admin.employers.index', compact('employers'), [
        'jobs' => $jobs,
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

     // manages the creation of an object
    public function create()
    {
      $jobs = Job::all();
      $employers = Employer::all();
      $jobCategories = JobCategory::all();

      return view('admin.employers.create', [
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

     // takes data from view and saves to the database
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
        //attaches the role to the user just created
        $user->roles()->attach($role_employer);

        $employer = new Employer();
        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');
        $employer->user_id = $user->id;
        $employer->save();

        // runs the smilify plugin presenting a pop up on the next page
        smilify('success', 'Employer Created Successfully');

        //redirects to the show page of the object created
        return redirect()->route('admin.employers.show', $employer->id);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // code for the displaying of an object from the database
    public function show($id)
    {

      $employer = Employer::findOrFail($id);
      //this will get all of the jobs created by the employer with the relevant id
      $jobs = Job::where('employer_id', $employer->id)->get();

      // $employer->load('job');

      // returns the view and includes the relevant data
      return view('admin.employers.show', [
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

     //this is the code required for the edit form of this employer
    public function edit($id)
    {

      // finds the specific employer
      $employer = Employer::findOrFail($id);
      // gets the user details also
      $user = User::all();

      // returns the view and includes the relevant data
      return view('admin.employers.edit', [
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
     // this function takes the data from the edit function and inserts the data into the database
    public function update(Request $request, $id)
    {
      {
        // validates the data being inserted from the form
        $request->validate([
          'name' => 'required|max:191',
          'phone' => 'required|max:191',
          'email' => 'required|max:191',
          'company_postal_address' => 'required',
          'category' => 'required',

        ]);
        // finds the specific user
        $user = User::findOrFail($id);
        // finds the specific Employer
        $employer = Employer::findOrFail($id);

        // saving the user class information
        $employer->user->name = $request->input('name');
        $employer->user->phone = $request->input('phone');
        $employer->user->email = $request->input('email');
        $employer->user->password = Hash::make('secret');
        $employer->user->save();

        // saving the Employer class information
        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');
        $employer->save();

        smilify('success', 'Employer Updated Successfully');


        return redirect()->route('admin.employers.show', $id);

      }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // deletes the emplpoyer declared from a recieved id
    public function destroy($id)
    {
      // deletes employer and then the user the employer was attached to
      $employer = Employer::findOrFail($id);
      $employer->user->delete();
      $employer->delete();

      // returns notification
      smilify('success', 'Employer Deleted Successfully');

      // returns to index
      return redirect()->route('admin.employers.index');
    }
}
