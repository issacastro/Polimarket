$(document).ready(function(){
  console.log('Filtros cargados');
$('.PrecioF').click(function(){
 Precio();  
})

$(document).on('keyup','#Buscar-nombre',function(e){
  var busqueda = $('#bus').val();
  var CAT = $('.categorias').prop('value');
  //alert(busqueda);
  //alert(CAT);

  search(CAT,busqueda);
  
  e.preventDefault();
});
$(document).on('submit','#Buscar-nombre',function(e){
  var busqueda = $('#bus').val();
  var CAT = $('.categorias').prop('value');
  search(CAT,busqueda);
  e.preventDefault();
  $('#Buscar-nombre')[0].reset();
});

function search(CAT,busqueda){
  $.ajax({
    url:'Model/m_filtros.php',
    type:'POST',
    data:{function:"f4",busqueda:busqueda,CAT:CAT},
    success: function(e){
     console.log(e);
     localStorage.setItem("STOCK",JSON.stringify(e));
     Precio();
    }
  });
}

$(document).on('click','.categoria',function(){
  var S=0;
  var ID = $(this).prop('value');
  var F= appendToStorage("FILTROS",ID) 
  var size = Object.keys(F).length;
  for( var i=0;i<=size;i++){
   if($('#category-'+F[i]).prop('checked')==false)
   var F = arrayRemove(F, F[i]);
  } 
 // alert(F);
  if(F==""){
   S="Vacio";
   localStorage.clear();
  }
  // alert(S);
  $.ajax({
      url: "Model/m_filtros.php",
      method: "POST",
      data: {function:"f3",F:F,S:S},
      success: function(e) {   
      //  alert(e);
       localStorage.setItem("STOCK",JSON.stringify(e));
          Precio();
          //location.reload();
          
        
  }
  });
})
$('#B').click(function(){
  var ESC = document.getElementById("ESC").value; 
  //alert(ESC);
  var F = JSON.parse(localStorage.getItem("FILTROS"));
  if(F==null || F==" "){
    S="Vacio";
    localStorage.clear();
   }else{
  var size = Object.keys(F).length;
  for( var i=0;i<=size;i++){
   if($('#category-'+F[i]).prop('checked')==false)
   var F = arrayRemove(F, F[i]);
  } 
}
  //alert(F);
 
   //alert(S);
  $.ajax({
      url: "Model/m_filtros.php",
      method: "POST",
      data: {function:"f2",F:F,S:S,ESC:ESC},
      success: function(e) {   
       // alert(e);
       localStorage.setItem("STOCK",JSON.stringify(e));
          Precio();
          //location.reload();    
  }
  });
})
function Prodcuto(producto,template){
  template +=`
            <div class="col-md-4 col-xs-6">
              <div class="product">
                <div class="product-img">
                <center>
                  <img src="${producto.img}"  align="middle" style="width: 220px; height: 200px">
                  <div class="product-label">
                    <span class="sale">-30%</span>
                    <span class="new">NEW</span>
                  </div>
                </div>
                <div class="product-body">
                  <p class="product-category">${producto.fk_Categoria}</p>
                  <input id="${producto.id_Producto}"type="hidden" value="${producto.fk_Categoria}">
                  <div  id="${producto.id_Producto}C" style="visibility: hidden">${producto.fk_Categoria}</div>
                  <h3 class="product-name"><a href="#">${producto.nombre}</a></h3>
                  <h4 class="product-price">${producto.precio}<del class="product-old-price">${producto.precio+100}</del></h4>
                  <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="product-btns">
                    <button value="${producto.id_Producto}" class="${"quick-view"}"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
                  </div>
                </div>
                <div class="add-to-cart">
                  <button value="${producto.id_Producto}" class="${"add-to-cart-btn"}" ><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
              </div>
            </div>
`;
  return template;
 }
 function appendToStorage(name,data){
  if(JSON.parse(localStorage.getItem(name))==null){
    var F=[];
  }else{
    var F = JSON.parse(localStorage.getItem(name));
  }
    F.push(data);
    localStorage.setItem(name,JSON.stringify(F));
    return  F;
}
function arrayRemove(arr, value) {

  arr = arr.filter(e => e !== value);
  return arr;
}

function Precio(){

  var min = document.getElementById("price-min").value;
  var max = document.getElementById("price-max").value; 
  //var esc = document.getElementById("ESC").value; 
  var e = JSON.parse(localStorage.getItem("STOCK"));
  //alert(esc);
          var data = JSON.parse(e);
          if(e==0){
          }else{
            let template =``;
            var data = JSON.parse(e);
            var size = Object.keys(data).length;
          for(var i =1;i<=size;i++){
            var  producto = JSON.parse(JSON.stringify(data[i]));
            if(esc="TODAS"){
              if(producto.stock!=0 && producto.precio >= min && producto.precio <= max)
              template = Prodcuto(producto,template);
            }else{
              //alert("ENTRO");
              if(producto.stock!=0 && producto.precio >= min && producto.precio <= max && producto.fk_Escuela==esc)
              template = Prodcuto(producto,template);
            }

          }
          $('#STOCK').html('');
          $(template).appendTo('#STOCK');
         // location.reload();
          
        }

}
});
