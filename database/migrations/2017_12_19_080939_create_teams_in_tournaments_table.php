<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsInTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_in_tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('games_played');
            $table->tinyInteger('wins');
            $table->tinyInteger('draws');
            $table->tinyInteger('losses');
            $table->smallInteger('goals_scored');
            $table->smallInteger('goals_against');
            $table->smallInteger('position');
            $table->smallInteger('points');
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
        Schema::dropIfExists('teams_in_tournaments');
    }
}
