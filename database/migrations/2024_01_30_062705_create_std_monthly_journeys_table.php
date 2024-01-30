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
        Schema::create('std_monthly_journeys', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->nullable();
            $table->integer('std_id')->nullable();
            $table->string('classroom_conduct')->nullable();
            $table->string('uniform')->nullable();
            $table->string('punctuality')->nullable();
            $table->string('intelligence')->nullable();
            $table->string('creativity')->nullable();
            $table->string('handwriting')->nullable();
            $table->string('reading')->nullable();
            $table->string('speaking')->nullable();
            $table->string('participation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('std_monthly_journeys');
    }
};
