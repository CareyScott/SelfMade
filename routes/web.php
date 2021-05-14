<?php
# @Date:   2021-01-23T06:08:20+00:00
# @Last modified time: 2021-05-14T16:50:03+01:00



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobsMarketController;
use App\Http\Controllers\EmployersIndexController;

// declaring controllers
use App\Http\Controllers\Admin\JobController as  AdminJobController;
use App\Http\Controllers\Admin\EmployerController as  AdminEmployerController;
use App\Http\Controllers\Admin\JobSeekerController as  AdminJobSeekerController;

use App\Http\Controllers\Employer\JobController as  EmployerJobController;
use App\Http\Controllers\Employer\EmployerController as  EmployerEmployerController;
use App\Http\Controllers\Employer\JobSeekerController as  EmployerJobSeekerController;

use App\Http\Controllers\JobSeeker\JobController as  JobSeekerJobController;
use App\Http\Controllers\JobSeeker\EmployerController as  JobSeekerEmployerController;
use App\Http\Controllers\JobSeeker\JobSeekerController as  JobSeekerJobSeekerController;


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
Route::get('/jobs', [JobsMarketController::class, 'index'])->name('market');
Route::get('/employers', [EmployersIndexController::class, 'index'])->name('employer');

Route::resource('jobSeekers', App\Http\Controllers\JobSeeker\ProfileController::class)->except([
  'create', 'edit'
]);

// Route::resource('jobs', App\Http\Controllers\Admin\JobController::class)->except([
//
// ]);

// home controllers/ routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/employer/home', [App\Http\Controllers\Employer\HomeController::class, 'index'])->name('employer.home');
Route::get('/jobSeeker/home', [App\Http\Controllers\JobSeeker\HomeController::class, 'index'])->name('jobSeeker.home');


// profile controllers/ routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
Route::get('/jobSeeker/profile', [App\Http\Controllers\JobSeeker\ProfileController::class, 'index'])->name('jobSeeker.profile');
Route::get('/employer/profile', [App\Http\Controllers\Employer\ProfileController::class, 'index'])->name('employer.profile');

// Admin Routes

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

// Employer Routes

Route::get('/employer/jobs', [EmployerJobController::class, 'index'])->name('employer.jobs.index');
Route::get('/employer/jobs/create', [EmployerJobController::class, 'create'])->name('employer.jobs.create');
Route::get('/employer/jobs/{id}', [EmployerJobController::class, 'show'])->name('employer.jobs.show');
Route::post('/employer/jobs/store', [EmployerJobController::class, 'store'])->name('employer.jobs.store');
Route::get('/employer/jobs/{id}/edit', [EmployerJobController::class, 'edit'])->name('employer.jobs.edit');
Route::put('/employer/jobs/{id}', [EmployerJobController::class, 'update'])->name('employer.jobs.update');
Route::delete('/employer/jobs/{id}', [EmployerJobController::class, 'destroy'])->name('employer.jobs.destroy');

Route::get('/employer/employers', [EmployerEmployerController::class, 'index'])->name('employer.employers.index');
Route::get('/employer/employers/create', [EmployerEmployerController::class, 'create'])->name('employer.employers.create');
Route::get('/employer/employers/{id}', [EmployerEmployerController::class, 'show'])->name('employer.employers.show');
Route::post('/employer/employers/store', [EmployerEmployerController::class, 'store'])->name('employer.employers.store');
Route::get('/employer/employers/{id}/edit', [EmployerEmployerController::class, 'edit'])->name('employer.employers.edit');
Route::put('/employer/employers/{id}', [EmployerEmployerController::class, 'update'])->name('employer.employers.update');
Route::delete('/employer/employers/{id}', [EmployerEmployerController::class, 'destroy'])->name('employer.employers.destroy');

Route::get('/employer/jobSeekers/{id}', [EmployerJobSeekerController::class, 'show'])->name('employer.jobSeekers.show');

// Job Seeker Routes
Route::get('/jobSeeker/jobs', [JobSeekerJobController::class, 'index'])->name('jobSeeker.jobs.index');
Route::get('/jobSeeker/jobs/{id}', [JobSeekerJobController::class, 'show'])->name('jobSeeker.jobs.show');

Route::get('/jobSeeker/employers', [JobSeekerEmployerController::class, 'index'])->name('jobSeeker.employers.index');
Route::get('/jobSeeker/employers/{id}', [JobSeekerEmployerController::class, 'show'])->name('jobSeeker.employers.show');

Route::get('/jobSeeker/jobSeekers/{id}', [JobSeekerJobSeekerController::class, 'show'])->name('jobSeeker.jobSeekers.show');
Route::put('/jobSeeker/jobSeekers/{id}', [JobSeekerJobSeekerController::class, 'update'])->name('jobSeeker.jobSeekers.update');
Route::delete('/jobSeeker/jobSeekers/{id}', [JobSeekerJobSeekerController::class, 'destroy'])->name('jobSeeker.jobSeekers.destroy');
