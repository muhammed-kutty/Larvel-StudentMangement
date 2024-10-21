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
        Schema::create('Entrollments', function (Blueprint $table) {
            $table->bigIncrements('entrollment_Id');
            $table ->string('entroll_No')->unique();
            $table ->double('fee');
            $table ->unsignedBigInteger('batch_Id');
            $table ->unsignedBigInteger('student_Id');
            $table ->date('admission_date');
            $table ->foreign('batch_Id')->references('batches_Id')->on('batches')->onDelete('cascade');
            $table ->foreign('student_Id')->references('student_Id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('entrollments');

    }
};
