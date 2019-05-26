<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnicaProducaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tecnica_producao', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID da Técnica de Produção');
            $table->string('nome', 255)->nullable(false)->comment('Nome da Técnica de Produção');
            $table->string('cod', 50)->nullable(false)->unique()->comment('Código da Técnica de Produção');
            $table->text('descricao')->nullable(true)->comment('Descrição da Técnica de Produção');
            $table->timestamp('dthr_cadastro')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data/Hora de Cadastro: 2019-03-01 16:42:11');
            $table->timestamp('dthr_alteracao')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data/Hora de Alteração: 2019-03-01 16:42:11'); //PostgreSQL e MySQL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_tecnica_producao');
    }
}
