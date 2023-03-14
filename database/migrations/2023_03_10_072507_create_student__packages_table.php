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
        Schema::create('student__packages', function (Blueprint $table) {
            $table->id();
            $table->string('principle_type');
            $table->string('date')->nullable();
            $table->string('class_time');
            $table->string('days');
            $table->string('time');
            $table->string('price');
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
        Schema::dropIfExists('student__packages');
    }
};
