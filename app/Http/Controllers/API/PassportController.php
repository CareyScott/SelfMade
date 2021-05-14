<?php
# @Date:   2021-02-01T13:54:04+00:00
# @Last modified time: 2021-05-14T16:28:59+01:00

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

// passport is used for token authentication but is disabled at the commented lines for the android app to use. This code does work.
class PassportController extends Controller
{
    public function register(Request $request)
    {
    $validator = Validator::make($request->all(), [
      'name' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'phone' => 'required|min:9',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'phone' => $request->phone
    ]);

    // creates a token for authentication
    $token = $user->createToken('self-made')->accessToken;
    // return response()->json(['token' => $token], 200);      //remove me for no token api
  }


    public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|exists :users',
      'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
      return response()->json(['error' => $validator->errors()], 401);
    }

    $credentials = [
    'email' => $request->email,
    'password' => $request->password,
  ];

  if (auth()->attempt($credentials)) {
    $user = auth()->user();
    // $token = $user->createToken('self-made')->accessToken;    //remove me for no token api
    return response()->json([
      'name'=>$user->name,
      'email'=>$user->email,
      // 'token'=>$token           //remove me for no token api
    ], 200);
  }
  else {
    // response if no token found
    return response()->json(['error' => 'Unauthorized'], 401);
  }
}

  // the user logged in can be called here GET /api/user
  public function user()
  {
    return response()->json(['user' =>auth()->user()], 200);
  }

  public function logout(Request $request)
  {
    $request->user()->token()->revoke();
    return response()->json(['message' =>'Successfully logged out'], 200);
  }
}
