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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_Id');
            $table ->string('name');
            $table ->string('adress');
            $table ->string('mobile');
            $table ->string('age');
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
        // Schema::table('students', function (Blueprint $table) {
        //     $table->dropifExist('students');
        // });

        Schema::dropIfExists('students');
    }
};
