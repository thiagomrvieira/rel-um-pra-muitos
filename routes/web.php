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
