<?php
include '../CLases/producto.class.php';
include 'm_product.php';
include '../Controller/Session/session.php';

$p= getProduct($_POST['ID'],$_POST['CAT']);
$_SESSION['product'] = serialize($p);

$directory = "../View/data/".$p->id_Producto."/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
$filecount = count($files);
}
$img = scandir($directory, 1);
$_SESSION['FCOUNT'] = $filecount;
$_SESSION['IMG'] = $img;

//header("Location: ../product");


?>