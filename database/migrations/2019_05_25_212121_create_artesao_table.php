<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtesaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_artesao', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID da Artesão');
            $table->string('nome', 255)->nullable(false)->comment('Nome do Artesão');
            $table->string('endereco', 255)->nullable(false)->comment('Endereço do Artesão');
            $table->string('telefone', 11)->nullable(true)->comment('Telefone do Artesão');
            $table->string('email', 100)->nullable(true)->comment('E-mail do Artesão');
            $table->text('descricao')->nullable(true)->comment('Descrição da Artesão');
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
        Schema::dropIfExists('tb_artesao');
    }
}
