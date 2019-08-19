
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoArtesanatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tipo_artesanato', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID do Tipo de Artesanato');
            $table->string('nome', 255)->nullable(false)->comment('Nome do Tipo de Artesanato');
            $table->string('cod', 50)->nullable(false)->unique()->comment('Código do Tipo de Artesanato');
            $table->text('descricao')->nullable(true)->comment('Descrição do Tipo de Artesanato');
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
        Schema::dropIfExists('tb_tipo_artesanato');
    }
}
