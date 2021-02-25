<?php
# @Date:   2021-02-22T10:57:24+00:00
# @Last modified time: 2021-02-22T11:11:58+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
          $table->dropColumn('job_category');
          $table->unsignedBigInteger('job_category_id');
          $table->foreign('job_category_id')->references('id')->on('job_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
          $table->dropForeign(['job_category_id']);
          $table->dropColumn('job_category_id');
          $table->string('job_category');
        });
    }
}
