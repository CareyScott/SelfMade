<?php
# @Date:   2021-01-23T16:13:01+00:00
# @Last modified time: 2021-05-14T16:53:34+01:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // used during the setup phase of the project
     // inputs sample data to the database

     // seeding jobs

    public function run()
    {
      $job = new Job();
      $job->title = 'Web Designer.';
      $job->employer_id = '1';
      $job->date_uploaded = '2020-12-12';
      $job->valid_until = '2021-01-24';
      $job->salary = '20.00';
      $job->description = 'This is a great job';
      $job->job_category_id = '1';
      $job->save();

      $job = new Job();
      $job->title = 'Data Anilyst';
      $job->employer_id = '2';
      $job->date_uploaded = '2020-12-12';
      $job->valid_until = '2021-01-24';
      $job->salary = '36.70';
      $job->description = 'This is a slow paced job';
      $job->job_category_id = '2';
      $job->save();

      $job = new Job();
      $job->title = 'Advanced Database Architect';
      $job->employer_id = '3';
      $job->date_uploaded = '2020-12-12';
      $job->valid_until = '2021-01-24';
      $job->salary = '69.00';
      $job->description = 'This is a high paced job';
      $job->job_category_id = '3';
      $job->save();

      $job = new Job();
      $job->title = 'Web developer';
      $job->employer_id = '1';
      $job->date_uploaded = '2020-12-12';
      $job->valid_until = '2021-01-24';
      $job->salary = '20.00';
      $job->description = 'This is a great job';
      $job->job_category_id = '1';
      $job->save();

    }
}
