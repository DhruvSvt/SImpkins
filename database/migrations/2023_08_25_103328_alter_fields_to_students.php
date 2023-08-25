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
        Schema::table('students', function (Blueprint $table) {
            $table->bigInteger('roll_number')->nullable()->change();
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->string('session')->nullable()->after('blood_group');
            $table->boolean('status')->nullable()->default(0)->after('session');
            $table->string('admission_no')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('roll_number');
            $table->string('height')->nullable()->after('blood_group');
            $table->string('weight')->nullable()->after('height');
            $table->dropColumn('session');
            $table->dropColumn('status');
        });
    }
};
