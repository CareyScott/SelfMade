<?php
# @Date:   2021-02-17T11:31:48+00:00
# @Last modified time: 2021-02-17T11:33:39+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
          $table->id();
          // $table->string('name');
          $table->string('personal_postal_address');
          $table->string('skills');
          $table->unsignedBigInteger('user_id');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seekers');
    }
}
