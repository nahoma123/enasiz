<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->double('minimum_wage');
            $table->double('maximum_wage');
            $table->double('winning_odds_home');
            $table->double('winning_odds_away');
            $table->string('type_of_bet');
            $table->string('password')->nullable();
            $table->dateTime('bet_created_at')->default(Carbon\Carbon::now());
            $table->integer('match_id'); // from matches table
            $table->integer('user_id'); // from users table
            $table->timestamps();
        });
        Schema::create('league_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('minimum_wage');
            $table->double('maximum_wage');
            $table->double('maximum_number_of_wages');
            $table->string('bet_status');
            $table->integer('league_id');
        });
        Schema::create('cup_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->double('minimum_wage');
            $table->double('maximum_wage');
            $table->double('created_at');
            $table->integer('maximum_number_of_wagers');
            $table->string('bet_status');
            $table->integer('cups_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_bets');
        Schema::dropIfExists('league_bets');
        Schema::dropIfExists('cup_bets');

    }
}