<?php 
	require '../Controller/Session/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../View/Gen/header_login.php' ?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
					<!-- Pruebas -->
						<h3 class="breadcrumb-header">Datos de Usuario: <?php $usr=unserialize($_SESSION['user']);
																			echo $usr->email." ".$usr->ID_Nick." ".$usr->password;
																	?></h3>
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
                
                </div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php require'../View/Gen/footer.php' ?>
    </body>
</html>
