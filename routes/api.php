<?php
# @Date:   2021-01-22T14:08:16+00:00
# @Last modified time: 2021-01-23T17:05:09+00:00




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
  Route::get('/api/jobs', [APIJobController::class, 'index']);
  Route::get('/api/jobs/{id}', [APIJobController::class, 'show']);
  Route::get('/api/jobs/{id}', [APIJobController::class, 'show']);
});
