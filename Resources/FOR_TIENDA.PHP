<?php  
                include 'producto.php';
                 
                if(mysqli_num_rows($result) > 0){  
                     while($row = mysqli_fetch_array($result)){  
                ?>  
                <div class="col-md-3">  
                     <!--<form method="post" action="Carrito.php?id=<?php //echo $row["id_prod"]; ?>">  -->
                          <div style="border:1px solid #333; background-color:#F2F2F2; border-radius:5px; padding:16px;" align="center"> 
                          
                               <img src="<?php echo $row["id_prod"]; ?>.png" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["descripcion"]; ?></h4>  
                               <h4 class="text-warning">Disponible: <?php echo $row["stock"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["costo"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="descripcion" value="<?php echo $row["descripcion"]; ?>" />  
                               <input type="hidden" name="stock" value="<?php echo $row["stock"]; ?>" /> 
                               <input type="hidden" name="costo" value="<?php echo $row["costo"]; ?>" />
                               
                               
                               <input id="carrito" type="button" name="add_to_cart" style="margin-top:5px;" class="btn btn-success producto muestra" precio="<?php echo $row["costo"]; ?> " descripcion="<?php echo $row["descripcion"]; ?>" value="Add to Cart" />  
                          </div>
                          <br/>
                     <!--</form>  -->
                </div>  
                <?php  
                     }  
                }  
                ?>  