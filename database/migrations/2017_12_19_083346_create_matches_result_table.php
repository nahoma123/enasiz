<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_result', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('home_team_score');
            $table->tinyInteger('away_team_score');
            $table->smallInteger('possession')->nullable();
            $table->smallInteger('home_team_shots_on_target')->nullable();
            $table->smallInteger('away_team_shots_on_target')->nullable();
            $table->smallInteger('home_team_corners')->nullable();
            $table->smallInteger('away_team_corners')->nullable();
            $table->smallInteger('home_team_fouls')->nullable();
            $table->smallInteger('away_team_fouls')->nullable();
            $table->integer('match_id'); // key to match tables
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
        Schema::dropIfExists('matches_result');
    }
}
