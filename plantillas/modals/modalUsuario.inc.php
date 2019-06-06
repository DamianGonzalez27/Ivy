<?php

if (count($pedidos)) {
for ($i=0; $i < count($pedidos); $i++) {
	$domicilio = $pedidos[$i][0];
	$producto = $pedidos[$i][1];
	$usuario = $pedidos[$i][2];
	$cantidad = $pedidos[$i][3];
	$fecha =$pedidos[$i][4];
	$compra = $pedidos[$i][5];
	$compras = RepoCompra::getPrpductosByCompra(Conexion::getConexion(), $compra);
?>
<div class="modal fade" id="<?php echo $compra;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center" id="myModalLabel"><i class="fa fa-barcode" aria-hidden="true"></i> Descripcion de compra</h4>
			</div>
			<div class="modal-body">
				<div class="ventas">
					<div class="ventas-head">
						<h1 class="text-center"><?php echo $usuario -> getNombreUsuario() ." ". $usuario -> getApellidoUsuario();?></h1>
						<h4>Folio:  00<?php echo $compra;?></h4>
					</div>
					<div class="ventas-body">
						<div class="row">
							<div class="col-md-8">
								<p>Fecha de compra: </p>
							</div>
							<div class="col-md-4">
<p><?php echo $fecha;?></p>
							</div>
						</div>
						<div class="row">
							<table class="table table-responsive">
									<thead>
											<tr>
												<th>Producto</th>
												<th>Cantidad</th>
												<th>Precio</th>
											</tr>
									</thead>
									<tbody>
	<?php Helper::getProductosCompras($compras);?>
</tbody>
</table>
<hr>
							<div class="row domicilio">
								<div class="col-md-3">
									<p>Domicilio de entrega: </p>
								</div>
								<div class="col-md-9">
									<p><?php echo $domicilio -> getEstadoIdEstado() .", ".
									$domicilio -> getMunicipioIdMunicipio() .", ".
									$domicilio -> getColonia().", ";
									;?></p>
									<p><?php echo $domicilio -> getLocalidad().", ".
									$domicilio -> getCalle().", C.P: ".
									$domicilio -> getCodigoPostal();?></p>
									<p><?php
									if (!empty($domicilio -> getNoInterior())) {
										echo "No. Interior: ".$domicilio -> getNoInterior();
									}
									if (!empty($domicilio -> getNoExterior())) {
										echo " No. Exterior: " . $domicilio -> getNoExterior();
									}
									 ?></p>
									 <p><?php
									 if (!empty($domicilio -> getReferencias())) {
									 	echo $domicilio -> getReferencias();
									 }
									  ?></p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<p>Telefono de usuario:</p>
								</div>
								<div class="col-md-9">
									<p><?php echo $usuario -> getTelefonoUsuario();?></p>
								</div>
							</div>
							<div class="row">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
}

if (count($envios)) {
  for ($i=0; $i <count($envios); $i++) {
    $domicilio = $envios[$i][0];
  	$producto = $envios[$i][1];
  	$usuario = $envios[$i][2];
  	$cantidad = $envios[$i][3];
  	$fecha =$envios[$i][4];
  	$compra = $envios[$i][5];
  	$compras = RepoCompra::getPrpductosByCompra(Conexion::getConexion(), $compra);
    ?>
    <div class="modal fade" id="<?php echo $compra;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title text-center" id="myModalLabel"><i class="fa fa-barcode" aria-hidden="true"></i> Descripcion de compra</h4>
    			</div>
    			<div class="modal-body">
    				<div class="ventas">
    					<div class="ventas-head">
    						<h1 class="text-center"><?php echo $usuario -> getNombreUsuario() ." ". $usuario -> getApellidoUsuario();?></h1>
    						<h4>Folio:  00<?php echo $compra;?></h4>
    					</div>
    					<div class="ventas-body">
    						<div class="row">
    							<div class="col-md-8">
    								<p>Fecha de compra: </p>
    							</div>
    							<div class="col-md-4">
    <p><?php echo $fecha;?></p>
    							</div>
    						</div>
    						<div class="row">
    							<table class="table table-responsive">
    									<thead>
    											<tr>
    												<th>Producto</th>
    												<th>Cantidad</th>
    												<th>Precio</th>
    											</tr>
    									</thead>
    									<tbody>
    	<?php Helper::getProductosCompras($compras);?>
    </tbody>
    </table>
    <hr>
    							<div class="row domicilio">
    								<div class="col-md-3">
    									<p>Domicilio de entrega: </p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $domicilio -> getEstadoIdEstado() .", ".
    									$domicilio -> getMunicipioIdMunicipio() .", ".
    									$domicilio -> getColonia().", ";
    									;?></p>
    									<p><?php echo $domicilio -> getLocalidad().", ".
    									$domicilio -> getCalle().", C.P: ".
    									$domicilio -> getCodigoPostal();?></p>
    									<p><?php
    									if (!empty($domicilio -> getNoInterior())) {
    										echo "No. Interior: ".$domicilio -> getNoInterior();
    									}
    									if (!empty($domicilio -> getNoExterior())) {
    										echo " No. Exterior: " . $domicilio -> getNoExterior();
    									}
    									 ?></p>
    									 <p><?php
    									 if (!empty($domicilio -> getReferencias())) {
    									 	echo $domicilio -> getReferencias();
    									 }
    									  ?></p>
    								</div>
    							</div>
    							<hr>
    							<div class="row">
    								<div class="col-md-3">
    									<p>Telefono de usuario:</p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $usuario -> getTelefonoUsuario();?></p>
    								</div>
    							</div>
    							<div class="row">

    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <?php
  }
}

if (count($productos)) {
	for ($i=0; $i <count($productos); $i++) {
    $domicilio = $productos[$i][0];
  	$producto = $productos[$i][1];
  	$usuario = $productos[$i][2];
  	$cantidad = $productos[$i][3];
  	$fecha =$productos[$i][4];
  	$compra = $productos[$i][5];
  	$compras = RepoCompra::getPrpductosByCompra(Conexion::getConexion(), $compra);
    ?>
    <div class="modal fade" id="<?php echo $compra;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title text-center" id="myModalLabel"><i class="fa fa-barcode" aria-hidden="true"></i> Descripcion de compra</h4>
    			</div>
    			<div class="modal-body">
    				<div class="ventas">
    					<div class="ventas-head">
    						<h1 class="text-center"><?php echo $usuario -> getNombreUsuario() ." ". $usuario -> getApellidoUsuario();?></h1>
    						<h4>Folio:  00<?php echo $compra;?></h4>
    					</div>
    					<div class="ventas-body">
    						<div class="row">
    							<div class="col-md-8">
    								<p>Fecha de compra: </p>
    							</div>
    							<div class="col-md-4">
    <p><?php echo $fecha;?></p>
    							</div>
    						</div>
    						<div class="row">
    							<table class="table table-responsive">
    									<thead>
    											<tr>
    												<th>Producto</th>
    												<th>Cantidad</th>
    												<th>Precio</th>
    											</tr>
    									</thead>
    									<tbody>
    	<?php Helper::getProductosCompras($compras);?>
    </tbody>
    </table>
    <hr>
    							<div class="row domicilio">
    								<div class="col-md-3">
    									<p>Domicilio de entrega: </p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $domicilio -> getEstadoIdEstado() .", ".
    									$domicilio -> getMunicipioIdMunicipio() .", ".
    									$domicilio -> getColonia().", ";
    									;?></p>
    									<p><?php echo $domicilio -> getLocalidad().", ".
    									$domicilio -> getCalle().", C.P: ".
    									$domicilio -> getCodigoPostal();?></p>
    									<p><?php
    									if (!empty($domicilio -> getNoInterior())) {
    										echo "No. Interior: ".$domicilio -> getNoInterior();
    									}
    									if (!empty($domicilio -> getNoExterior())) {
    										echo " No. Exterior: " . $domicilio -> getNoExterior();
    									}
    									 ?></p>
    									 <p><?php
    									 if (!empty($domicilio -> getReferencias())) {
    									 	echo $domicilio -> getReferencias();
    									 }
    									  ?></p>
    								</div>
    							</div>
    							<hr>
    							<div class="row">
    								<div class="col-md-3">
    									<p>Telefono de usuario:</p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $usuario -> getTelefonoUsuario();?></p>
    								</div>
    							</div>
    							<div class="row">

    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <?php
  }
}

if (count($productos_pendientes)) {
	for ($i=0; $i <count($productos_pendientes); $i++) {
    $domicilio = $productos_pendientes[$i][0];
  	$producto = $productos_pendientes[$i][1];
  	$usuario = $productos_pendientes[$i][2];
  	$cantidad = $productos_pendientes[$i][3];
  	$fecha =$productos_pendientes[$i][4];
  	$compra = $productos_pendientes[$i][5];
  	$compras = RepoCompra::getPrpductosByCompra(Conexion::getConexion(), $compra);
    ?>
    <div class="modal fade" id="<?php echo $compra;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title text-center" id="myModalLabel"><i class="fa fa-barcode" aria-hidden="true"></i> Descripcion de compra</h4>
    			</div>
    			<div class="modal-body">
    				<div class="ventas">
    					<div class="ventas-head">
    						<h1 class="text-center"><?php echo $usuario -> getNombreUsuario() ." ". $usuario -> getApellidoUsuario();?></h1>
    						<h4>Folio:  00<?php echo $compra;?></h4>
    					</div>
    					<div class="ventas-body">
    						<div class="row">
    							<div class="col-md-8">
    								<p>Fecha de compra: </p>
    							</div>
    							<div class="col-md-4">
    <p><?php echo $fecha;?></p>
    							</div>
    						</div>
    						<div class="row">
    							<table class="table table-responsive">
    									<thead>
    											<tr>
    												<th>Producto</th>
    												<th>Cantidad</th>
    												<th>Precio</th>
    											</tr>
    									</thead>
    									<tbody>
    	<?php Helper::getProductosCompras($compras);?>
    </tbody>
    </table>
    <hr>
    							<div class="row domicilio">
    								<div class="col-md-3">
    									<p>Domicilio de entrega: </p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $domicilio -> getEstadoIdEstado() .", ".
    									$domicilio -> getMunicipioIdMunicipio() .", ".
    									$domicilio -> getColonia().", ";
    									;?></p>
    									<p><?php echo $domicilio -> getLocalidad().", ".
    									$domicilio -> getCalle().", C.P: ".
    									$domicilio -> getCodigoPostal();?></p>
    									<p><?php
    									if (!empty($domicilio -> getNoInterior())) {
    										echo "No. Interior: ".$domicilio -> getNoInterior();
    									}
    									if (!empty($domicilio -> getNoExterior())) {
    										echo " No. Exterior: " . $domicilio -> getNoExterior();
    									}
    									 ?></p>
    									 <p><?php
    									 if (!empty($domicilio -> getReferencias())) {
    									 	echo $domicilio -> getReferencias();
    									 }
    									  ?></p>
    								</div>
    							</div>
    							<hr>
    							<div class="row">
    								<div class="col-md-3">
    									<p>Telefono de usuario:</p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $usuario -> getTelefonoUsuario();?></p>
    								</div>
    							</div>
    							<div class="row">

    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <?php
  }
}

if (count($productos_facturados)) {
	for ($i=0; $i <count($productos_facturados); $i++) {
    $domicilio = $productos_facturados[$i][0];
  	$producto = $productos_facturados[$i][1];
  	$usuario = $productos_facturados[$i][2];
  	$cantidad = $productos_facturados[$i][3];
  	$fecha =$productos_facturados[$i][4];
  	$compra = $productos_facturados[$i][5];
  	$compras = RepoCompra::getPrpductosByCompra(Conexion::getConexion(), $compra);
    ?>
    <div class="modal fade" id="<?php echo $compra;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title text-center" id="myModalLabel"><i class="fa fa-barcode" aria-hidden="true"></i> Descripcion de compra</h4>
    			</div>
    			<div class="modal-body">
    				<div class="ventas">
    					<div class="ventas-head">
    						<h1 class="text-center"><?php echo $usuario -> getNombreUsuario() ." ". $usuario -> getApellidoUsuario();?></h1>
    						<h4>Folio:  00<?php echo $compra;?></h4>
    					</div>
    					<div class="ventas-body">
    						<div class="row">
    							<div class="col-md-8">
    								<p>Fecha de compra: </p>
    							</div>
    							<div class="col-md-4">
    <p><?php echo $fecha;?></p>
    							</div>
    						</div>
    						<div class="row">
    							<table class="table table-responsive">
    									<thead>
    											<tr>
    												<th>Producto</th>
    												<th>Cantidad</th>
    												<th>Precio</th>
    											</tr>
    									</thead>
    									<tbody>
    	<?php Helper::getProductosCompras($compras);?>
    </tbody>
    </table>
    <hr>
    							<div class="row domicilio">
    								<div class="col-md-3">
    									<p>Domicilio de entrega: </p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $domicilio -> getEstadoIdEstado() .", ".
    									$domicilio -> getMunicipioIdMunicipio() .", ".
    									$domicilio -> getColonia().", ";
    									;?></p>
    									<p><?php echo $domicilio -> getLocalidad().", ".
    									$domicilio -> getCalle().", C.P: ".
    									$domicilio -> getCodigoPostal();?></p>
    									<p><?php
    									if (!empty($domicilio -> getNoInterior())) {
    										echo "No. Interior: ".$domicilio -> getNoInterior();
    									}
    									if (!empty($domicilio -> getNoExterior())) {
    										echo " No. Exterior: " . $domicilio -> getNoExterior();
    									}
    									 ?></p>
    									 <p><?php
    									 if (!empty($domicilio -> getReferencias())) {
    									 	echo $domicilio -> getReferencias();
    									 }
    									  ?></p>
    								</div>
    							</div>
    							<hr>
    							<div class="row">
    								<div class="col-md-3">
    									<p>Telefono de usuario:</p>
    								</div>
    								<div class="col-md-9">
    									<p><?php echo $usuario -> getTelefonoUsuario();?></p>
    								</div>
    							</div>
    							<div class="row">

    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <?php
  }
}
if (count($productos_facturados)) {
for ($i=0; $i < count($productos_facturados); $i++) {
	$domicilio = $productos_facturados[$i][0];
	$producto = $productos_facturados[$i][1];
	$usuario = $productos_facturados[$i][2];
	$cantidad = $productos_facturados[$i][3];
	$fecha =$productos_facturados[$i][4];
	$compra = $productos_facturados[$i][5];
	$compras = RepoCompra::getPrpductosByCompra(Conexion::getConexion(), $compra);
?>
<div class="modal fade" id="<?php echo $compra;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center" id="myModalLabel"><i class="fa fa-barcode" aria-hidden="true"></i> Descripcion de compra</h4>
			</div>
			<div class="modal-body">
				<div class="ventas">
					<div class="ventas-head">
						<h1 class="text-center"><?php echo $usuario -> getNombreUsuario() ." ". $usuario -> getApellidoUsuario();?></h1>
						<h4>Folio:  00<?php echo $compra;?></h4>
					</div>
					<div class="ventas-body">
						<div class="row">
							<div class="col-md-8">
								<p>Fecha de compra: </p>
							</div>
							<div class="col-md-4">
<p><?php echo $fecha;?></p>
							</div>
						</div>
						<div class="row">
							<table class="table table-responsive">
									<thead>
											<tr>
												<th>Producto</th>
												<th>Cantidad</th>
												<th>Precio</th>
											</tr>
									</thead>
									<tbody>
	<?php Helper::getProductosCompras($compras);?>
</tbody>
</table>
<hr>
							<div class="row domicilio">
								<div class="col-md-3">
									<p>Domicilio de entrega: </p>
								</div>
								<div class="col-md-9">
									<p><?php echo $domicilio -> getEstadoIdEstado() .", ".
									$domicilio -> getMunicipioIdMunicipio() .", ".
									$domicilio -> getColonia().", ";
									;?></p>
									<p><?php echo $domicilio -> getLocalidad().", ".
									$domicilio -> getCalle().", C.P: ".
									$domicilio -> getCodigoPostal();?></p>
									<p><?php
									if (!empty($domicilio -> getNoInterior())) {
										echo "No. Interior: ".$domicilio -> getNoInterior();
									}
									if (!empty($domicilio -> getNoExterior())) {
										echo " No. Exterior: " . $domicilio -> getNoExterior();
									}
									 ?></p>
									 <p><?php
									 if (!empty($domicilio -> getReferencias())) {
									 	echo $domicilio -> getReferencias();
									 }
									  ?></p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<p>Telefono de usuario:</p>
								</div>
								<div class="col-md-9">
									<p><?php echo $usuario -> getTelefonoUsuario();?></p>
								</div>
							</div>
							<div class="row">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
}
 ?>
