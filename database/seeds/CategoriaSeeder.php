<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nome' => 'Roupas']);
        DB::table('categorias')->insert(['nome' => 'Eletrônicos']);
        DB::table('categorias')->insert(['nome' => 'Veículos']);
        DB::table('categorias')->insert(['nome' => 'Informática']);
    }
}
