<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_imagem', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID da Imagem');
            $table->text('url')->nullable(false)->comment('URL da Imagem');
            $table->string('autor', 255)->nullable(true)->comment('Autor da Imagem');
            $table->string('fonte', 255)->nullable(true)->comment('Fonte da Imagem');
            $table->unsignedBigInteger('planta_id')->unsigned()->comment('ID da Planta (Attalea phalerata): 1');
            $table->foreign('planta_id')->references('id')->on('tb_planta')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamp('dthr_cadastro')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data/Hora de Cadastro: 2019-03-01 16:42:11');
			$table->timestamp('dthr_alteracao')->default(DB::raw('CURRENT_TIMESTAMP(0)'))->comment('Data/Hora de Alteração: 2019-03-01 16:42:11'); //PostgreSQL e MySQL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_imagem');
    }
}
