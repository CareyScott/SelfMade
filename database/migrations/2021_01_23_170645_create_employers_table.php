<?php
# @Date:   2021-01-23T17:06:44+00:00
# @Last modified time: 2021-02-17T11:33:12+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
          $table->id();
          // $table->string('name');
          $table->string('company_postal_address');
          $table->string('category');
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
        Schema::dropIfExists('employers');
    }
}