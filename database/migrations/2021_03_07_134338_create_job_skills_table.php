<?php
# @Date:   2021-03-07T13:43:36+00:00
# @Last modified time: 2021-03-09T17:45:26+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('job_skills', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('skill_id');
      $table->unsignedBigInteger('jobSeeker_id');
      $table->timestamps();

      $table->foreign('skill_id')->references('id')->on('skills')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('jobSeeker_id')->references('id')->on('job_seekers')->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_skills');
    }
}
