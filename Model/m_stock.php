<?php
include '../CLases/escuela.class.php';
include '../CLases/categorias.class.php';
include 'm_conection.php';
function getCategorias(){
    $conn=conexion(1);

    $stmt = "SELECT * FROM Categorias";  

    $query = sqlsrv_query( $conn, $stmt );

    $categorias = array();
    
    $i=1;
    while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        $cat=new Categorias();
        $cat->Categoria = $result['CATEGORIA'];
        $categorias+=[ "$i" => $cat ];
        $i++;
    }
    sqlsrv_close($conn); 
    return $categorias;

}
function getEscuelas(){
    $conn=conexion(1);

    $stmt = "SELECT  * FROM Escuela ORDER BY NOMBRE ";  

    $query = sqlsrv_query( $conn, $stmt );

    $escuelas = array();
    
    $i=1;
    while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        $esc=new Escuela();
        $esc->nombre = $result['NOMBRE'];
        $esc->id_Escuela = $result['ID_ESCUELA'];
        $escuelas+=[ "$i" => $esc ];
        $i++;
    }
    sqlsrv_close($conn); 
    return $escuelas;

}
?>