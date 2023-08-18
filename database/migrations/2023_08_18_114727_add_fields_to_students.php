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
            $table->string('admitted_class')->nullable()->after('admission_date');
            $table->string('aadhar_card')->nullable()->after('weight');
            $table->boolean('is_handicap')->nullable()->default(false)->after('aadhar_card');
            $table->boolean('is_only_child')->nullable()->default(false)->after('is_handicap');
            $table->boolean('is_minority')->nullable()->default(false)->after('is_only_child');
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
            $table->dropColumn('admitted_class');
            $table->dropColumn('aadhar_card');
            $table->dropColumn('is_handicap');
            $table->dropColumn('is_only_child');
            $table->dropColumn('is_minority');
        });
    }
};
