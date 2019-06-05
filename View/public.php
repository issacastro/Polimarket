<?php
		require '../View/Gen/log_header.php';
    ?>
		<!-- SECTION -->
		<div class="section-title ">
			<!-- container -->
			<div class="container text-center">
								<h2>Vamo a empezar...</h2>
			</div>
		<!-- Public Form -->
	   <div class="card-body centered form-group">
					<form action="Controller/Publicar.php" method="POST" class="review-form" id="product-form" enctype="multipart/form-data" >
						<input name="Nombre" id="Nombre" class="input-cant text-center" type="text" placeholder="Nombre de Producto" required>
						<i class="bar"></i>
						<textarea name="Descripcion" id="Descripcion" class="input-cant" placeholder="Descripcion" required></textarea>
						<i class="bar"></i>
            <div class="product-options form-group col-md-5">
							<label>
								Cantidad: <input name="Stock" id="Stock" class="input-cant text-center" type="number" required></select>
								<i class="bar"></i>
							</label>
							<label>
								Precio: <input name="Precio" id="Precio" class="input-cant text-center" type="text" placeholder="MXN" required>
								<i class="bar"></i>
							</label>
            </div>
            <div class="product-options form-group">
							<label>
							Escuela:<select name="Escuela" id="Escuela" class="input-s escuelas"><option>Selecciona</option></select>
							<i class="bar"></i>
							</label>
							<label>
							Categoria:<select name="Categoria" id="Categoria" class="input-s categorias"><option >Selecciona</option></select>
							<i class="bar"></i>
							</label>
							</div>
							<label>
							Subir imagen: <input type="file" name="imagen[]" id="imagen[]" multiple >
							</label>
							<br>
							<br>
								<div class="centered">
								<button class="primary-btn text-center submitBtn" >Publicar !</button>
								</div>
						</form>
					</div>
			<!-- /Public Form -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php require'../View/Gen/footer.php' ?>
    </body>
</html>
