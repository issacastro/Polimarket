$(document).ready(function(){
    console.log('Peticones Corriendo');
    obtenerC();
    obtenerP();
    PERFIL();
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
  $(document).on('click','.add-to-compare',function(){
    var ID = $(this).prop('value');
    var CAT = document.getElementById(ID+"C").innerHTML
    var USR = document.getElementById("NICK").innerHTML
    alert(ID);
    alert(CAT);
    alert(USR);


  });

  $(document).on('click','.quick-view',function(){
  var SESSION=$("#SESSION").prop('value');
  //alert(SESSION);
  if(SESSION=="SI"){
  var ID = $(this).prop('value');
  var CAT = document.getElementById(ID+"C").innerHTML
  //alert(ID);
  //alert(CAT);
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
    if(e!="Ya esta"){
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
  }if(e==404){
    let template =`En el carrito puedes eliminarlo si lo agregaste sin querer :c`;
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
        total+=producto.precio*producto.cnt;
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
      <div class="product-btns">
      <input id="${producto.id_Producto}"type="hidden" value="${producto.fk_Categoria}">
      <div  id="${producto.id_Producto}C" style="visibility: hidden">${producto.fk_Categoria}</div>
      <button value="${producto.id_Producto}"class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
</div>
    </div>
    
  </div>
</div>
  `;}
  return template;
 }

 function Publicaciones(producto,template){
  // alert(JSON.stringify(producto))
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
      <div class="product-btns">
      <input id="${producto.id_Producto}"type="hidden" value="${producto.fk_Categoria}">
      <div  id="${producto.id_Producto}C" style="visibility: hidden">${producto.fk_Categoria}</div>
      <button value="${producto.id_Producto}"class="add-to-compare"><i class="fas fa-exchange-alt"></i><span class="tooltipp">Editar</span></button>
</div>
    </div>
    
  </div>
</div>
  `;
  return template;
 }

 
 function Compras(producto,template,i){
  // alert(JSON.stringify(producto))
  template +=`
  <div class="col-md-4 col-xs-6">
  <div class="product">
    <div class="product-img">
    <center>
      <img src="${producto.img}"  align="middle" style="width: 220px; height: 200px">
      
    </div>
    <div class="product-body">
      <p class="product-category">${producto.cat}</p>
      <h2><a>${producto.nombre}</a></h2>
      <h6 class="product-name">Compra #${producto.id_Compra}</h6>
      <h6 class="product-price">${producto.cantidad} items</h6>
      <p class="product-category">${i} ${producto.usr}</p>
      <h4 class="product-price">Precio ${producto.precio}</h4>
      <div class="product-rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <h6 class="product-name">Total</h6>
      <h6 class="product-price">${producto.total}</h6>
      <div class="product-btns">
      <input id="${producto.id_Compra}"type="hidden" value="${producto.cat}">
      <div  id="${producto.id_Compra}C" style="visibility: hidden">${producto.cat}</div>
      <button value="${producto.id_Compra}"class="add-to-wishlist"><i class="fas fa-trash-alt"></i><span class="tooltipp">Cancelar Compra</span></button>
</div>
    </div>
    
  </div>
</div>
  `;
  return template;
 }

$(document).on('click','#Compras',function(){
  //alert("Compras");
  var ID = document.getElementById("NICK").innerHTML
//alert(ID);
$.ajax({
  url:'Model/m_perfil.php',
    type:'POST',
    data:{function:"f1",ID:ID},
    success: function(e){   
      //alert(e);
      let template=``;
      var datos = JSON.parse(e);
     if(datos!=""){
      //alert("Lleno");
      var size = Object.keys(datos).length;
      for(var i =1;i<=size;i++){
        var  producto = JSON.parse(JSON.stringify(datos[i]));
        template = Compras(producto,template,"Vendedor");
      }
      $('#PERFIL').html(template);
     }else{
      alert("Vacio");
     }

    }

});

})

$(document).on('click','#Ventas',function(){
  var ID = document.getElementById("NICK").innerHTML
//alert("Ventas");
$.ajax({
  url:'Model/m_perfil.php',
    type:'POST',
    data:{function:"f2",ID:ID},
    success: function(e){   
      //alert(e);
      let template=``;
      var datos = JSON.parse(e);
     if(datos!=""){
          //alert("Lleno");
          var size = Object.keys(datos).length;
          for(var i =1;i<=size;i++){
            var  producto = JSON.parse(JSON.stringify(datos[i]));
            template = Compras(producto,template,"Comprador");
          }
          $('#PERFIL').html(template);
     }else{
      alert("Vacio");
     }

    }

});

})

$(document).on('click','#Publick',function(){
  var ID = document.getElementById("NICK").innerHTML
//alert("Publicacines");
$.ajax({
  url:'Model/m_perfil.php',
    type:'POST',
    data:{function:"f3",ID:ID},
    success: function(e){  
     // alert(e); 
      let template=``;
      var datos = JSON.parse(e);
     if(datos!=""){
      var size = Object.keys(datos).length;
      for(var i =1;i<=size;i++){
        var  producto = JSON.parse(JSON.stringify(datos[i]));
        template = Publicaciones(producto,template);
      }
      $('#PERFIL').html(template);
     }else{
      alert("Vacio");
     }

    }

});
});

$(document).on('click','#ACTUALIZAR',function(){
//$("#EdicionModal").modal();
var ID = $("#Nombre").val();
var Email = $("#Email").val();
var Password = $("#Password").val();
//alert(ID);
//alert(Email);
//alert(Password);
$.ajax({
  url: 'Model/m_perfil.php',
  type:'POST',
  data:{function:"f5",ID:ID,Email:Email,Password:Password},
  success: function(e){
    //alert(e);
    Datos(e);
    var datos = JSON.parse(e);
    let template=`
    Estos son tus nuevos datos ${datos.ID_Nick}
    `;
    $('#Titulo').html(template);
    template=`
    <div class="card-body centered form-group">
    <br>
   <input id="Email-N" class="input-cant text-center" type="text" readonly ="readonly "placeholder="${datos.email}">
   <i class="bar"></i>
   <br>
   <input  id="Password-N" class="input-cant text-center" type="password" placeholder="${datos.password}" readonly ="readonly" >
 <i class="bar"></i>
 </div>
    `;
    $('#Cuerpo').html(template);
    template=`
    <div class="col-md-5 col-md-push-2">
    <button id="ACTUALIZAR-N" class="primary-btn text-center" >Va !</button>
    </div>
    `;
    $('#Botones').html(template);
    $("#EdicionModal").modal();
  }
});
})
$(document).on('click','#ACTUALIZAR-N',function(){
  $("#EdicionModal").modal('hide');
})

$(document).on('click','#Datos',function(){
  var ID = document.getElementById("NICK").innerHTML
//alert("Datos");
$.ajax({
  url:'Model/m_perfil.php',
    type:'POST',
    data:{function:"f4",ID:ID},
    success: function(e){
      Datos(e);
    }
});
})

function PERFIL(){
  let template=`
  
  
<div class="card-body centered form-group">
<div class="col-md-8 col-md-push-3">
    <h2> Estas en tu Perfil</h2>
</div>
</div>
<div class="col-md-8 col-md-push-3">
<p>Aqui podras ver tus datos de contacto, tus compras realizadas , tus ventas y publicaciones</p>
<p>Tambien podras cancelar tus compras o mantener actualizadas tus publicaciones o pausarlas</p>
</div>
<div class="card-body centered form-group">
<div class="col-md-8 col-md-push-4">
<a href="/POLIMARKET">
        <img src="View/img/Market.png"align="middle" style="width: 220px; height: 200px">
   </a>
</div>
</div> 
  `;
  $('#PERFIL').html(template);
}
function Datos(e){   
  //   alert(e);
     var datos = JSON.parse(e);
   let template =`
           
   <div class="card-body centered form-group">
   <div class="col-md-9 col-md-push-3">
    <h2> Datos de Usuario</h2>
   </div>
   <br>
     <input  id="Nombre" class="input-cant text-center" type="text" placeholder="Nombre de Usuario" readonly="readonly" value="${datos.ID_Nick}">
     <i class="bar"></i>
     <br>
     <input id="Email" class="input-cant text-center" type="text" placeholder="Correo Electronico"  value="${datos.email}">
     <i class="bar"></i>
     <br>
     <input  id="Password" class="input-cant text-center" type="password" placeholder="Contraseña de usuario" value="${datos.password}">
     <i class="bar"></i>
     <br>
     <div class="col-md-5 col-md-push-4">
     <button id="ACTUALIZAR" class="primary-btn text-center" >Actualizar !</button>
     </div>
</div>
   `;
   $('#PERFIL').html(template);
   }
});