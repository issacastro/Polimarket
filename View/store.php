<!DOCTYPE html>
<html lang="en">
<?php
		//session_start();
		//include "../Clases/producto.class.php";
		include "../Model/m_stock.php";
	   	require '../View/Gen/log_header.php';
		
	?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
					<h3 class="aside-title">Bienvenido estamos a sus ordenes</h3>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categorias</h3>
							<div class="checkbox-filter">
                      <?php
					  $cat=getCategorias();
					  foreach ($cat as $categoria) {
						  
					  ?>
								<div class="input-checkbox" id="catE-<?php echo $categoria->Categoria?>">
									<input class="categoria"type="checkbox" id="category-<?php echo $categoria->Categoria?>" value="<?php echo $categoria->Categoria?>">
									<label  for="category-<?php echo $categoria->Categoria?>" value="<?php echo $categoria->Categoria?>">
										<span></span>
										<?php echo $categoria->Categoria?>
										<small>(120)</small>
									</label>
								</div>
								<?php
							}?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Precio</h3>
							<div class="price-filter PrecioF">
								<div id="price-slider" class="PrecioF"></div>
								<div class="input-number price-min PrecioF">
									<input id="price-min" type="number" class="PrecioF">
									<span class="qty-up PrecioF">+</span>
									<span class="qty-down PrecioF">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max PrecioF">
									<input id="price-max" type="number" class="PrecioF">
									<span class="qty-up PrecioF">+</span>
									<span class="qty-down PrecioF">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							
							<div class="checkbox-filter">					
						</div>
							<div class="product-widget">
								<div class="product-img">
									<img src="View/img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoria</p>
									<h3 class="product-name"><a href="#">Nombre del producto</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="View/img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoria</p>
									<h3 class="product-name"><a href="#">Nombre del producto</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store 
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Escuelas:
									
									<select id="ESC"class="input-select">
										<option value="TODAS">Todas</option>
									<?php
					  $esc=getEscuelas();
					  foreach ($esc as $escuela) {
						  
					  ?>
										<option value="<?php echo $escuela->nombre;?>"><?php echo $escuela->nombre;?></option>
										<?php
							}?>
									</select>
								</label>
								<button id="B">Filtrar</button>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
					 top filter -->

						<!-- store products -->
						<div class="row">
						  <!-- Modal -->
 <div  id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="Mensaje" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="PRODUCTO" class="modal-body">
        
      </div>
      <div class="modal-footer cart-btns">
        <button type="button" class="btn btn-light" data-dismiss="modal">Seguir viendo</button>
		<button onclick="location.href = 'pagar';" type="button" class="btn btn-danger">Ir a pagar</button>
      </div>
    </div>
  </div>
</div>

			  <!-- Modal -->
			  <div  id="SESION" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="Mensaje2" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="PRODUCTO2" class="modal-body">
        
      </div>
      <div class="modal-footer cart-btns">
        <button type="button" class="btn btn-light" data-dismiss="modal">Seguir viendo</button>
		<button onclick="location.href = 'login';" type="button" class="btn btn-danger">Sign In</button>
      </div>
    </div>
  </div>
</div>


							<!-- product -->
							<div id="STOCK"></div>
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Polimarket</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	
		<?php require'../View/Gen/footer.php' ?>
		
		
	</body>
</html>
