<?php
function conexion($server){
switch($server) {
    case 1: 
    //$IP="10.104.102.191";
    $IP="170.6.0.29";
    //$IP="170.6.0.29";
    $Instance="REDMI";
    $DataBase="B";
    $UID="SA";
    $PWD="Strayheart123";
        break;
    case 2: 
    //$IP="170.6.0.20";
    $IP="170.6.0.20";
        //$IP="25.3.56.100";
        $Instance="REDMI";
        $DataBase="B";
        $UID="SA";
        $PWD="Strayheart123";
            break;
    case 3: 
    $IP="25.75.178.66";
    //$IP="10.104.109.126";
    $Instance="REDMI";
    $DataBase="B";
    $UID="SA";
    $PWD="Strayheart123";
        break;

}

$serverName = $IP."\ ".$Instance;
$connectionInfo = array( "Database"=>$DataBase, "UID"=>$UID, "PWD"=>$PWD,"CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
return $conn;
}

?>