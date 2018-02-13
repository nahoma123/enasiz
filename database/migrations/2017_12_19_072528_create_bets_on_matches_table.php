<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsOnMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets_on_matches', function (Blueprint $table) {
            $table->integer('user_bet_id');
            $table->integer('match_bet_id');
            $table->integer('team');////
            $table->string('status');
            $table->double('profit_made');
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
        Schema::dropIfExists('bets_on_matches');
    }
}
