<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantaBiomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_planta_bioma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('planta_id')->unsigned();
            $table->foreign('planta_id')->references('id')->on('tb_planta')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bioma_id')->unsigned();
            $table->foreign('bioma_id')->references('id')->on('tb_bioma')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tb_planta_bioma');
    }
}
