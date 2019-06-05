<?php
 include 'm_conection.php';
function create_product($p){
    session_start();
   // require 'Connection.php';
   $conn = conexion(SRV( $p->fk_Categoria));
    $sql = "EXEC p_id_vendedor 
    @ID_USER=?, 
    @ID_PRODUCTO=?, 
    @FK_ESCUELA=?, 
    @FK_CATEGORIA=?,
    @NOMBRE=?,
    @DESCRIPCION=?, 
    @IMG=?,
    @STOCK=?, 
    @PRECIO=?";
    $params = array(
        $p->fk_Vendedor,
        $p->id_Producto,
        $p->fk_Escuela,
        $p->fk_Categoria,
        $p->nombre,
        $p->descripcion,
        $p->img,
        $p->stock,
        $p->precio);
        
        $stmt = sqlsrv_query($conn, $sql, $params);
        if(!$stmt){
            echo "Error al Insertar Producto";
        }else{
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

            header("Location: ../product");
        }
    }

    function getProducts(){
        //require 'Connection.php';
        $stmt = "SELECT 
        ID_PRODUCTO, T1.FK_USER AS FK_VENDEDOR, T2.NOMBRE AS FK_ESCUELA,FK_CATEGORIA,T.NOMBRE,DESCRIPCION,IMG,STOCK,STATUS,PRECIO 
        FROM Producto AS T
        INNER JOIN
        Vendedor AS T1
        ON T.FK_VENDEDOR = T1.ID_VENDEDOR
        INNER JOIN Escuela AS T2 
        ON T.FK_ESCUELA = T2.ID_ESCUELA";  
       $products=array();
       $params=array();
       $products=OpenConexion(conexion(1),$stmt,$params,$products,1);
       $products+=OpenConexion(conexion(2),$stmt,$params,$products,sizeof($products)+1);
       //$products=OpenConexion(conexion(3),$stmt,NULL,$products,sizeof($products)+1);
       
       return $products;
    }
    function getProductsIndex($SRV){
        //require 'Connection.php';
        $stmt = "SELECT 
        ID_PRODUCTO, T1.FK_USER AS FK_VENDEDOR, T2.NOMBRE AS FK_ESCUELA,FK_CATEGORIA,T.NOMBRE,DESCRIPCION,IMG,STOCK,STATUS,PRECIO 
        FROM Producto AS T
        INNER JOIN
        Vendedor AS T1
        ON T.FK_VENDEDOR = T1.ID_VENDEDOR
        INNER JOIN Escuela AS T2 
        ON T.FK_ESCUELA = T2.ID_ESCUELA";  
       $products=array();
       $params=array();
       $products=OpenConexion(conexion($SRV),$stmt,$params,$products,1);
       return $products;
    }
    function getProduct($id,$Categoria){
        $SRV= SRV($Categoria);
        //require 'Connection.php';
       
        $conn= conexion($SRV);
    
        $stmt = "SELECT 
        ID_PRODUCTO, T1.FK_USER AS FK_VENDEDOR, T2.NOMBRE AS FK_ESCUELA,FK_CATEGORIA,T.NOMBRE,DESCRIPCION,IMG,STOCK,STATUS,PRECIO 
        FROM Producto AS T
        INNER JOIN
        Vendedor AS T1
        ON T.FK_VENDEDOR = T1.ID_VENDEDOR
        INNER JOIN Escuela AS T2 
        ON T.FK_ESCUELA = T2.ID_ESCUELA
        WHERE ID_PRODUCTO=?";
        $params = array($id);  
    
        $query = sqlsrv_query( $conn, $stmt,$params);
        if($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
            $product=new Producto();
            $product->nombre = $result['NOMBRE'];
            $product->id_Producto = $result['ID_PRODUCTO']; 
            $product->fk_Categoria = $result['FK_CATEGORIA'];
            $product->fk_Vendedor = $result['FK_VENDEDOR'];
            $product->fk_Escuela = $result['FK_ESCUELA'];
            $product->descripcion = $result['DESCRIPCION'];
            $product->status = $result['STATUS'];
            $product->img = $result['IMG'];
            $product->nombre = $result['NOMBRE'];
            $product->precio = $result['PRECIO'];
            $product->stock = $result['STOCK'];
        }
        return $product;
        sqlsrv_close($conn); 
        
    
    }
    function getProductsF($stmt, $params){

        $products = array(); 
        $products=OpenConexion(conexion(1),$stmt,$params,$products,1);
        $products+=OpenConexion(conexion(2),$stmt,$params,$products,sizeof($products)+1);
        return $products;
    
    }
    function FilterPro($srv,$stmt, $params,$size){

        $products = array(); 
        $products=OpenConexion(conexion($srv),$stmt,$params,$products,$size+1);
        return $products;
    
    }

    function SRV($Categoria){
        $data = file_get_contents("../Resources/data/categorias.json");
        $products = json_decode($data, true);
//print_r($data);
         foreach ($products as $product) {
            foreach($product as $clave=>$valor){
             if($valor['Categoria']==$Categoria){
               $SRV= $valor['SRV'];
                 }
             }
        }
        return $SRV;
    }

    function OpenConexion($conn,$stmt,$params,$products,$i){
        if($params==NULL){
            $query = sqlsrv_query( $conn, $stmt);
        }else {
            $query = sqlsrv_query( $conn, $stmt,$params);
        }
        
        $products = array();
        while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
            $pr=new Producto();
            $pr->nombre = $result['NOMBRE'];
            $pr->id_Producto = $result['ID_PRODUCTO']; 
            $pr->fk_Categoria = $result['FK_CATEGORIA'];
            $pr->fk_Vendedor = $result['FK_VENDEDOR'];
            $pr->fk_Escuela = $result['FK_ESCUELA'];
            $pr->descripcion = $result['DESCRIPCION'];
            $pr->status = $result['STATUS'];
            $pr->img = $result['IMG'];
            $pr->nombre = $result['NOMBRE'];
            $pr->precio = $result['PRECIO'];
            $pr->stock = $result['STOCK']; 
            $products+=[ "$i" => $pr ];
            $i++;
        }
        sqlsrv_close($conn); 
        return $products;
    }
    
?>