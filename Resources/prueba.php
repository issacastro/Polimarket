<?php
session_start();
include '../Clases/usuario.class.php';
include "../Clases/producto.class.php";
include '../Controller/Session/cart.php';
//session_destroy();
include '../Model/m_product.php';
//$_SESSION['user'] = serialize($user);
    //$usr=unserialize($_SESSION['user']
$usr1 = new Usuario();
$usr1->ID_Nick='user1';
$usr1->email='1mail';
$usr1->password='1pass';

$usr2 = new Usuario();
$usr2->ID_Nick='user2';
$usr2->email='2mail';
$usr2->password='2pass';

$usr3 = new Usuario();
$usr3->ID_Nick='user3';
$usr3->email='3mail';
$usr3->password='3pass';

$usr4 = new Usuario();
$usr4->ID_Nick='user4';
$usr4->email='4mail';
$usr4->password='PASH';

$users = array();
$users[$usr2->ID_Nick]=$usr2;
$users[$usr1->ID_Nick]=$usr1;
$users[$usr3->ID_Nick]=$usr3;

echo is_array($users) ? 'Array' : 'not an Array';
echo in_array($usr3,$users) ? ' Si existe' : ' No existe';

//insert($usr2);
array_push($users,$usr4);

$users += [ "$usr4->ID_Nick" => $usr4 ];

unset($users[$usr1->ID_Nick]);
//print_r($users);
//echo count($users);
//$_SESSION['users'] = serialize($users);
//$usr=unserialize($_SESSION['users']);
//print_r($usr);
//echo $users[$usr4->ID_Nick]->password;
$pr=array();
$pr=getProducts();

//$_SESSION['cart']=array();

$cart=array();
//foreach($_SESSION['cart'] as $result){
    foreach($pr as $result){
    $px=new Producto();
    $px->id_Producto = $result->id_Producto; 
    $px->fk_Categoria = $result->fk_Categoria;
    $px->nombre = $result->nombre;
    $px->precio = $result->precio;
    $px->stock = $result->stock;
    //$cart+= [ "$px->id_Producto" => $px ];
    //echo isset($cart[$px->id_Producto])? ' Si existe ' : ' No existe ';
    insert($px);

}
//insert($px);
//echo cnt();


//print_r($cart);
//unset($_SESSION['cart']);
//$_SESSION['cart']=$cart;
//print_r($_SESSION['cart']);

//echo $_SESSION['cart'][$px->id_Producto]->nombre;

/*$productos=array();
    foreach($pr as $item){
        if(isset($_SESSION['cart'][$item->id_Producto])){
            $p=new Producto();
            $p->id_Producto = $item->id_Producto; 
            $p->fk_Categoria = $item->fk_Categoria;
            $p->nombre = $item->nombre;
            $p->precio = $item->precio;
            $p->stock = $item->stock;
            $productos += [ "$p->id_Producto" => $p ];
        }
    } print_r($productos);*/
print_r(lista());
//delete($px->id_Producto);
echo 'cantidad'.cnt();
echo 'total jeje'.total();


    //print_r(array_keys($pr));
//print_r($pr);

?>