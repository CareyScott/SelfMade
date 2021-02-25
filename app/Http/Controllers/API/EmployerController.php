<?php
# @Date:   2021-01-22T15:28:03+00:00
# @Last modified time: 2021-02-24T12:52:26+00:00

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
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
          'title' => 'required',
          'date_uploaded' => 'required',
          'valid_until' => 'required',
          'employer_id' => 'required|integer|exists:employers,id',
          'salary' => 'required|numeric|min:0',
          'description' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }

        $employer = new Employer();


        $employer->title = $request->input('title');
        $employer->date_uploaded = $request->input('date_uploaded');
        $employer->valid_until = $request->input('valid_until');
        $employer->employer_id = $request->input('employer_id');
        $employer->salary = $request->input('salary');
        $employer->description = $request->input('description');

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
          'title' => 'required',
          'date_uploaded' => 'required',
          'valid_until' => 'required',
          'employer_id' => 'required|integer|exists:employers,id',
          'salary' => 'required|numeric|min:0',
          'description' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        $employer->title = $request->input('title');
        $employer->date_uploaded = $request->input('date_uploaded');
        $employer->valid_until = $request->input('valid_until');
        $employer->employer_id = $request->input('employer_id');
        $employer->salary = $request->input('salary');
        $employer->description = $request->input('description');

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
