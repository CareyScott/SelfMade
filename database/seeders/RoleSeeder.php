<?php
# @Date:   2020-11-17T10:13:38+00:00
# @Last modified time: 2021-01-23T15:00:50+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();

        $role_employer = new Role();
        $role_employer->name = 'employer';
        $role_employer->description = 'An employer';
        $role_employer->save();

    }
}
