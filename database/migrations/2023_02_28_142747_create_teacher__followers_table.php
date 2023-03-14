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
        Schema::create('teacher__followers', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('teacher_id');
            $table->string('status')->default(0)->comment('Follow = 1 , UnFollow = 0');
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
        Schema::dropIfExists('teacher__followers');
    }
};
