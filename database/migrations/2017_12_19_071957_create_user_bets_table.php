<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         *  This is bets made by users and their results
         */
        Schema::create('user_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->double('bet_amount');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('bets_on_cups', function (Blueprint $table) {
            $table->increments('cup_id');
            $table->integer('first_team');
            $table->integer('second_team');
            $table->integer('third_team');
            $table->integer('forth_team');
            $table->integer('fifth_team');
            $table->double('profit_made');
            $table->string('status');
            $table->timestamps();
    
    });
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
        Schema::create('bets_on_transfers', function (Blueprint $table) {
            $table->integer('user_bet_id');
            $table->integer('transfer_bet_id');
            $table->double('amount');
            $table->enum('bet_on',['against','favor']); ////
            $table->double('profit_amount');
            $table->timestamps();
        });
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
        Schema::dropIfExists('user_bets');
        Schema::dropIfExists('bets_on_cups');
        Schema::dropIfExists('bets_on_leagues');
        Schema::dropIfExists('bets_on_transfers');
        Schema::dropIfExists('bets_on_matches');
    }
}
