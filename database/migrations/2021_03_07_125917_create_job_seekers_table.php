<?php
# @Date:   2021-03-07T12:59:16+00:00
# @Last modified time: 2021-03-07T15:13:21+00:00




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
         $table->string('personal_bio');
         $table->string('education', 400); //enum?
         $table->unsignedBigInteger('user_id');
         $table->unsignedBigInteger('skill_id_1');
         $table->unsignedBigInteger('skill_id_2');
         $table->unsignedBigInteger('skill_id_3');
         $table->timestamps();

         $table->foreign('user_id')->references('id')->on('users');
         $table->foreign('skill_id_1')->references('id')->on('skills');
         $table->foreign('skill_id_2')->references('id')->on('skills');
         $table->foreign('skill_id_3')->references('id')->on('skills');
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
