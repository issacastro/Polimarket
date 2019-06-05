<?php //aki va el automovil de compras jiji, ya no jiji, el automovil ira en otro 
    session_start();
    //include "../Clases/usuario.class.php";
        if( isset($_SESSION['user']) ){

        } else{
            $rt=$_SERVER['DOCUMENT_ROOT'];
            header("Location: index");
        }

?>