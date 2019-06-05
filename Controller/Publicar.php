<?php
		require 'Session/session.php';
		include '../CLases/usuario.class.php';
		include '../CLases/producto.class.php';
		include "../Model/m_product.php";
		$usr= unserialize($_SESSION['user']);
		$producto = new Producto();
	
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
		foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name)
		{
			//Validamos que el imagen exista
			if($_FILES["imagen"]["name"][$key]) {

				$filename ="product". $key . ".". pathinfo( $_FILES["imagen"]["name"][$key],PATHINFO_EXTENSION); //Obtenemos el nombre original del imagen
				$source = $_FILES["imagen"]["tmp_name"][$key]; //Obtenemos un nombre temporal del imagen
				$directorio = '../View/data/'.date("Ydis"); //Declaramos un  variable con la ruta donde guardaremos los imagens
				if($key==0){
					$tmp_img=explode("../", $directorio);
					$IMG=$tmp_img[1]."/".$filename;
				}
				//Validamos si la ruta de destino existe, en caso de no existir la creamos
				if(!file_exists($directorio)){
					mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
				}
				
				$dir=opendir($directorio); //Abrimos el directorio de destino
				$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del imagen
				
				//Movemos y validamos que el imagen se haya cargado correctamente
				//El primer campo es el origen y el segundo el destino
				if(move_uploaded_file($source, $target_path)) {	
					echo "El imagen $filename se ha almacenado en forma exitosa.<br>";
					echo $IMG;
					} else {	
					echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
				}
				closedir($dir); //Cerramos el directorio de destino
			}
			}
	
			$producto->fk_Vendedor=$usr->ID_Nick;
			$producto->id_Producto= date("Ydis");
			$producto->fk_Escuela=$_POST['Escuela'];
			$producto->fk_Categoria=$_POST['Categoria'];
			$producto->nombre=$_POST['Nombre'];
			$producto->descripcion=$_POST['Descripcion'];
			$producto->img=$IMG;
			$producto->stock=$_POST['Stock'];
			$producto->precio=$_POST['Precio'];
			create_product($producto);
			//Hay que llamar al proceso almaceado p_id_vendedor
			//Hay que redireccionar a la pagina del product con consulta de su producto recien publicado
	?>	