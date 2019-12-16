<?php namespace Core\BD;

// detalles de la conexion
$conn_string = "host=localhost port=5432 dbname=test user=postgres password=r00t options='--client_encoding=UTF8'";
 
// establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string);
 
// Revisamos el estado de la conexion en caso de errores. 
if(!$dbconn) {
echo "Error: No se ha podido conectar a la base de datos\n";
} else {
echo "Conexión exitosa\n";
}
 
// Close connection
pg_close($dbconn);


$query = "SELECT nombre, distrito FROM ciudad WHERE countrycode='GT'";
$ciudades = pg_query($query) or die('Error: ' . pg_last_error());
$resutado = array();
while ($row = pg_fetch_assoc($ciudades)) {
   $resutado[] = $row;
}
 
//agregamos los encabezados correspondientes a la respuesta
//un paso muy improtante que todos se saltean
http_response_code(200);
header("Content-type:application/json");
 
// codificar la respuesta en formato JSON
echo json_encode($resutado);