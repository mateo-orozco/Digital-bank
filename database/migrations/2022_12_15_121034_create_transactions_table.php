<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table -> float('wallet_transmitter');
            $table->foreignId('wallet_transmitter_id')->references('id')-> on('wallets') -> onDelete('cascade') -> onUpdate('cascade');
            $table -> float('user_receiver_id');
            $table->foreignId('wallet_reciver_id')->references('id')-> on('wallets') -> onDelete('cascade') -> onUpdate('cascade');
            $table -> float('amount');
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
        Schema::dropIfExists('transactions');
    }
};
