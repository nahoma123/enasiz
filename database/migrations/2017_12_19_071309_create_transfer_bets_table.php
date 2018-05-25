<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('player_name',100);
            $table->integer('transfer_to');
            $table->integer('transfer_from');
            $table->double('winning_odds_infavor');
            $table->double('winning_odds_against');
            $table->string('bet_status');
            $table->double("minimum_wage");
            $table->double("maximum_wage");
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
        Schema::dropIfExists('transfer_bets');
    }
}
