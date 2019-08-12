<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsarioRedefinirSenhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuario_redefinir_senha', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
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
        Schema::dropIfExists('tb_usuario_redefinir_senha');
    }
}
