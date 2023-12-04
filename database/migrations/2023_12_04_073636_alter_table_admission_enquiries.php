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
        Schema::table('admission_enquiries', function (Blueprint $table) {
            $table->string('dob')->nullable()->after('student_name');
            $table->string('gender')->nullable()->after('dob');
            $table->string('contact_no')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admission_enquiries', function (Blueprint $table) {
            $table->drop('dob');
            $table->drop('gender');
            $table->drop('contact_no');
        });
    }
};
