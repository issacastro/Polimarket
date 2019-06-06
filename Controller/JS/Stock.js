$(document).ready(function(){
  localStorage.clear();
    obtenerProductos("#STOCK");
    console.log('Stock cargada');
 function obtenerProductos(DIV){
    $.ajax({
      url:'Model/m_filtros.php',
      type:'POST',
      async: false,
      data:{function:"f1"},
      success: function(e){   
        localStorage.setItem("STOCK",JSON.stringify(e));
        var data = JSON.parse(e);
        if(e==0){
        }else{
          let template =``;
          var data = JSON.parse(e);
          var size = Object.keys(data).length;
        for(var i =1;i<=size;i++){
          var  producto = JSON.parse(JSON.stringify(data[i]));
          if(producto.stock!=0)
          template = Stock(producto,template);
        }
        
        $(template).appendTo(DIV);
      } 
      }
    });
   }

 function Stock(producto,template){
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
});