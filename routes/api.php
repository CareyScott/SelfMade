<?php
# @Date:   2021-01-22T14:08:16+00:00
# @Last modified time: 2021-02-24T12:28:09+00:00




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\JobController as APIJobController;
use App\Http\Controllers\API\EmployerController as APIEmployerController;
use App\Http\Controllers\API\PassportController as APIPassportController;


Route::post('register', [APIPassportController::class, 'register']);
Route::post('login', [APIPassportController::class, 'login']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

  //anything in this group needs to have authorization
  Route::middleware('auth:api')->group(function(){
  //logout route
  Route::get('logout', [APIPassportController::class, 'logout']);
  //View Currenyt User route
  Route::post('user', [APIPassportController::class, 'user']);

  Route::resource('jobs', APIJobController::class)->except([
    'create', 'edit'
  ]);

  Route::resource('employers', APIEmployerController::class)->except([
    'create', 'edit'
  ]);

});
