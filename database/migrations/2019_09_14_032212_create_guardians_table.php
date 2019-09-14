<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->uuid('guardian_id')->primary();
            $table->string('guardian_full_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('guardian_email')->unique()->nullable();
            $table->string('guardian_mobile')->unique()->nullable();

            $table->uuid('res_guar_foreign_id')->nullable();

            //assign the foreign keys
            $table->foreign('res_guar_foreign_id')
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
        Schema::dropIfExists('guardians');
    }
}
