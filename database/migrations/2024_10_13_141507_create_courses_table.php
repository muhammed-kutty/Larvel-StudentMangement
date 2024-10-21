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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_Id');
            $table ->string('name');
            $table ->string('duration');
            $table ->string('amount');
            $table ->string('syllabus');
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
        // Schema::table('courses', function (Blueprint $table) {
        //     //
        // });

        Schema::dropIfExists('courses');

    }
};
