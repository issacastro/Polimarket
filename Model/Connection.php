<?php

$IP="10.104.107.147";
//$IP="10.104.103.119"  ;
$Instance="REDMI";
$DataBase="B";
$UID="SA";
$PWD="Strayheart123";
/*
$IP="25.3.56.100" $IP="10.104.109.124";;
$Instance="VITE";
$DataBase="B";
$UID="SA";
$PWD="Vite123";
*/
/*
$IP="25.75.92.106"; //$IP="10.104.109.126"; 
$Instance="ZurielMC";
$DataBase="B";
$UID="SA";
$PWD="Zuriel97";
*/

$serverName = $IP."\ ".$Instance;
$connectionInfo = array( "Database"=>$DataBase, "UID"=>$UID, "PWD"=>$PWD,"CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if($conn){
    //echo $conn;
} else{
    //echo 'Ocurrio un error de conexion';
}

?>