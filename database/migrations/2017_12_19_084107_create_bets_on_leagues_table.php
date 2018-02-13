<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsOnLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets_on_leagues', function (Blueprint $table) {
            $table->increments('user_bet_id');
            $table->integer('first_team'); // key to league bets
            $table->integer('second_team');// key to league bets
            $table->integer('third_team');// key to league bets
            $table->integer('fouth_team');// key to league bets
            $table->integer('fifth_team');// key to league bets
            $table->double('profit_made')->nullable();
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
        Schema::dropIfExists('bets_on_leagues');
    }
}
