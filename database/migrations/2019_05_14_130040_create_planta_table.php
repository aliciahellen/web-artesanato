<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_planta', function (Blueprint $table) {
			$table->bigIncrements('id')->comment('ID da Planta');
            $table->string('nome_cientifico', 255)->nullable(false)->comment('Nome Científico da Planta');
            $table->text('nome_popular')->nullable(false)->comment('Nome Popular da Planta');
            $table->string('autoria', 255)->nullable(true)->comment('Autoria da Planta');
            $table->boolean('e_panc')->nullable(true)->comment('Plantas Alimentícias Não Convencionais: 1-Sim; 0-Não');
            $table->enum('ep_floracao_inicio', ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago','set', 'out', 'nov', 'dez'])->nullable(true)->comment('Mês de Início de Floração da Planta');
            $table->enum('ep_floracao_fim', ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago','set', 'out', 'nov', 'dez'])->nullable(true)->comment('Mês de Início de Floração da Planta');
            $table->enum('grau_ameaca_iucn', ['ex', 'ew', 'cr', 'en', 'vu', 'nt', 'lc', 'ne'])->nullable(true)->comment('Grau de ameação de Extinção da Planta IUCN');
            $table->text('descricao')->nullable(true)->comment('Descrição da Planta');
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
        Schema::dropIfExists('tb_planta');
    }
}
