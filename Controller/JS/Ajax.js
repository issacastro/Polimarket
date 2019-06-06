$(document).ready(function(){
    console.log('Peticones Corriendo');
    obtenerC();
    obtenerP();
    $.getJSON("Resources/data/categorias.json", function (data) {
      $.each(data.Categorias, function (i, data) {
          var div_data = "<option value=" + data.Categoria + ">" + data.Categoria + "</option>";
          $(div_data).appendTo('.categorias');
  
      });
      
  });
  $.getJSON("Resources/data/escuelas.json", function (data) {
    $.each(data.Escuelas, function (i, data) {
        var div_data = "<option value=" + data.Num + ">" + data.Escuela + "</option>";
        $(div_data).appendTo('.escuelas');

    });
  });
    $('#login-form').submit(function(e){
    let your_name = $('#your_name').val();
    let your_pass = $('#your_pass').val();
    //Peticion Ajax al Seridor
    $.ajax({
        url: 'Controller/Session/login.php',
        type:'POST',
        data:{your_name:your_name,your_pass:your_pass},
        success: function(datos){
           if(datos=="Datos incorrectos"){
            document.getElementById("error").innerHTML = 'Algo salio mal,vuleve a intentar ';
           }
           else{
            window.location.href ="perfil";
           }
          }
         
    });
    e.preventDefault();
    $('#login-form')[0].reset();
  })
  $('#register-form').submit(function(e){
    let name = $('#name').val();
    let email = $('#email').val();
    let pass = $('#pass').val();
    //Peticion Ajax al Seridor
    $.ajax({
        url: 'Controller/reg.php',
        type:'POST',
        data:{name:name,email:email,pass:pass},
        success: function(datos){
          if(datos=="Usuario ya registrado"){
            document.getElementById("error").innerHTML = 'Usuario ya registrado ';
           }
           else{
            window.location.href ="login";
           }
          }
         
    });
    e.preventDefault();
    $('#register-form')[0].reset();
  })
  $(document).on('click','.quick-view',function(){
  var SESSION=$("#SESSION").prop('value');
  //alert(SESSION);
  if(SESSION=="SI"){
  var ID = $(this).prop('value');
  var CAT = document.getElementById(ID+"C").innerHTML
  //alert(ID);
  $.ajax({
    url:'Model/m_mostrar.php',
    type:'POST',
    data:{ID:ID,CAT:CAT},
    success: function(e){   
      //alert(e);
      window.location.href ="product";
      //location.reload();

    }
  });
  }else{
    let template =`Para poder realizar operaciones debes de iniciar sesion`;
    $("#SESION").modal();
    $('#Mensaje2').html("Algo salio mal :c");
    $('#PRODUCTO2').html(template);
  }
});

$(document).on('click','.add-to-cart-btn',function(){
  var SESSION=$("#SESSION").prop('value');
  if(SESSION=="SI"){
  var ID = $(this).prop('value');
  var CAT = document.getElementById(ID+"C").innerHTML
  //alert(CAT);
$.ajax({
  url:'Model/m_carrito.php',
  type:'POST',
  data:{ID:ID,CAT:CAT},
  success: function(e){   
    //alert(e);
    if(e!=1){
    let template =``;
    var  producto = JSON.parse(e);
    //alert(producto.nombre);
    if((producto.stock-producto.cnt)>=0){
    template=Prodcuto(producto,template);
    $("#myModal").modal();
    $('#Mensaje').html("Listo ya lo agregamos al carrito !");
    $('#PRODUCTO').html(template);
   obtenerC(); 
    }
    else{
      let template =`Lo sentimos el vendedor ya no tiene stock`;
      $("#myModal").modal();
      $('#Mensaje').html("Algo salio mal :c");
      $('#PRODUCTO').html(template);
    }
  }else{
    let template =`Cuand realices tu compra podras elejir la cantidad de este producto`;
    $("#myModal").modal();
    $('#Mensaje').html("! Ya esta en el Carrito!");
    $('#PRODUCTO').html(template);
  }
  }
});
  }else{
    let template =`Para poder realizar operaciones debes de iniciar sesion`;
    $("#SESION").modal();
    $('#Mensaje2').html("Algo salio mal :c");
    $('#PRODUCTO2').html(template);
  }
  obtenerC();
})

 function Carrito(producto,template){
  if(producto.stock==0){
    template +=`
  <div  id="${producto.id_Producto}" class="product-widget">
  <div class="product-img">
      <img src="${producto.img}" alt="">
  </div>
  <div class="product-body">
      <h3 class="product-name"><a href="#">${producto.nombre}</a></h3>
      <h4 class="product-price"><span class="qty">Ya no esta disponible :c</span></h4>
  </div>
  <button value="${producto.id_Producto}" class="delete eliminarc">x</button>
</div>
  `; 
}else{
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
  }
  return template;
 }
 function Prodcuto(producto,template){
  template +=`
  <div class="product-widget">
  <div class="product-img">
      <img src="${producto.img}" alt="">
  </div>
  <div class="product-body">
      <h3 class="product-name"><a href="#">${producto.nombre}</a></h3>
      <p>${producto.descripcion}</p>
      <h4 class="product-price">$${producto.precio}</h4>
  </div>
</div>
  `;
  return template;
 }
 function obtenerC(){
  $.ajax({
    url:'Model/obtenercarrito.php',
    type:'POST',
    success: function(e){   
      var data = JSON.parse(e);
      var total=0;
      var items=0;
      if(e==0){
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
        if(producto.stock!=0){
        items+=producto.cnt*1;
        total+=producto.cnt*producto.precio;
      }
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

 function obtenerP(){
  $.ajax({
    url:'Model/obtenercarrito.php',
    type:'POST',
    success: function(e){   
      var data = JSON.parse(e);
      var total=0;
      var items=0;
      if(e==0){
      }else{
        let template =``;
        var data = JSON.parse(e);
        var size = Object.keys(data).length;
      for(var i =1;i<=size;i++){
        var  producto = JSON.parse(JSON.stringify(data[i]));
        template = Pedido(producto,template);
        items+=1;
        total+=producto.precio;
      }
      $('#PEDIDO').html(template);
      template =`<h5>TOTAL:${total}</h5>`;
      $('#RESUMEN').html(template);
    } 
    }
  });
 }

 function Pedido(producto,template){
  // alert(JSON.stringify(producto))
  if(producto.stock!=0){
  template +=`
  <div class="col-md-4 col-xs-6">
  <div class="product">
    <div class="product-img">
    <center>
      <img src="${producto.img}"  align="middle" style="width: 220px; height: 200px">
      
    </div>
    <div class="product-body">
      <p class="product-category">${producto.fk_Categoria}</p>
      <h3 class="product-name"><a href="#">${producto.nombre}</a></h3>
      <h5 class="product-name">${producto.fk_Escuela}</h5>
      <h5 class="product-price">STOCK:${producto.stock}</h5>
      <p class="product-category">${producto.descripcion}</p>
      <h4 class="product-price">${producto.precio}<del class="product-old-price">${producto.precio+Math.floor(Math.random()*101)}</del></h4>
      <div class="product-rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
    
    </div>
    
  </div>
</div>
  `;}
  return template;
 }

});