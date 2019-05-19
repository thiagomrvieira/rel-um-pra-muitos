<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(['nome' => 'Camiseta',
            'preco' => 120, 'estoque' => 20, 'categoria_id' => 1] );
        DB::table('produtos')->insert(['nome' => 'Calça jeans',
            'preco' => 190, 'estoque' => 30, 'categoria_id' => 1] );
        DB::table('produtos')->insert(['nome' => 'Notebook',
            'preco' => 3200, 'estoque' => 10, 'categoria_id' => 4] );
        DB::table('produtos')->insert(['nome' => 'Mouse',
            'preco' => 30, 'estoque' => 18, 'categoria_id' => 4] );
        DB::table('produtos')->insert(['nome' => 'Monitor',
            'preco' => 350, 'estoque' => 20, 'categoria_id' => 4] );
        DB::table('produtos')->insert(['nome' => 'VW Up',
            'preco' => 33000, 'estoque' => 4, 'categoria_id' => 3] );
        DB::table('produtos')->insert(['nome' => 'TV digital',
            'preco' => 1200, 'estoque' => 7, 'categoria_id' => 2] );    
            
    }
}
