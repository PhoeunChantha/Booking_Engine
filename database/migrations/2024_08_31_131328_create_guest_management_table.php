<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_managements', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->enum('type', ['mr', 'mrs', 'dr', 'unspecified']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('identification')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birth_date')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('guest_preferences')->nullable();
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
        Schema::dropIfExists('guest_managements');
    }
}
