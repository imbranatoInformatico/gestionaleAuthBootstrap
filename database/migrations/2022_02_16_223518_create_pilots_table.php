<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAmministratore');
            $table->string('nome');
            $table->string('cognome');
            $table->char('sesso');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('idTeam');
            $table->string('mail')->nullable();
            $table->string('telefono')->nullable();
            $table->string('img')->nullable();
            $table->foreign('idAmministratore')->references('id')->on('users')->onCascade('delete');
            $table->foreign('category_id')->references('id')->on('categories')->onCascade('delete');
            $table->foreign('idTeam')->references('id')->on('teams')->onCascade('delete');
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
        Schema::dropIfExists('pilots');
    }
}
