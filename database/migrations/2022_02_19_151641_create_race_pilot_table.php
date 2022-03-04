<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacePilotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_pilot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pilot_id');
            $table->unsignedBigInteger('race_id');
            $table->foreign('pilot_id')->references('id')->on('pilots')->onDelete('cascade');
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->boolean('partecipazione')->nullable();
            $table->integer('incasso')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('race_pilot');
    }
}
