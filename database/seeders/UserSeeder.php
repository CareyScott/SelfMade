<?php
# @Date:   2021-01-22T15:59:43+00:00
# @Last modified time: 2021-01-23T17:25:58+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Employer;
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

      $admin = new User();
      $admin->name = 'Admin';
      $admin->email = 'admin@SelfMade.ie';
      $admin->phone = '0871195160';
      $admin->password = Hash::make('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'Aaron Minsk';
      $user->email = 'Aaron@selfMade.ie';
      $user->phone = '0871234567';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_employer);

      $employer = new Employer();
      $employer->name = 'Someone';
      $employer->postal_address = 'None';
      $employer->category = 'Web Design';
      $employer->user_id = $user->id;
      $employer->save();
    }
}
