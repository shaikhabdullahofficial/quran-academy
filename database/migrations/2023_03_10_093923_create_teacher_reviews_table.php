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
        Schema::create('teacher_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('course_id')->nullable();


            $table->string('teacher_id')->nullable();
            $table->string('rating')->nullable();
            $table->string('comment')->nullable();
            $table->string('description')->nullable(); 
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
        Schema::dropIfExists('teacher_reviews');
    }
};
