<?php
# @Date:   2021-01-22T15:59:43+00:00
# @Last modified time: 2021-02-22T16:46:20+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Employer;
use App\Models\JobSeeker;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();
      $role_employer = Role::where('name', 'employer')->first();
      $role_job_seeker = Role::where('name', 'job_seeker')->first();

      $admin = new User();
      $admin->name = 'Admin';
      $admin->email = 'admin@SelfMade.ie';
      $admin->phone = '0871195160';
      $admin->password = Hash::make('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);


      $user = new User();
      $user->name = 'Matthew Simmons';
      $user->email = 'matthewSimmons@selfMade.ie';
      $user->phone = '3453134563';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_job_seeker);

      $job_seeker = new JobSeeker();
      // $employer->name = 'Someone';
      $job_seeker->personal_postal_address = 'Wexford, Ireland';
      $job_seeker->skills = 'Food Enterprise';
      $job_seeker->user_id = $user->id;
      $job_seeker->save();
    }
}
