<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsuarioTableDataSeeder'); //Usuario
        $this->call('ImagemTableSeeder'); //Imagem
        $this->call('TipoArtesanatoTableSeeder'); //TipoArtesanato
        $this->call('FinalidadeProducaoTableSeeder'); //FinalidadeProducao
        $this->call('TecnicaProducaoTableSeeder'); //TecnicaProducao
        $this->call('ArtesaoTableSeeder'); //Artesao
    }
}
