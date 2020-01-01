<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('attendance_id');
            $table->integer('user_id');
            // $table->integer('day_id');
            $table->time('check_in');
            $table->time('check_out')->nullable();
            // $table->integer('check_in_status');
            // $table->integer('check_out_status');
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
        Schema::dropIfExists('attendance_user');
    }
}
