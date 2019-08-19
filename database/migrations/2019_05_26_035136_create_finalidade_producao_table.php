<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalidadeProducaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_finalidade_producao', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID da Finalidade de Produção');
            $table->string('nome', 255)->nullable(false)->comment('Nome da Finalidade de Produção');
            $table->string('cod', 50)->nullable(false)->unique()->comment('Código da Finalidade de Produção');
            $table->text('descricao')->nullable(true)->comment('Descrição da Finalidade de Produção');
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
        Schema::dropIfExists('tb_finalidade_producao');
    }
}
