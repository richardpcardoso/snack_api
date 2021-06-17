<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['nome' => 'Riichard Cardoso', 'email' => 'richardpcardoso@gmail.com', 'senha' => \Illuminate\Support\Facades\Hash::make('123')]);
    }
}
