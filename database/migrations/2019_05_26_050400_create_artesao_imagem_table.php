<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtesaoImagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        * Schema::create('tb_artesao_imagem', function (Blueprint $table) {
        *     $table->bigIncrements('id');
        *     $table->unsignedBigInteger('artesao_id')->unsigned();
        *     $table->foreign('artesao_id')->references('id')->on('tb_artesao')->onUpdate('cascade')->onDelete('cascade');
        *     $table->unsignedBigInteger('imagem_id')->unsigned();
        *     $table->foreign('imagem_id')->references('id')->on('tb_imagem')->onUpdate('cascade')->onDelete('cascade');
        *     $table->timestamp('dthr_cadastro')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data/Hora de Cadastro: 2019-03-01 16:42:11');
		* 	$table->timestamp('dthr_alteracao')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data/Hora de Alteração: 2019-03-01 16:42:11'); //PostgreSQL e MySQL
        * });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_artesao_imagem');
    }
}