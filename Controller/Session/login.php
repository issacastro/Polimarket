<?php
include "../../Clases/usuario.class.php";
include "../../Model/m_login.php";

$error="";
if( isset( $_POST['your_name']) && isset($_POST['your_pass']) ){
        $user = new Usuario();
        $user->ID_Nick = $_POST['your_name'];
        $user->email = $_POST['your_name']; //el usuario solo mete el nik o correo, se guarda el mismo valor ne las dos variables y se compara cual coincide checa la consulta de m?login
        $user->password = $_POST['your_pass'];
        login($user);
         echo "Datos incorrectos";
    } else{
        echo 'No deje campos vacios';
    }
?>
