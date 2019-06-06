<?php

class RepoFacturas{

public static function solicitarFactura($conexion, $compra, $rfc, $usuario, $domicilio){
$factura_solicitada = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO factura(id_factura, compras_id_compra, rfc_factura, usuario_id_usuario,domicilio_id_domicilio) VALUES ('', :compra, :rfc, :usuario, :domicilio)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':compra', $compra, PDO::PARAM_STR);
$sentencia -> bindValue(':rfc', $rfc, PDO::PARAM_STR);
$sentencia -> bindValue(':usuario', $usuario, PDO::PARAM_STR);
$sentencia -> bindValue(':domicilio', $domicilio, PDO::PARAM_STR);
$factura_solicitada = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
return $factura_solicitada;
}

}

 ?>
