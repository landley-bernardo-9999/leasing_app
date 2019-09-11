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
            $table->uuid('pay_id')->primary();
            $table->double('amt_paid', 8, 2);
            $table->string('form_of_pay')->nullable();
            $table->string('or_number')->nullable();
            $table->string('ar_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('check_no')->nullable();
            $table->string('date_dep')->nullable();

            $table->uuid('resident_id_foreign')->nullable();

             //assign the foreign keys
             $table->foreign('resident_id_foreign')
             ->references('res_id')->on('residents')
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
    }
}
