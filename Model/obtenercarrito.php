<?php
include '../CLases/carrito.class.php';
include '../Controller/Session/cart.php';
include '../CLases/producto.class.php';
include 'm_product.php';
include '../Controller/Session/session.php';
//require 'Connection.php';
    if(lista()==NULL){
    echo 0;
    }else{
    echo json_encode(lista());
    }
    //sqlsrv_close($conn); 

?>