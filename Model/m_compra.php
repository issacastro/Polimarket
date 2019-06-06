<?php

include '../Clases/compra.class.php';
include '../Clases/usuario.class.php';
include '../Clases/producto.class.php';
include '../Controller/Session/cart.php';
include 'm_product.php';
//include 'm_conection.php';
session_start();
function getID(){
    $stmt = "SELECT MAX(ID_COMPRAS) as maxid from Compras";  
    $conn=conexion(1);
        $query = sqlsrv_query( $conn, $stmt );

        if($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
            return $result['maxid']+1;
        } else{
            return 1;
        }
   
}

function getComprador(){
   // include '../Clases/compra.class.php';
    $usr=unserialize($_SESSION['user']);
    $stmt = "SELECT ID_COMPRADOR  from Comprador where FK_USER = ?";  
    $id='';
        $params = array($usr->ID_Nick);
        $conn=conexion(1);
        $query = sqlsrv_query($conn , $stmt, $params);

        if($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
            $id= $result['ID_COMPRADOR'];
        }
        sqlsrv_close($conn); 
     return $id;
}

function getlist(){
    
    $list=array();

    $productos=lista();
    $final=array();
    $comprador=getComprador();
    //$stmt = "SELECT ID_PRODUCTO, PRECIO  from Producto where ID_PRODUCTO = ?";  
    foreach($productos as $item){

      //  $conn=conexion(SRV($item->fk_Categoria));
      //  $params = array($item->id_Producto);
       // $query = sqlsrv_query( $conn, $stmt, $params);

        //if($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
            $compras=new compra();
            $compras->fk_Producto = $item->id_Producto;//$result['ID_PRODUCTO'];
            $compras->fk_comprador = $comprador;
            $compras->cantidad = $item->cnt;
            $compras->total = intval ($item->cnt)*intval ($item->precio);//intval ($_POST[$result['ID_PRODUCTO']])*intval( $result['PRECIO']);
            $final += [ "$compras->fk_Producto" => $compras ];
       // }
    }
    return $final;
}


 

    $conn= conexion(1);
    
    $items=getlist();
    $id_compra=getID();
    $stmt = "INSERT INTO  Compras values (?,?,?,?,?)";  
    
    foreach($items as $comp){
        $params =array();
        $params = array( 
                        $id_compra,
                         $comp->fk_Producto,
                         $comp->fk_comprador,
                         $comp->cantidad,
                         $comp->total
                    );
       $query = sqlsrv_query( $conn, $stmt, $params);
       if($query){
            echo "awebo";
       }
    }
    print_r($params);
    //echo $query;


 echo "BIEN";

?>