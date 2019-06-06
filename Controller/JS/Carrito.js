$(document).ready(function(){
console.log('Carrito cargado');
$('.eliminarc').click(function(){    
    var ID = $(this).prop('value');
    //alert(ID);
    $.ajax({
      url:'Model/eliminarc.php',
      type:'POST',
      data:{ID:ID},
      success: function(){   
       obtenerC(); 
      }
    });
  });

  function obtenerC(){
    $.ajax({
      url:'Model/obtenercarrito.php',
      type:'POST',
      success: function(e){   
        var data = JSON.parse(e);
        var total=0;
        var items=0;
        if(e==0 ){
          document.getElementById("CARRITO").innerHTML = 'Carrito Vacio ';
          document.getElementById("nump").innerHTML = '0';
          document.getElementById("items").innerHTML = items+' Item(s) seleccionados';
          document.getElementById("Total").innerHTML = 'SUBTOTAL: $0';
          //alert("A");
        }else{
          let template =``;
          var data = JSON.parse(e);
          var size = Object.keys(data).length;
        for(var i =1;i<=size;i++){
          var  producto = JSON.parse(JSON.stringify(data[i]));
          template = Carrito(producto,template);
          items+=1;
          total+=producto.precio;
        }
        document.getElementById("nump").innerHTML = items;
        document.getElementById("items").innerHTML = items+' Item(s) seleccionados';
        document.getElementById("Total").innerHTML = 'SUBTOTAL: $'+total;
        template +=`
        <script src="Controller/JS/Carrito.js"></script>
        `;
        $('#CARRITO').html(template);
      } 
      }
    });
   }
   function Carrito(producto,template){
    template +=`
    <div  id="${producto.id_Producto}" class="product-widget">
    <div class="product-img">
        <img src="${producto.img}" alt="">
    </div>
    <div class="product-body">
        <h3 class="product-name"><a href="#">${producto.nombre}</a></h3>
        <h4 class="product-price"><span class="qty">${producto.cnt}x</span>$${producto.precio}</h4>
    </div>
    <button value="${producto.id_Producto}" class="delete eliminarc">x</button>
  </div>
    `;
    return template;
   }
  });