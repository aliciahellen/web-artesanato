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
    $this->call('BiomaTableSeeder'); //Bioma
    $this->call('EstadoTableSeeder'); //Estado
    $this->call('PlantaTableSeeder'); //Planta
    $this->call('ImagemTableSeeder'); //Imagem
    }
}
