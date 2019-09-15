<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemittancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remittances', function (Blueprint $table) {
            $table->uuid('rem_id')->primary();
            $table->date('date_dep')->nullable();
            $table->double('rem_amt', 8, 2);

            $table->uuid('rem_own_id_foreign')->nullable();
            $table->uuid('rem_pay_id_foreign')->nullable();

            //assign the foreign keys
            $table->foreign('rem_own_id_foreign')
            ->references('user_id')->on('users')
            ->onDelete('cascade');

            $table->foreign('rem_pay_id_foreign')
            ->references('pay_id')->on('payments')
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
        Schema::dropIfExists('remittances');
    }
}
