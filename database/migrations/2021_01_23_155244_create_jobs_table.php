<?php
# @Date:   2021-01-23T15:52:43+00:00
# @Last modified time: 2021-03-11T19:30:06+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
          $table->id();
          $table->string('title');
          $table->string('employer');
          $table->date('date_uploaded');
          $table->date('valid_until');
          $table->decimal('salary', 6, 2);
          $table->string('description');
          $table->string('job_category');
          // $table->unsignedBigInteger('skill_id');
          $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
