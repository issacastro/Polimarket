<?php 
//    session_start();

    //$_SESSION['user'] = serialize($user);
    //$usr=unserialize($_SESSION['user']);
    
    function insert($item){
          $cnt=1;
        if(isset($_SESSION['cart'])){ //Si esta inicializado el carro lo lee
            //$cart=unserialize($_SESSION['cart']);
            $cart=$_SESSION['cart'];
            //$total=$_SESSION['total'];
            //$cnt=$_SESSION['cnt'];
        } else { //Si no inicia un array vacio
            $cart = array();
            $_SESSION['cart']=$cart;
            //$_SESSION['cnt']=0;
            //$_SESSION['total']=0;
        }
        
        if(!isset($cart[$item->id_Producto])){ //Checa si el producto ya esta en el carrito
        //if(in_array($item,$cart)){ 
            $ID=$item->id_Producto;
            $item->cnt=1;
            //$item->stock=$cnt;
           // $cart +=  [ "$ID" => $item ] ; //Agrega el item al carrito
            //unset($_SESSION['cart']);
            //unset($_SESSION['total']);
            //unset($_SESSION['cnt']);
            $_SESSION['cart'] +=  [ "$ID" => $item ] ;
            
          //  $total+=$item->precio*$item->stock;
           // $_SESSION['total']=$total;

            //$cnt=+$item->stock;
            //$_SESSION['cnt']=$cnt;
           
        } else {
            $cart[$item->id_Producto]->cnt+=1;
        }
        $cart=$_SESSION['cart'];
        return $cart[$item->id_Producto];
    }

    function delete($id_item){
        $cart=$_SESSION['cart']; //lee el carrito
        //$_SESSION['cnt']-=$cart[$id_item]->stock;
        $cart[$id_item]->cnt-=1;
        if($cart[$id_item]->cnt<=0){
        unset($cart[$id_item]); //elimina el item del carrito
        unset($_SESSION['cart']);
        }
        $_SESSION['cart']=$cart; //guarda el arreglo actualizado
    }

    function total(){
        if(isset($_SESSION['cart'])){
            //echo $_SESSION['total'];
        } else {
            return 0;
        }
    }

    function cnt(){
        if(isset($_SESSION['cart'])){
            //return $_SESSION['cnt'];
        } else {
            return 0;
        }
    }    

    function lista(){
        if(isset($_SESSION['cart'])){
            $pr=getProducts();
            $productos=array();
            $i=1;
                foreach($pr as $item){
                    if(isset($_SESSION['cart'][$item->id_Producto])){
                        $p=new Producto();
                        $p->id_Producto = $item->id_Producto; 
                        $p->fk_Categoria = $item->fk_Categoria;
                        $p->fk_Escuela = $item->fk_Escuela;
                        $p->nombre = $item->nombre;
                        $p->descripcion = $item->descripcion;
                        $p->precio = $item->precio;
                        $p->stock = $item->stock;
                        $p->status = $item->status;
                        $p->img = $item->img;
                        $p->cnt = $_SESSION['cart'][$item->id_Producto]->cnt;
                        $productos += [ "$i" => $p ];
                        $i++;
                    }
                }
            return $productos;
        }
        else {
            return 0;
        }
    }   
     //   return ;
    
?>