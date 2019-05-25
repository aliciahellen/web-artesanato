<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bioma', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID do Bioma');
            $table->string('nome', 255)->nullable(false)->comment('Nome do Bioma');
            $table->string('cod', 50)->nullable(false)->unique()->comment('Código do Bioma');
            $table->text('descricao')->nullable(true)->comment('Descrição da Bioma');
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
        Schema::dropIfExists('tb_bioma');
    }
}
