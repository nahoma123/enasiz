<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsOnTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets_on_transfers', function (Blueprint $table) {
            $table->integer('user_bet_id');
            $table->integer('transfer_bet_id');
            $table->double('amount');
            $table->enum('bet_on',['against','favor']); ////
            $table->double('profit_amount');
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
        Schema::dropIfExists('bets_on_transfers');
    }
}
