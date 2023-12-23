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
        Schema::create('alumni_registerations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('martial')->nullable();
            $table->string('phn_no')->nullable();
            $table->string('profession')->nullable();
            $table->string('email')->nullable();
            $table->string('batch')->nullable();
            $table->string('last_class')->nullable();
            $table->string('leaving_year')->nullable();
            $table->string('home_town')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            $table->string('docs')->nullable();
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
        Schema::dropIfExists('alumni_registerations');
    }
};
