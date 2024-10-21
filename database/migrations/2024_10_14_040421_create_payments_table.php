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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_Id');
            $table ->double('amount');
            $table ->unsignedBigInteger('entrolment_Id');
            $table ->date('paid_date');
            $table ->foreign('entrolment_Id')->references('entrollment_Id')->on('entrollments')->onDelete('cascade');
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
        Schema::dropIfExists('payments');

    }
};
