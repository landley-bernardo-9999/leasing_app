<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('booking_id')->primary();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->date('actual_check_out_date');
            $table->string('booking_term');
            $table->string('booking_status');
            $table->integer('initial_water_reading')->nullable();
            $table->integer('final_water_reading')->nullable();
            $table->integer('initial_electric_reading')->nullable();
            $table->integer('final_electric_reading')->nullable();

            $table->unsignedBigInteger('room_id_foreign');
            $table->unsignedBigInteger('res_id_foreign');

            //assign the foreign keys
            $table->foreign('res_id_foreign')
            ->references('res_id')->on('residents')
            ->onDelete('cascade');

            $table->foreign('room_id_foreign')
            ->references('room_id')->on('rooms')
            ->onDelete('cascade');
           
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
        Schema::dropIfExists('bookings');
        $table->dropForeign('res_id_foreign');
        $table->dropForeign('room_id_foreign');
    }
}
