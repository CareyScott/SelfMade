<?php
# @Date:   2021-01-23T17:22:41+00:00
# @Last modified time: 2021-01-23T17:42:34+00:00





use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployerIdToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
          $table->dropColumn('employer');
          $table->unsignedBigInteger('employer_id');
          $table->foreign('employer_id')->references('id')->on('employers')->onUpdate('cascade')->onDelete('restrict');
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
            $table->dropForeign(['employer_id']);
            $table->dropColumn('employer_id');
            $table->string('employer');
        });
    }
}
