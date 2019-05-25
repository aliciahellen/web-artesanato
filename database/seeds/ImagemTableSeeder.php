<?php

use Illuminate\Database\Seeder;
use App\Imagem;
use App\Planta;

class ImagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$planta = Planta::where('nome_cientifico' , '=', 'Attalea phalerata')->first(); //Attalea phalerata
        //Imagem::create(['url' => 'imagem.jpg', 'autor' => 'Nome do Autor', 'fonte' => 'Nome da Fonte', 'planta_id' => $planta->id]);
    }
}
