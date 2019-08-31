<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('mobile_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->unsignedBigInteger('user_resident_id_foreign')->nullable();
            $table->unsignedBigInteger('user_owner_id_foreign')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //assign the foreign keys
            $table->foreign('user_id')
            ->references('user_resident_id_foreign')->on('users')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('user_owner_id_foreign')->on('users')
            ->onDelete('cascade');
        });

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        $table->dropForeign('user_resident_id_foreign');
        $table->dropForeign('user_owner_id_foreign');
    }
}
