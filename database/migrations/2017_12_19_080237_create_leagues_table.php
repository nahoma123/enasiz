<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
             $table->increments('id');
            $table->string('nation');
            $table->string('league_name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('description');
            $table->integer('number_of_teams')->nullable();
            $table->double('fifa_ranking')->nullable();
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
        Schema::dropIfExists('leagues');
    }
}
