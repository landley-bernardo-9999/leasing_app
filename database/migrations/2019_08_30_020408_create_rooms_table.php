<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('room_id')->primary();
            $table->date('enrollment_date')->nullable();
            $table->string('room_no');
            $table->string('site');
            $table->string('building');
            $table->string('floor_no')->nullable();
            $table->string('room_wing')->nullable();
            $table->string('room_status')->default('VACANT');
            $table->double('room_size', 8, 2);
            $table->string('type_of_bed')->nullable();
            $table->double('short_term_rent', 8, 2);
            $table->double('long_term_rent', 8, 2);
            $table->double('transient_rent', 8, 2);
            $table->longText('room_description')->nullable();

            $table->unsignedBigInteger('own_id_foreign')->nullable();

             //assign the foreign keys
             $table->foreign('own_id_foreign')
             ->references('own_id')->on('users')
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
        Schema::dropIfExists('rooms');
        $table->dropForeign('user_id_foreign');
    }
}
