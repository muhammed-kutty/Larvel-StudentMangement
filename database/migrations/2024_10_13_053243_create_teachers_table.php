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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('teacher_Id');
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
        // Schema::table('teachers', function (Blueprint $table) {
        //     //
        // });

        Schema::dropIfExists('teachers');

    }
};
