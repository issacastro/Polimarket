<?php 
	require '../Controller/Session/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../View/Gen/header_login.php';
 $usr=unserialize($_SESSION['user']);
?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
						<h3 class="title">! Hola !</h3>
							<h3 id="NICK"class="title"><?php echo $usr->ID_Nick?></h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li ><a id="Datos" data-toggle="tab" href="#tab2">Tus Datos </a></li>
									<li><a id="Compras" data-toggle="tab" href="#tab2">Compras</a></li>
									<li><a id="Ventas" data-toggle="tab" href="#tab2">Ventas</a></li>
									<li><a id="Publick" data-toggle="tab" href="#tab2">Publicaciones</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
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

				<div id="PERFIL"></div>
							   <!-- Modal Para Editar Tareas -->
<div class="modal fade" id="EdicionModal" tabindex="-1" role="dialog" aria-labelledby="EdicionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2  id="Titulo"> </h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="Cuerpo"class="modal-body">
            </div>
            <div id="Botones" class="modal-footer">
            </div>
          </div>
        </div>
      </div>
 <!-- Modal Para Editar Tareas -->
				<!--/PERFIL-->
				</div>
				
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		</div>
		<!-- /SECTION -->
		<?php require'../View/Gen/footer.php' ?>
    </body>
</html>
