<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilot_ranking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rank_id');
            $table->unsignedBigInteger('pilot_id');
            $table->unsignedBigInteger('race_id');
            $table->bigInteger('posizioneQualifica')->nullable();
            $table->bigInteger('posizioneGara1')->nullable();
            $table->bigInteger('posizioneGara2')->nullable();
            $table->bigInteger('puntoGara1')->nullable();
            $table->bigInteger('puntoGara2')->nullable();
            $table->bigInteger('puntoPole')->nullable();
            $table->bigInteger('puntoPoleCategoria')->nullable();
            $table->bigInteger('puntoPresenza')->nullable();
            $table->foreign('rank_id')->references('id')->on('rankings')->onDelete('cascade');
            $table->foreign('pilot_id')->references('id')->on('pilots')->onDelete('cascade');
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
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
        Schema::dropIfExists('pilot_ranking');
    }
}
