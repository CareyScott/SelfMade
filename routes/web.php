<?php
# @Date:   2021-01-23T06:08:20+00:00
# @Last modified time: 2021-02-24T16:39:36+00:00



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Admin\JobController as  AdminJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/employer/home', [App\Http\Controllers\Employer\HomeController::class, 'index'])->name('employer.home');

Route::get('/admin/jobs', [AdminJobController::class, 'index'])->name('admin.jobs.index');
Route::get('/admin/jobs/{id}', [AdminJobController::class, 'show'])->name('admin.jobs.show');
Route::get('/admin/jobs/{id}/edit', [AdminJobController::class, 'update'])->name('admin.jobs.edit');
Route::get('/admin/jobs/{id}', [AdminJobController::class, 'destroy'])->name('admin.jobs.destroy');
