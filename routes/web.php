<?php
# @Date:   2021-01-23T06:08:20+00:00
# @Last modified time: 2021-03-08T18:52:21+00:00



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\JobController as  AdminJobController;
use App\Http\Controllers\Admin\EmployerController as  AdminEmployerController;
use App\Http\Controllers\Admin\JobSeekerController as  AdminJobSeekerController;


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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::resource('jobSeekers', App\Http\Controllers\JobSeeker\ProfileController::class)->except([
  'create', 'edit'
]);

// Route::resource('jobs', App\Http\Controllers\Admin\JobController::class)->except([
//
// ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/employer/home', [App\Http\Controllers\Employer\HomeController::class, 'index'])->name('employer.home');
Route::get('/jobSeeker/home', [App\Http\Controllers\JobSeeker\HomeController::class, 'index'])->name('jobSeeker.home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
Route::get('/jobSeeker/profile', [App\Http\Controllers\JobSeeker\ProfileController::class, 'index'])->name('jobSeeker.profile');
Route::get('/employer/profile', [App\Http\Controllers\Employer\ProfileController::class, 'index'])->name('employer.profile');

Route::get('/admin/jobs', [AdminJobController::class, 'index'])->name('admin.jobs.index');
Route::get('/admin/jobs/create', [AdminJobController::class, 'create'])->name('admin.jobs.create');
Route::get('/admin/jobs/{id}', [AdminJobController::class, 'show'])->name('admin.jobs.show');
Route::post('/admin/jobs/store', [AdminJobController::class, 'store'])->name('admin.jobs.store');
Route::get('/admin/jobs/{id}/edit', [AdminJobController::class, 'edit'])->name('admin.jobs.edit');
Route::put('/admin/jobs/{id}', [AdminJobController::class, 'update'])->name('admin.jobs.update');
Route::delete('/admin/jobs/{id}', [AdminJobController::class, 'destroy'])->name('admin.jobs.destroy');

Route::get('/admin/employers', [AdminEmployerController::class, 'index'])->name('admin.employers.index');
Route::get('/admin/employers/create', [AdminEmployerController::class, 'create'])->name('admin.employers.create');
Route::get('/admin/employers/{id}', [AdminEmployerController::class, 'show'])->name('admin.employers.show');
Route::post('/admin/employers/store', [AdminEmployerController::class, 'store'])->name('admin.employers.store');
Route::get('/admin/employers/{id}/edit', [AdminEmployerController::class, 'edit'])->name('admin.employers.edit');
Route::put('/admin/employers/{id}', [AdminEmployerController::class, 'update'])->name('admin.employers.update');
Route::delete('/admin/employers/{id}', [AdminEmployerController::class, 'destroy'])->name('admin.employers.destroy');

Route::get('/admin/jobSeekers', [AdminJobSeekerController::class, 'index'])->name('admin.jobSeekers.index');
Route::get('/admin/jobSeekers/create', [AdminJobSeekerController::class, 'create'])->name('admin.jobSeekers.create');
Route::get('/admin/jobSeekers/{id}', [AdminJobSeekerController::class, 'show'])->name('admin.jobSeekers.show');
Route::post('/admin/jobSeekers/store', [AdminJobSeekerController::class, 'store'])->name('admin.jobSeekers.store');
Route::get('/admin/jobSeekers/{id}/edit', [AdminJobSeekerController::class, 'edit'])->name('admin.jobSeekers.edit');
Route::put('/admin/jobSeekers/{id}', [AdminJobSeekerController::class, 'update'])->name('admin.jobSeekers.update');
Route::delete('/admin/jobSeekers/{id}', [AdminJobSeekerController::class, 'destroy'])->name('admin.jobSeekers.destroy');

// Route::get('/admin/patients', [AdminPatientController::class, 'index'])->name('admin.patients.index');
// Route::get('/admin/patients/create', [AdminPatientController::class, 'create'])->name('admin.patients.create');
// Route::get('/admin/patients/{id}', [AdminPatientController::class, 'show'])->name('admin.patients.show');
// Route::post('/admin/patients/store', [AdminPatientController::class, 'store'])->name('admin.patients.store');
// Route::get('/admin/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('admin.patients.edit');
// Route::put('/admin/patients/{id}', [AdminPatientController::class, 'update'])->name('admin.patients.update');
// Route::delete('/admin/patients/{id}', [AdminPatientController::class, 'destroy'])->name('admin.patients.destroy');
