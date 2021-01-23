<?php
# @Date:   2021-01-22T15:59:43+00:00
# @Last modified time: 2021-01-23T15:01:05+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
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
    }
}
