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
            $table->string('room_no');
            $table->string('site');
            $table->string('building');
            $table->string('floor_no');
            $table->string('room_wing')->nullable();
            $table->string('room_status')->default('v');
            $table->double('room_size', 8, 2);
            $table->string('type_of_bed');
            $table->double('short_term_rent', 8, 2);
            $table->double('long_term_rent', 8, 2);
            $table->double('transient_rent', 8, 2);
            $table->longText('room_description')->nullable();

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
    }
}
