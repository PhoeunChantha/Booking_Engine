<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('code')->uniqid()->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->unsignedBigInteger('roomtype_id')->nullable();
            $table->string('max_room')->nullable();
            $table->string('room_size')->nullable();
            $table->string('image')->nullable();
            $table->text('maximum_bedding')->nullable();
            $table->text('extra_bedding')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('hotel_id');
            $table->dropColumn('roomtype_id');
            $table->dropColumn('max_room');
            $table->dropColumn('room_size');
            $table->dropColumn('image');
            $table->dropColumn('maximum_bedding');
            $table->dropColumn('extra_bedding');
        });
    }
}
