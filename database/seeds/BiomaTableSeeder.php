<?php

use Illuminate\Database\Seeder;
use App\Bioma;

class BiomaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bioma::create(['nome' => 'Amazônia', 'cod' => 'amazonia', 'descricao' => 'Bioma Amazônia']);
        Bioma::create(['nome' => 'Caatinga', 'cod' => 'caatinga', 'descricao' => 'Bioma Caatinga']);
        Bioma::create(['nome' => 'Cerrado', 'cod' => 'cerrado', 'descricao' => 'Bioma Cerrado']);
        Bioma::create(['nome' => 'Mata Atlântica', 'cod' => 'mata_atlantica', 'descricao' => 'Bioma Mata Atlântica']);
        Bioma::create(['nome' => 'Pampa', 'cod' => 'pampa', 'descricao' => 'Bioma Pampa']);
        Bioma::create(['nome' => 'Pantanal', 'cod' => 'pantanal', 'descricao' => 'Bioma Pantanal']);
    }
}
