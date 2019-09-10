<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('pay_id');
            $table->string('desc');
            $table->double('amt', 8, 2);
            $table->string('pay_status')->default('UNPAID');
            $table->string('form_of_pay')->nullable();
            $table->double('amt_paid', 8, 2)->nullable();
            $table->string('or_number')->nullable();
            $table->string('ar_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('check_no')->nullable();
            $table->string('date_dep')->nullable();

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
        Schema::dropIfExists('payments');
        $table->dropForeign('booking_id_foreign');
    }
}
