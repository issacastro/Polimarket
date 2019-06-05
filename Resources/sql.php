<?php
session_start();
//$serverName = "192.168.229.23\REDMI"; //serverName\instanceName
$serverName = "170.6.0.9\REDMI"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Planea2017", "UID"=>"SA", "PWD"=>"Strayheart123","CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if(isset($_POST['entidad'])){
    $entidad = $_POST['entidad'];
    $materia = $_POST['materia'];
    $nivel = $_POST['nivel'];
$query= "select nom_entidad,avg(por_alum_logn{$nivel}_{$materia}) as porcentaje from registros where ent = '$entidad' group by nom_entidad,ent;";
$result= sqlsrv_query($conn,$query);
if(!$result){
    die( print_r( sqlsrv_errors(), true) );
}
$json = array();
while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)){
    $json[]=array('entidad' => $row['nom_entidad'],'porcentaje' => $row['porcentaje']);
}

sqlsrv_free_stmt( $result);
$jsonstring = json_encode($json);
echo $jsonstring;
}
?>