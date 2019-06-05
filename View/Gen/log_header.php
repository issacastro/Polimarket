<?php
		session_start();		
	   if( isset($_SESSION['user']) ){  
			require'../View/Gen/header_login.php';
		} else{
			require'../View/Gen/header.php';
		}
    ?>