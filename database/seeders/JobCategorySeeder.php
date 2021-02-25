<?php
# @Date:   2020-11-17T10:13:38+00:00
# @Last modified time: 2021-02-22T11:00:26+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $job_category = new JobCategory();
      $job_category->title = 'Web Design';
      $job_category->save();

      $job_category = new JobCategory();
      $job_category->title = 'UX';
      $job_category->save();

      $job_category = new JobCategory();
      $job_category->title = 'Database Design';
      $job_category->save();

    }
}
