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
        Schema::create('payment__details', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('wallet_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('card_number')->nullable();
            $table->string('valid_date')->nullable();
            $table->string('CVV_code')->nullable();
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
        Schema::dropIfExists('payment__details');
    }
};
