<!DOCTYPE html>
<html lang="en">
<?php
		//session_start();
		//include "../Clases/producto.class.php";
		include "../Model/m_product.php";
	   	require '../View/Gen/log_header.php';
		
	?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Pedido</a></li>
							
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							

							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Ordenar por:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Fecha</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

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
		<button type="button" class="btn btn-danger">Ir a pagar</button>
      </div>
    </div>
  </div>
</div>

							<!-- product -->
							<div id="PEDIDO"></div>
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Polimarket</span>
							<div id="RESUMEN" class="cart-summary"></div>
							<ul class="store-pagination">
								<li class="active">Listo</li>
								
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
