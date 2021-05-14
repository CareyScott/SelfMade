<?php
# @Date:   2021-01-22T15:59:43+00:00
# @Last modified time: 2021-05-14T16:54:06+01:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Employer;
use Hash;

// used during the setup phase of the project
// inputs sample data to the database

// seeding employers
class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     
    public function run()
    {
      $role_employer = Role::where('name', 'employer')->first();

      $user = new User();
      $user->name = 'Aaron Minsk';
      $user->email = 'Aaron@selfMade.ie';
      $user->phone = '0871234567';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_employer);

      $employer = new Employer();
      // $employer->name = 'Someone';
      $employer->company_postal_address = 'Chechire, UK';
      $employer->category = 'Web Design';
      $employer->user_id = $user->id;
      // $employer->job_id = '1';
      $employer->save();

      $user = new User();
      $user->name = 'John T. Myers';
      $user->email = 'johnMyers@selfMade.ie';
      $user->phone = '9493527842';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_employer);

      $employer = new Employer();
      // $employer->name = 'Someone';
      $employer->company_postal_address = 'Dublin, Ireland';
      $employer->category = 'Business Communication';
      $employer->user_id = $user->id;
      // $employer->job_id = '1';
      $employer->save();

      $user = new User();
      $user->name = 'Libby Simpson';
      $user->email = 'libbySimpson@selfMade.ie';
      $user->phone = '6129412349';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_employer);

      $employer = new Employer();
      // $employer->name = 'Someone';
      $employer->company_postal_address = 'Wicklow, Ireland';
      $employer->category = 'Food Enterprise';
      $employer->user_id = $user->id;
      // $employer->job_id = '1';
      $employer->save();


    }
}
