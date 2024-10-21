<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('batches_Id');
            $table ->string('name');
            $table ->unsignedBigInteger('course_Id');
            $table ->date('start_date');
            $table ->foreign('course_Id')->references('course_Id')->on('courses')->onDelete('cascade');
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
        // Schema::table('batches', function (Blueprint $table) {
        //     //
        // });

        Schema::dropIfExists('batches');

    }
};
