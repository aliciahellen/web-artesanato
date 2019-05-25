<?php

  

use Illuminate\Database\Seeder;

use App\User;

  

class UsuarioTableDataSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()
    {
		User::create(['name' => 'Administrador','email' => 'admin@gmail.com', 'password' => bcrypt('12345678')]);
		User::create(['name' => 'Usuário', 'email' => 'usuario@gmail.com', 'password' => bcrypt('12345678')]);
    }

}