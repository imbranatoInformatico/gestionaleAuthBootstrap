<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingPilotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_pilot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ranking_id');
            $table->unsignedBigInteger('pilot_id');
            $table->bigInteger('race_id');
            $table->bigInteger('posizioneQualifica')->nullable();
            $table->bigInteger('posizioneGara1')->nullable();
            $table->bigInteger('posizioneGara2')->nullable();
            $table->bigInteger('puntoGara1')->nullable();
            $table->bigInteger('puntoGara2')->nullable();
            $table->bigInteger('puntoPole')->nullable();
            $table->bigInteger('puntoPoleCategoria')->nullable();
            $table->bigInteger('puntoPresenza')->nullable();
            $table->foreign('ranking_id')->references('id')->on('rankings')->onDelete('cascade');
            $table->foreign('pilot_id')->references('id')->on('pilots')->onDelete('cascade');
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
        Schema::dropIfExists('ranking_pilot');
    }
}
