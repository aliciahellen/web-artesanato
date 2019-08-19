<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtesaoTecnicaProducaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_artesao_tecnica_producao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('artesao_id')->unsigned();
            $table->foreign('artesao_id')->references('id')->on('tb_artesao')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('tecnica_producao_id')->unsigned();
            $table->foreign('tecnica_producao_id')->references('id')->on('tb_tecnica_producao')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('dthr_cadastro')->useCurrent()->comment('Data/Hora de Alteração: 2019-03-01 16:42:11');
            $table->timestamp('dthr_alteracao')->useCurrent()->comment('Data/Hora de Alteração: 2019-03-01 16:42:11');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_artesao_tecnica_producao');
    }
}
