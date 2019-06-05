<?php
function login ($user){
    session_start();
    require 'Connection.php';

    $stmt = "SELECT * from Usuarios where (ID_USER like ? or EMAIL like ?) and PASSWORD like ?";  
    $params = array($user->ID_Nick,$user->email,$user->password);
    $query = sqlsrv_query( $conn, $stmt, $params);

    if($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        $user->ID_Nick = $result['ID_USER'];
        $user->email = $result['EMAIL'];
        $user->password = $result['PASSWORD'];
        // $_SESSION['user'] = $result["ID_USER"];
        $_SESSION['user'] = serialize($user);
        header("Location: ../../perfil");
    }else{
        session_destroy();
    }
    sqlsrv_close($conn);  
    
}
function register ($user){
    //session_start();
    
    include 'm_conection.php';
    //include '../Clases/usuario.class.php';
    for($i=1;$i<3;$i++){
        $conn =conexion($i);
    $stmt = "SELECT * from Usuarios where (ID_USER like ? or EMAIL like ?)";  
    $params = array($user->ID_Nick,$user->email);
    $query = sqlsrv_query( $conn, $stmt, $params);

    if($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        echo 'Usuario ya registrado';
    }else{
        $stmt = "INSERT into Usuarios values(?,?,?)";  
        $params = array($user->ID_Nick,$user->email,$user->password);
        if(sqlsrv_query( $conn, $stmt, $params)){
            echo 'Registro exitoso';
            header("Location: ../login"); 
        } else {
            echo 'Fallo de registro';
        }

    }
    sqlsrv_close($conn);  
    }
}
    
?>