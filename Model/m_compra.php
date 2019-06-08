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
            $compras->cat = $item->fk_Categoria;
            $compras->total = intval ($item->cnt)*intval ($item->precio);//intval ($_POST[$result['ID_PRODUCTO']])*intval( $result['PRECIO']);
            $final += [ "$compras->fk_Producto" => $compras ];
       // }
    }
    return $final;
}


 

   // $conn= conexion(2);
    
    $items=getlist();
    $id_compra=getID();
    foreach($items as $comp){
        $conn= conexion(SRV($comp->cat));
        $params =array();
        $params = array( 
                        $id_compra,
                         $comp->fk_Producto,
                         $comp->fk_comprador,
                         $comp->cantidad,
                         $comp->total
                    );
       $stmt = "INSERT INTO  Compras values (?,?,?,?,?)";
       $query = sqlsrv_query( $conn, $stmt, $params); 
       $stmt = "UPDATE  Producto SET Stock= ?  WHERE ID_PRODUCTO = ?"; 
       $producto = getProduct($comp->fk_Producto,$comp->cat);
       $newstock = $producto->stock - $comp->cantidad;
       $params =array($newstock,$comp->fk_Producto);
       $query = sqlsrv_query( $conn, $stmt, $params);
       echo SRV($comp->cat);
       if($query){
            
            $_SESSION['cart']=array();
            header("Location: perfil");
       }
    }
    print_r($params);
    //echo $query;
    sqlsrv_close($conn); 
echo $newstock;
 echo "BIEN";

?>