<!DOCTYPE html>
<html lang="en">
<?php
		session_start();
	   if( isset($_SESSION['user']) ){
			require'../View/Gen/header_login.php';
		} else{
			require'../View/Gen/header.php';
		}
	?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Perfil o no se </h3>
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
                <?php $User->ID_USER ?>
                </div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
         
		<!-- /SECTION -->
		<?php require'../View/Gen/footer.php' ?>
    </body>
</html>
