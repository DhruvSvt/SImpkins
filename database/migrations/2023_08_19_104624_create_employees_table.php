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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->string('code')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('category')->nullable();
            $table->string('designation')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('address')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('pancard')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->boolean('is_front_office')->default(0)->nullable();
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
        Schema::dropIfExists('employees');
    }
};
