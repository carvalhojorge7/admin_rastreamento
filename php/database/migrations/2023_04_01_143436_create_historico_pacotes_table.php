<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoPacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_pacotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pacote_id');
            $table->string('data_atualizado_em');
            $table->string('hora_atualizado_em');
            $table->string('status');
            $table->string('detalhes')->default('Sem Informações detalhadas.');
            $table->timestamps();

            $table->foreign('pacote_id')->references('id')->on('pacotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico_pacotes');
    }
}
