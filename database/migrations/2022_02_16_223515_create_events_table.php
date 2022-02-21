<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAmministratore');
            $table->integer('codiceEvento');
            $table->string('nome');
            $table->string('tipo');
            $table->string('descrizione')->nullable();
            $table->timestamps();
            //qui eseguo la chiave esterna sulla tabella users
            $table->foreign('idAmministratore')->references('id')->on('users')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
