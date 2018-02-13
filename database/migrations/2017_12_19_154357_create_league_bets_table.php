<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('minimum_wage');
            $table->double('maximum_wage');
            $table->double('maximum_number_of_wages');
            $table->string('bet_status');
            $table->integer('league_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_bets');
    }
}
