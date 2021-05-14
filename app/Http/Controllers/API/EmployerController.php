<?php
# @Date:   2021-01-22T15:28:03+00:00
# @Last modified time: 2021-05-14T15:38:19+01:00


// api controller for the employers

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\Role;
use App\Models\JobCategory;
use Hash;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // GET api/employers
    public function index()
    {
        $employers = Employer::all();

        // if incorrect
        // return response()->json([], 405)
        //
        // if correct
        // return response()->json([], 200)

        // return the json response with a status code of 22 followed by the employers
         return response()->json([
           'status' => 'success',
           'data' => $employers
         ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // POST api/employers
    public function store(Request $request)
    {

      //rules for validation
        $rules = [
          'name' => 'required|max:191',
          'phone' => 'required|max:191',
          'email' => 'required|max:191',
          'company_postal_address' => 'required',
          'category' => 'required',

        ];

        // validates using the rules set above
        $validator = Validator::make($request->all(), $rules);

        // if this fails return error 422 with the issue on screen

        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }

        // creates new employer
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_employer = Role::where('name', 'employer')->first();

        //new user object
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_employer);

        // new employer object
        $employer = new Employer();
        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');
        $employer->user_id = $user->id;
        $employer->save();

        // returns response of success followed by data created
        return response()->json([
          'status' => 'success',
          'data' => $employer
        ], 200);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // GET /api/employers/{$employer->id}
    public function show($id)
    {
        $employer = Employer::find($id);

        if ($employer === null){
          $statusMsg = "Employer Not Found";
          $statusCode = 404;
        }
        else{
          // loads the employers user object
          $employer->load('user');

          $employer->load('job');
          // loads all of the employers jobs

          $statusMsg = "Success";
          $statusCode = 200;
        }

        //returns the employer requested and status info
        return response()->json([
          'status' => $statusMsg,
          'data' => $employer
        ], $statusCode);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // for updating employer PUT /api/employers/{id}

    public function update(Request $request, $id)
    {
        $employer = Employer::find($id);

        if($employer === null) {
          return response()->json([
            'status' => 'Employer Not Found',
            'data' => null
          ], 404) ;

        }
        // rules set for validation
        $rules = [
          'name' => 'required|max:191',
          'phone' => 'required|max:191|exists',
          'email' => 'required|max:191|exists',
          'company_postal_address' => 'required',
          'category' => 'required',

        ];

        // validates using the rules set above

        $validator = Validator::make($request->all(), $rules);


        // updates employer user object

        $employer->user->name = $request->input('name');
        $employer->user->phone = $request->input('phone');
        $employer->user->email = $request->input('email');
        $employer->user->password = Hash::make('secret');
        $employer->user->save();

        // updates employer

        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');

        // saves
        $employer->save();


        //returns data response
        return response()->json([
          'status' => 'success',
          'data' => $employer
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // for deleting employer DELETE /api/employers/{id}
    public function destroy($id)
    {
        $employer = Employer::Find($id);

        if ($employer === null){
          $statusMsg = "Employer Not Found";
          $statusCode = 404;
        }
        else{
          $employer->user->delete();
          $employer->delete();
          $statusMsg = "Success Employer Deleted";
          $statusCode = 200;
        }
        return response()->json([
          'status' => $statusMsg,
          'data' => null
        ], $statusCode);
    }
}
