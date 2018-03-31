<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('team_name');
            $table->string('team_thumbnail');
            $table->timestamps();
        });
        Schema::create('hometeam_team', function (Blueprint $table) {
            $table->integer('hometeam_id')->unsigned()->index();
            $table->integer('team_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::create('awayteam_team', function (Blueprint $table) {
            $table->integer('awayteam_id')->unsigned()->index();
            $table->integer('team_id')->unsigned()->index();
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
        Schema::dropIfExists('teams');
        Schema::dropIfExists('hometeam_team');
        Schema::dropIfExists('awayteam_team');
    }
}
