<?php
include '../CLases/carrito.class.php';
include '../Controller/Session/cart.php';
include '../CLases/producto.class.php';
include 'm_product.php';
include '../Controller/Session/session.php';
//require 'Connection.php';
    $item=getProduct($_POST['ID'],$_POST['CAT']);
    if($item->stock!=0){
    $carrito=insert($item);
    echo json_encode($carrito);
    }else{
    echo 1;
    }
    //sqlsrv_close($conn); 

?>