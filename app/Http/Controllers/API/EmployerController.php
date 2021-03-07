<?php
# @Date:   2021-01-22T15:28:03+00:00
# @Last modified time: 2021-03-07T16:29:39+00:00

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
    public function index()
    {
        $employers = Employer::all();

        // if incorrect
        // return response()->json([], 405)
        //
        // if correct
        // return response()->json([], 200)
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
    public function store(Request $request)
    {
        $rules = [
          'name' => 'required|max:191',
          'phone' => 'required|max:191',
          'email' => 'required|max:191',
          'company_postal_address' => 'required',
          'category' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }

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
    public function show($id)
    {
        $employer = Employer::find($id);

        if ($employer === null){
          $statusMsg = "Employer Not Found";
          $statusCode = 404;
        }
        else{
          $employer->load('user');
          $employer->load('job');
          $statusMsg = "Success";
          $statusCode = 200;
        }
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
    public function update(Request $request, $id)
    {
        $employer = Employer::find($id);

        if($employer === null) {
          return response()->json([
            'status' => 'Employer Not Found',
            'data' => null
          ], 404) ;

        }

        $rules = [
          'name' => 'required|max:191',
          'phone' => 'required|max:191|exists',
          'email' => 'required|max:191|exists',
          'company_postal_address' => 'required',
          'category' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        $employer->user->name = $request->input('name');
        $employer->user->phone = $request->input('phone');
        $employer->user->email = $request->input('email');
        $employer->user->password = Hash::make('secret');
        $employer->user->save();


        $employer->company_postal_address = $request->input('company_postal_address');
        $employer->category = $request->input('category');


        $employer->save();

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
