<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToRatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rate_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('code')->uniqid()->nullable();
            $table->string('guests_included')->nullable();
            $table->string('max_guests')->nullable();
            $table->string('min_rate')->nullable();
            $table->string('default_rate')->nullable();
            $table->unsignedBigInteger('derive_from')->nullable();
            $table->text('adjust_rates')->nullable();
            $table->string('meals_included')->nullable();
            $table->string('inclusions')->nullable();
            $table->string('reference_rates')->nullable();
            $table->text('last_minute_default')->nullable();
            $table->text('additional_nights')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rate_plans', function (Blueprint $table) {
            $table->dropColumn('hotel_id');
            $table->dropColumn('code');
            $table->dropColumn('guests_included');
            $table->dropColumn('max_guests');
            $table->dropColumn('min_rate');
            $table->dropColumn('default_rate');
            $table->dropColumn('derive_from');
            $table->dropColumn('adjust_rates');
            $table->dropColumn('meals_included');
            $table->dropColumn('inclusions');
            $table->dropColumn('reference_rates');
            $table->dropColumn('last_minute_default');
            $table->dropColumn('additional_nights');
        });
    }
}
