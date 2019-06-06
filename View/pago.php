<!DOCTYPE html>
<html lang="en">
<?php
	require '../Controller/Session/session.php';
	   if( isset($_SESSION['user']) ){
			require '../View/Gen/header_login.php';
		} else{
			require '../View/Gen/header.php';
		}
		//include '../Model/m_compra.php';
		
		include "../Model/m_product.php";
		

	?>
	
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Datos de Contacto</h3>
							</div>
							<div class="form-group" >
							<!-- <form action="make_compra()" method="POST">  FUNCION INSERTAR COMPRA-->
							<form action="procesar" method="POST">
								<input class="input" type="text" id="nombre" name="nombre" placeholder="Nombre">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="apellido" placeholder="Apelldio">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="escuela" placeholder="Escuela">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="ciudad" placeholder="Ciudad">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Celular">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
								</div>
							</div>
						</div>
						<!-- /Billing Details -->
						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Mensaje para el vendedor</h3>
								<h3></h3>
								<div class="order-notes">
							<textarea class="input" placeholder="Escribe tus dudas o comentarios para el vendedor"></textarea>
						</div>
							</div>
							<div class="input-checkbox">
								<div class="caption">
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<!-- /Order notes -->
					</div>
					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Tu Pedido</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCTO</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
							<?php 
								  $total=0;
								  $pe= unserialize($_SESSION['PAGO']);
								   foreach ($pe as $p) {
								?>
								<div class="order-col">
									<div>
									<input id="<?php echo $p->id_Producto;?>" name="<?php echo $p->id_Producto;?>" value="<?php echo $p->cnt;?>" type="hidden" readonly="readonly">
									 <?php echo $p->cnt."x   "; echo $p->nombre;?></div>
									<div><?php echo "$ ".$p->precio;
									$total+=$p->precio*$p->cnt; ?></div>
								</div>
								   <?php }?>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?php
								
								
								
								echo "$ ".$total?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">

							</div>
						</div>
						<div class="input-checkbox">
						<button id="PAGAR" type="submit" class="primary-btn order-submit">Finalizar</button>
					</div>
					</form>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
     
		<!-- /SECTION -->
		<?php require'../View/Gen/footer.php' ?>
    </body>
</html>
