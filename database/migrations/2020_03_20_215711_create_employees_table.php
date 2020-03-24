<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('civil_status');
            $table->date('dob');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('nic');
            $table->integer('passport_photo');
            $table->string('mobile_no');
            $table->string('email');
            $table->integer('designation_id');
            $table->integer('district_id');
            $table->integer('division_id');
            $table->string('gn_division');
            $table->integer('gov_f_photo');
            $table->integer('gov_b_photo');
            $table->integer('signature');
            $table->string('sim_no')->nullable();
            $table->string('sim_serial_no')->nullable();
            $table->string('emp_code')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
