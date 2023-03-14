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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('registration_type');
            $table->string('student_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('profile')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('address')->nullable();
            $table->string('language')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_otp')->nullable();
            $table->string('phone_otp')->nullable();
            $table->string('email_verified')->nullable();
            $table->string('user_type')->nullable();
            $table->string('course')->nullable();
            $table->string('country_name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('level')->nullable();
            $table->string('total_male')->nullable();
            $table->string('total_female')->nullable();
            $table->string('total_child')->nullable();
            $table->string('class_type')->nullable();
            $table->string('price_type')->nullable();
            $table->string('price')->nullable();
            $table->string('individual_child')->nullable();
            $table->string('group_child')->nullable();
            $table->string('available_times')->nullable();
            $table->string('package_type')->nullable();
            // $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('student_profiles');
    }
};
