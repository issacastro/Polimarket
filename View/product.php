<?php 
	require '../Controller/Session/session.php';
	//require '../CLases/producto.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require'../View/Gen/header_login.php';
include "../Model/m_product.php";
?>
        	<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
						<?php $product=unserialize($_SESSION['product']);?>
							<li><a href="#"><?php echo $product->fk_Categoria ?></a></li>
							<li class="active"><?php
																			echo $product->nombre?></li>
						</ul>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
						<?php 
						$img=$_SESSION['IMG'];
						$files=$_SESSION['FCOUNT'];
						for($i = 0; $i <$files ; $i++) {
						?>
							<div class="product-preview">
								<img src="<?php  echo "View/data/".$product->id_Producto."/".$img[$i]; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="<?php  echo "View/data/".$product->id_Producto."/".$img[$i]; ?>" alt="">
							</div>
						<?php } ?>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
						<?php 
						$img=$_SESSION['IMG'];
						$files=$_SESSION['FCOUNT'];
						for($i = 0; $i <$files ; $i++) {
						?>						
							<div class="product-preview">
							<img src="<?php  echo "View/data/".$product->id_Producto."/".$img[$i]; ?>" alt="">
							</div>
							
						<?php }?>
						</div>
					</div>
					<!-- /Product thumb imgs -->

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

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $product->nombre?></h2>
							<div>
								<h3 class="product-price"><?php echo $product->precio?> MXN</h3>
								<span id="CNT" class="product-available"><?php echo $product->stock?> en Stock</span>
								<div  id="CNT" style="visibility: hidden"><?php echo $product->stock?></div>
							</div>
							<p><?php echo $product->descripcion?></p>
							<div class="add-to-cart">
		
								<button value="<?php echo $product->id_Producto ?>" class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
								<div  id="<?php echo $product->id_Producto; ?>C" style="visibility: hidden"><?php echo $product->fk_Categoria ?></div>
							</div>
							<ul class="product-links">
								<li>Categoria:</li>
								<li><a href="#"><?php echo $product->fk_Categoria ?></a></li>
							</ul>
							<ul class="product-links">
								<li>Escuela:</li>
								<li><a href="#"><?php echo $product->fk_Escuela ?></a></li>
							</ul>
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descripción</a></li>
								<li><a data-toggle="tab" href="#tab2">Detalles</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $product->descripcion?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Obtener detalles de las demas tablas</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Productos Relacionados</h3>
						</div>
					</div>


					<!-- product -->
					<?php
					
					$pr= getProductTOP2(1,$product->fk_Categoria);
					foreach ($pr as $p) {
					
					?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="<?php echo $p->img;?>" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
							<input id="<?php echo $p->id_Producto;?>"type="hidden" value="<?php echo $p->fk_Categoria; ?>">
                    <div  id="<?php echo $p->id_Producto;?>C" style="visibility: hidden"><?php echo $p->fk_Categoria; ?></div>
								<p class="product-category"><?php echo $p->fk_Categoria;?></p>
								<h3 class="product-name"><a href="#"><?php echo $p->nombre;?></a></h3>
								<h4 class="product-price">$<?php echo $p->precio;?> <del class="product-old-price">$<?php echo $p->precio+102;?></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
								<button value="<?php echo $p->id_Producto; ?>"class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
								</div>
							</div>
						</div>
					</div>
					<!-- /product -->
						<?php }?>

					<div class="clearfix visible-sm visible-xs"></div>

					<!-- product -->
					<?php
					
					$pr= getProductTOP2(2,$product->fk_Categoria);
					foreach ($pr as $p) {
					
					?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="<?php echo $p->img;?>" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
							<input id="<?php echo $p->id_Producto;?>"type="hidden" value="<?php echo $p->fk_Categoria; ?>">
                    <div  id="<?php echo $p->id_Producto;?>C" style="visibility: hidden"><?php echo $p->fk_Categoria; ?></div>
								<p class="product-category"><?php echo $p->fk_Categoria;?></p>
								<h3 class="product-name"><a href="#"><?php echo $p->nombre;?></a></h3>
								<h4 class="product-price">$<?php echo $p->precio;?> <del class="product-old-price">$<?php echo $p->precio+102;?></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
								<button value="<?php echo $p->id_Producto; ?>"class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
								</div>
							</div>
						</div>
					</div>
					<!-- /product -->
						<?php }?>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
    <?php require'../View/Gen/footer.php'; ?>
	</body>
</html>
