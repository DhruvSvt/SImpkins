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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('spouse')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('pincode')->nullable();
            $table->string('salary_mode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('spouse');
            $table->dropColumn('marital_status');
            $table->dropColumn('pincode');
            $table->dropColumn('salary_mode');
        });
    }
};
