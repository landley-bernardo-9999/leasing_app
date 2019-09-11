<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->uuid('bil_id')->primary();
            $table->string('desc');
            $table->double('bil_amt', 8, 2);

            $table->uuid('booking_id_foreign')->nullable();

            //assign the foreign keys
            $table->foreign('booking_id_foreign')
            ->references('booking_id')->on('bookings')
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
        Schema::dropIfExists('billings');
    }
}
