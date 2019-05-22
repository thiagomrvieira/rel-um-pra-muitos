<?php

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if (count($cat)==0){
        echo "<h4>Sem categorias cadastradas</h4>";
    }else{ 
        foreach ($cat as $c) {
            echo "<p>" . $c->id . " - " .$c->nome . "</p>";
        }
    }    
});



Route::get('/produtos', function () {
    $prod = Produto::all();
    if (count($prod)==0){
        echo "<h4>Sem produtos cadastrados</h4>";
    }else{ 
        
            
            echo "<table>";
                echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preço</td><td>Categoria</td></tr></thead> ";
                foreach ($prod as $p) {
                    echo "<tr>";
                        echo "<td>" . $p->nome . "</td>";
                        echo "<td>" . $p->estoque . "</td>";
                        echo "<td>" . $p->preco . "</td>";
                        echo "<td>" . $p->categoria->nome . "</td>";
                    echo "</tr>";
                }
               
                
            echo "</table>";
        
    }    
});


Route::get('/categorias-produtos', function () {
    $cat = Categoria::all();
    if (count($cat)==0){
        echo "<h4>Sem categorias cadastradas</h4>";
    }else{ 
        foreach ($cat as $c) {
            echo "<p>" . $c->id . " - " .$c->nome . "</p>";
            //$produtos = [];

            if (count($c->produtos) > 0) {
                echo "<ul>";
                foreach ($c->produtos as $p){
                    echo "<li>". $p->nome ."</li>";
                }
                echo "</ul>";        
            }
        }
    }    
});

Route::get('/categorias-produtos/json', function () {
    //Lazy loading
    //$cats = Categoria::all();

    //Eagin loading
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
   
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu produto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->categoria()->associate($cat);
    $p->save();
    return $p->toJson();

});

Route::get('/removerproduto', function () {
   
    $p = Produto::find(8);
    if (isset($p)) {
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
   
   return '';
   

});


Route::get('/adicionarproduto/{cat}', function ($catid) {
   
    $cat = Categoria::with('produtos')->find($catid);
    $p = new Produto();
    $p->nome = "Mais um produto";
    $p->estoque = 12;
    $p->preco = 30;
    if (isset($cat)){
        $cat->produtos()->save($p);
    }
    $cat->load('produtos'); // Atualiza os dados - Retorna com o novo produto adicionado
    return $cat->toJson();

});