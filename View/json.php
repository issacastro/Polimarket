<?php
$data = file_get_contents("../Resources/data/categorias.json");
$products = json_decode($data, true);
//print_r($data);
    foreach ($products as $product) {
        foreach($product as $clave=>$valor){
            if($valor['Categoria']=="Mascotas"){
               $SRV= $valor['SRV'];
            }
        }
    }
    
?>