<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsOnCupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets_on_cups', function (Blueprint $table) {
            $table->increments('user_bet_id');
            $table->integer('first_team');
            $table->integer('second_team');
            $table->integer('third_team');
            $table->integer('forth_team');
            $table->integer('fifth_team');
            $table->double('profit_made');
            $table->string('status');
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
        Schema::dropIfExists('bets_on_cups');
    }
}
