<?php
# @Date:   2020-12-08T10:32:36+00:00
# @Last modified time: 2021-04-08T11:33:48+01:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      // $this->call(RoleSeeder::class);
      $this->call(SkillSeeder::class);
      // $this->call(UserSeeder::class);
      // $this->call(JobCategorySeeder::class);

      // $this->call(EmployerSeeder::class);
      // $this->call(JobSeeder::class);

    }
}
