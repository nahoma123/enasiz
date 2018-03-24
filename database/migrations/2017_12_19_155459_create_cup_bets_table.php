<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::dropIfExists('cup_bets');
    }
}
