<?php
include '../CLases/producto.class.php';
include 'm_product.php';
//Comprobamos que el valor no venga vacío
if(isset($_POST['function']) && !empty($_POST['function'])) {
    $funcion = $_POST['function'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch($funcion) {
        case 'f1': 
//Todos los Producto
        $a = action1();
            echo json_encode($a);
            break;
        case 'f2': 
//Productos por rango de precio
        $b = action2();
            echo json_encode($b);
            break;
        case 'f3': 
//Productos por categoria   
            if($_POST['S']=="Vacio"){
            $c= getProducts();
            }else{
            $c = action3();
                }
            echo json_encode($c);
            break;
        case 'f4': 
//Productos por escuela
        $d = action4();
            echo json_encode($d);
            break;
    }
}

function action1(){
    return getProducts();
}

function action2(){
    if($_POST['F']!=NULL && $_POST['ESC'] !='TODAS' ){
        $stmt = "SELECT 
        ID_PRODUCTO, T1.FK_USER AS FK_VENDEDOR, T2.NOMBRE AS FK_ESCUELA,FK_CATEGORIA,T.NOMBRE,DESCRIPCION,IMG,STOCK,STATUS,PRECIO 
        FROM Producto AS T
        INNER JOIN
        Vendedor AS T1
        ON T.FK_VENDEDOR = T1.ID_VENDEDOR
        INNER JOIN Escuela AS T2 
        ON T.FK_ESCUELA = T2.ID_ESCUELA
        WHERE FK_CATEGORIA=? AND T2.NOMBRE=?";
        
        $products=array();
        $CAT=$_POST['F'];
        $lengh=sizeof($CAT);
        for($i=0;$i<$lengh;$i++){
            $srv=SRV($CAT[$i]);
            $size = sizeof($products);
             $params=array($CAT[$i],$_POST['ESC']);
             $products+=FilterPro($srv,$stmt, $params,$size);
        }
        return $products;
    }if($_POST['F']==NULL && $_POST['ESC'] !='TODAS' ){
        $stmt = "SELECT 
        ID_PRODUCTO, T1.FK_USER AS FK_VENDEDOR, T2.NOMBRE AS FK_ESCUELA,FK_CATEGORIA,T.NOMBRE,DESCRIPCION,IMG,STOCK,STATUS,PRECIO 
        FROM Producto AS T
        INNER JOIN
        Vendedor AS T1
        ON T.FK_VENDEDOR = T1.ID_VENDEDOR
        INNER JOIN Escuela AS T2 
        ON T.FK_ESCUELA = T2.ID_ESCUELA
        WHERE  T2.NOMBRE=?";
        return getProductsF($stmt,$_POST['ESC']);
      
    }
    if($_POST['F']==NULL && $_POST['ESC'] =='TODAS' ){
        return getProducts();
    }if($_POST['F']!=NULL && $_POST['ESC'] =='TODAS' ){
      return action3();
    }
    

}

function action3(){
    $stmt = "SELECT 
    ID_PRODUCTO, T1.FK_USER AS FK_VENDEDOR, T2.NOMBRE AS FK_ESCUELA,FK_CATEGORIA,T.NOMBRE,DESCRIPCION,IMG,STOCK,STATUS,PRECIO 
    FROM Producto AS T
    INNER JOIN
    Vendedor AS T1
    ON T.FK_VENDEDOR = T1.ID_VENDEDOR
    INNER JOIN Escuela AS T2 
    ON T.FK_ESCUELA = T2.ID_ESCUELA
    WHERE FK_CATEGORIA=?";
    
    $products=array();
    $CAT=$_POST['F'];
    $lengh=sizeof($CAT);
    for($i=0;$i<$lengh;$i++){
        $srv=SRV($CAT[$i]);
        $size = sizeof($products);
         $params=array($CAT[$i]);
         $products+=FilterPro($srv,$stmt, $params,$size);
    }
    return $products;
}
//Productos por escuela
function action4(){
    $stmt="SELECT * FROM Producto
WHERE PRECIO >= ? AND PRECIO <= ?";
    $params=array($_POST['min'],$_POST['max']);
    return getProductsF($stmt,$params);
}






?>