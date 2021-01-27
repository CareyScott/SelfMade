<?php
# @Date:   2021-01-22T14:08:16+00:00
# @Last modified time: 2021-01-27T13:37:03+00:00




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\JobController as APIJobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// GET /api/books ->display all books
// GET /api/books/$id -> display a specific book
// POST /api/books -> add a new book
// PUT /api/books/$id -> edit an existing book
// DELETE /api/books/$id -> delete an existing book

Route::middleware('api')->group(function(){
  Route::get('/jobs', [APIJobController::class, 'index']);
  Route::get('/jobs/{id}', [APIJobController::class, 'show']);
  Route::post('/jobs', [APIJobController::class, 'store']);
  Route::put('/jobs/{id}', [APIJobController::class, 'update']);
  Route::delete('/jobs/{id}', [APIJobController::class, 'destroy']);

  Route::get('/employers', [APIJobController::class, 'show']);
});
