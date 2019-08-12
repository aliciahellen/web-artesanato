<?php

  

use Illuminate\Database\Seeder;

use App\Usuario;

class UsuarioTableDataSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()
    {
		Usuario::create(['nome' => 'Administrador','email' => 'admin@gmail.com', 'senha' => bcrypt('12345678')]);
		Usuario::create(['nome' => 'Usuário', 'email' => 'usuario@gmail.com', 'senha' => bcrypt('12345678')]);
    }

}