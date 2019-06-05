<?php
include "../Clases/usuario.class.php";
include "../Model/m_login.php";

if( isset( $_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) ){
        $user = new Usuario();
        $user->ID_Nick = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['pass'];
        register($user);
        // Enviar $user a funcion que inserte los datos
        // PD: hacer validacion que no este registrado el usuario
        // echo $user->ID_Nick.' '.$user->email.' '.$user->password;
    } else{
        echo 'No deje campos vacios';
    }
?>