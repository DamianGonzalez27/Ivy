<?php
/*Dentro de esta clase vamos a crear todas las validaciones que se usaran en el sitio fa-weibo*/
//Incluiremos las librerias necesarias para el correcto funcionamiento de la clase
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoCarrito.php';
//Creamos la clase validador para poder acceder a las validaciones
class Validador{
  /*Creamos las variables que se usaran por todo el validador*/
  //Variables de entradas
  protected $titulo_entrada;
  protected $url_entrada;
  protected $cuerpo_entrada;
//Variables de promociones
  protected $porcentaje_promocion;
  protected $id_producto;
//Variables generales de usuario
  protected $nombre;
  protected $descripcion;
  protected $precio;
  protected $keyword;
  protected $apellido;
  protected $correo;
  protected $clave;
/*Creamos las variables de los errores*/
  protected $error_titulo;
  protected $error_url;
  protected $error_cuerpo;
  protected $error_nombre;
  protected $error_descripcion;
  protected $error_porcentaje;
  protected $error_id;
  protected $error_precio;
  protected $error_keyword;
  protected $errorNombre;
  protected $errorApellido;
  protected $errorCorreo;
  protected $errorClave1;
  protected $errorClave2;
  protected $errorStock;
/*Creamos los avisos de error*/
  protected $avisoApertura;
  protected $avisoCierre;
/*Se crea un constructor vaco pues los validadores heredaran las clases de esta misma*/
function __construct(){
}
//Aqui creamos un metodo para validar si las variables a declarar estan iniciadas
protected function variableIniciada($variable){
  if(isset($variable) && !empty($variable)){
    return true;
  }else{
    return false;
  }
return "";
}
/*Creamos los validadores*/
//Validador de Nombre
protected function validarNombre($nombre){
  if (!$this -> variableIniciada($nombre)) {
  return "El campo no debe ser vacio";
}else{
  $this -> nombre = $nombre;
}
return "";
}
//Validador de stock
protected function validarStock($stock){
  if (!$this -> variableIniciada($stock)) {
    return "Debes ingresar el stock del producto";
  }else{
    $this -> stock = $stock;
  }
}
//Validador de apellido
protected function validarApellido($apellido){
  if (!$this -> variableIniciada($apellido)) {
  return "Debes ingresar un apellido";
}else{
  $this -> apellido = $apellido;
}
return "";
}
//Metodo para validar el correo electronico del usuario
protected function validarCorreo($conexion, $correo){
if (!$this -> variableIniciada($correo)) {
  return "Debes ingresar un correo electronico";
}else{
  $this -> correo = $correo;
}
if (RepoUsuario::emailExiste($conexion, $correo)) {
  return "Este email ya esta en uso intenta con otro o <a href='#'>Recuperar mi contraseña</a>";
}

return "";
}

//Metodo para validar la clave 1 del usuario
protected function validarClave($clave1){
  if (!$this -> variableIniciada($clave1)) {
    return "Debes ingresar una clave";
  }
  if (strlen($clave1) < 8) {
    return "La contraseña no puede tener menos de 8 caracteres";
  }
#Aqui realizamos una validacion por medio de una exprecion regular
#Los psw deben tener minimo 8 caracteres 2 mayusculas y un caracter especial como minimo
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/", $clave1))
   {
    return "La contraseña debe contener: 8 caracteres incluir 2 letras mayusculas y 2 numeros como minimo ademas de un caracter especial $@$!%*?&";
  }
  return "";

}
//MEtodo para validar la clave 2 que el usuario ingresa
protected function validarClave2($clave1, $clave2){
  if (!$this -> variableIniciada($clave2)) {
    return "Primero debes rellenar la contraseña";
  }
  if (!$this -> variableIniciada($clave2)) {
    return "Debes repetir tu contraseña";
  }
  if ($clave1 !== $clave2) {
    return "Ambas contraseñas deben coinsidir";
  }
  return "";

}

#Creamos valodadores para las promociones
protected function validarProcentajePromocion($porcentaje_promocion){
  if (!$this -> variableIniciada($porcentaje_promocion)) {
    return "Debes ingresar el porcentaje de la promocion";
  }
  if ($porcentaje_promocion > 50) {
    return "Las promociones no pueden ser mayores al 50%";
  }
  else {
    $this -> porcentaje_promocion = $porcentaje_promocion;
  }
  return "";
}
protected function validarIdProducto($id_producto){
  if (!$this -> variableIniciada($id_producto)) {
    return "Debes ingresar el producto de la promocion";
  }else{
    $this -> id_producto = $id_producto;
  }
return "";
}

#Creamos los validadores de las entradas
protected function validarTitulo($conexion, $titulo_entrada){
  if (!$this -> variableIniciada($titulo_entrada)) {
    return 'Debes ingresar un titulo';
  }
  else {
    $this -> titulo_entrada = $titulo_entrada;
  }
  if (strlen($titulo_entrada) > 255) {

return 'El titulo no puede ocupar mas de 255 caracteres';
  }
  if (RepoEntradas::entradaExistente($conexion, $titulo_entrada)){
    return "Esta entrada ya existe por favor cambia el titulo de la misma";
  }
  return "";
}
#Creamos un metodo para poder sustituir los espacios en blanco por - y asi formar url's amistosas
protected function validarUrl($url_entrada){
    $urlTratada = preg_replace("/ /", "-", $url_entrada);
    $this -> url_entrada = $urlTratada;
return "";
}
#Metodo para validar el cuerpo de las entradas
protected function validarCuerpoEntrada($cuerpo_entrada){
  if (!$this -> variableIniciada($cuerpo_entrada)) {
    return 'Debes ingresar un titulo';
  }
  else {
    $this -> cuerpo_entrada = $cuerpo_entrada;
  }
return "";
}
#creamos un validador de la descripcion de los productos
protected function vlidarDescripcion($descripcion){
  if (!$this -> variableIniciada($descripcion)) {
    return "Debes ingresar una descripcion";
  }else {
    $this -> descripcion = $descripcion;
  }
  return "";
}
#Creamos un validador de precios
protected function validarPrecio($precio){
if (!$this -> variableIniciada($precio)) {
  return "Debes ingresar el precio del producto";
}if (!is_numeric($precio)) {
  return "Solo se permiten numeros en este campo";
}else {
  $this -> precio = $precio;
}
return "";
}
#Se validan las keywords deas diferentes paginas que se muestran en la pagina
protected function validarKeyword($keyword){
if (!$this -> variableIniciada($keyword)) {
  return "Debes ingresar las palabras clave del producto";
}else {
$this -> keyword = $keyword;
}
return "";
}
#Se crea una validacion de la categoria de un producto
protected function validarCategoria($categoria){
if (!$this -> variableIniciada($categoria)) {
  return "Debes ingresar la categoria del producto";
}
return "";
}
/*Creamos los setters*/
#Setters de las entradas
public function setTituloEntrada(){
   if ($this -> titulo_entrada !== "") {
     echo 'value = "'. $this -> titulo_entrada .'"';
   }
}
//Se crean los setters
#Mostrar texto de la entrada
public function setTextoEntrada(){
  if ($this -> cuerpo_entrada !== "" && strlen(trim($this -> cuerpo_entrada)) >0) {
    echo  $this -> cuerpo_entrada;
  }
}
#Mostrar el stok de los productos
public function setStock(){
  if ($this -> stock !== "") {
    echo 'value="'.$this -> stock.'"';
  }
}
#Errores de las entradas
public function setErrorTitulo(){
  if ($this -> error_titulo !== "") {
    echo $this -> avisoApertura.$this -> error_titulo.$this -> avisoCierre;
  }
}
#Mostrar error de url
public function setErrorUrl(){
  if ($this -> error_url !== "") {
    echo $this -> avisoApertura.$this -> error_url.$this -> avisoCierre;
  }
}
#Mostrar error del cuerpo de la entrada
public function setErrorCuerpo(){
  if ($this -> error_cuerpo !== "") {
    echo $this -> avisoApertura.$this -> error_cuerpo.$this -> avisoCierre;
  }
}
#Mostrar el error del stock
public function setErrorStock(){
  if ($this -> errorStock !== "") {
    echo $this -> avisoApertura.$this -> errorStock.$this -> avisoCierre;
  }
}

#setters
public function setNombre(){
  if ($this -> nombre !== "") {
    echo 'value="'. $this -> nombre .'"';
  }
}
public function setDescripcion(){
  if ($this -> descripcion !== "") {
  echo $this -> descripcion;
  }
}
public function setPrecio(){
  if ($this -> precio !== "") {
  echo 'value="'. $this -> precio .'"';
  }
}
public function setKeyword(){
  if ($this -> keyword !== "") {
  echo 'value="'.$this -> keyword.'"';
  }
}

#Errores de las promociones
public function setPorcentaje(){
  if ($this -> porcentaje_promocion !== "") {
  echo 'value="'.$this -> keyword.'"';
  }
}
public function setIdProducto(){
  if ($this -> id_producto !== "") {
  echo 'value="'.$this -> id_producto.'"';
  }
}
public function setErrorPorcentaje(){
  if ($this -> error_porcentaje !== "") {
    echo $this -> avisoApertura .$this -> error_porcentaje.$this -> avisoCierre;
  }
}
public function setErrorIdProducto(){
  if ($this -> id_producto !== "") {
    echo $this -> avisoApertura .$this -> id_producto.$this -> avisoCierre;
  }
}

#setters de los productos
public function setErrorNombre(){
  if ($this -> error_nombre !== "") {
    echo $this -> avisoApertura .$this -> error_nombre.$this -> avisoCierre;
  }
}
public function setErrorDescripcion(){
  if ($this -> error_descripcion !== "") {
    echo $this -> avisoApertura .$this -> error_descripcion.$this -> avisoCierre;
  }
}
public function setErrorPrecio(){
  if ($this -> error_precio !== "") {
    echo $this -> avisoApertura .$this -> error_precio.$this -> avisoCierre;
  }
}
public function setErrorKeyword(){
  if ($this -> error_keyword !== "") {
    echo $this -> avisoApertura .$this -> error_keyword.$this -> avisoCierre;
  }
}
#Setters del registro
public function mostrarNombre(){
  if($this -> nombre !== ""){
    echo 'value="'. $this -> nombre .'"';
  }
}
public function mostrarApellido(){
  if ($this -> apellido !== "") {
    echo 'value="'.$this -> apellido.'"';
  }
}
public function mostrarCorreo(){
  if ($this -> correo !== "") {
    echo 'value="'.$this -> correo.'"';
  }
}
//Creamos los metodos para mostrar los errores
public function mostrtarErrorNombre(){
  if ($this -> errorNombre !== "") {
    echo $this -> avisoApertura.$this -> errorNombre.$this -> avisoCierre;
  }
}
public function mostrarErrorApellido(){
  if ($this -> errorApellido !== "") {
    echo $this -> avisoApertura.$this -> errorApellido.$this -> avisoCierre;
  }
}
public function mostrarErrorCorreo(){
  if ($this -> errorCorreo !== "") {
    echo $this -> avisoApertura.$this -> errorCorreo.$this -> avisoCierre;
  }
}
public function mostrarErrorClave1(){
  if ($this -> errorClave1 !== "") {
    echo $this -> avisoApertura.$this -> errorClave1.$this -> avisoCierre;
  }
}
public function mostrarErrorClave2(){
  if ($this -> errorClave2 !== "") {
    echo $this -> avisoApertura.$this -> errorClave2.$this -> avisoCierre;
  }
}

/*Aqui pnemos los validadores finales*/
#Validador de entrada
public function entradaValida(){
  if ($this -> error_titulo === "" && $this -> error_url === "" && $this -> error_cuerpo === "" ) {
    return true;
  }else {
    return false;
  }
}
#Validador de productos
public function productoValidado(){
  if ($this -> error_nombre === "" && $this -> error_descripcion === "" && $this -> error_precio === "" && $this -> error_keyword === "") {
    return true;
  }else {
    return false;
  }
}
//Crearemos un metodo por so el registro es valido y asi continuar
public function registroValido(){
  if($this -> errorNombre === "" && $this -> errorApellido === "" && $this -> errorCorreo === ""
  && $this -> errorClave1 === "" && $this -> errorClave2 === ""){
    return true;
  }else{
    return false;
  }
}
#validar promociones
public function promocionValidada(){
  if($this -> error_nombre === "" && $this -> error_descripcion === ""
    && $this -> error_porcentaje === "" && $this -> error_id === "" ){
    return true;
  }else{
    return false;
  }
}
public function domicilioValido(){
  if ($this -> error_nombre === "") {
    return true;
  }else {
    return false;
  }
}
public function eventoValidado(){
  if ($this -> error_nombre === "" && $this -> error_precio === "") {
    return true;
  }else {
    return false;
  }
}
public function rfcValidado(){
if ($this -> error_nombre === "") {
  return true;
}else {
  return false;
}
}

/*Creamos los getter en general*/
#Getters de las entradas
public function getTituloEntrada(){
  return $this -> titulo_entrada;
}
public function getUrlEntrada(){
  return $this -> url_entrada;
}
public function getCuerpoEntrada(){
  return $this -> cuerpo_entrada;
}
public function getErrorTitulo(){
  return $this -> error_titulo;
}
public function getErrorUrl(){
  return $this -> error_url;
}
public function getErrorCuerpo(){
  return $this -> error_cuerpo;
}
public function getErrorStock(){
  return $this -> errorStock;
}
#Getters de los productos
public function getNombre(){
  return $this -> nombre;
}
public function getDescripcion(){
  return $this -> descripcion;
}
public function getPrecio(){
  return $this -> precio;
}
public function getKeyword(){
  return $this -> keyword;
}

public function getErrorNombre(){
  return $this -> error_nombre;
}
public function getErrorDescripcion(){
  return $this -> error_descripcion;
}
public function getErrorPrecio(){
  return $this -> error_precio;
}
public function geterrorKeyword(){
  return $this -> error_keyword;
}
/*Crearemos getter y Setters para el flujo de posibles errores que se encuentren en el sistema*/
//Obtenemos los valores.
public function getApellido(){
  return $this -> apellido;
}
public function getCorreo(){
  return $this -> correo;
}
public function getClave(){
  return $this -> clave;
}
//Obtenemos los errores
public function getErrorApellido(){
  return $this -> errorApellido;
}
public function getErrorCorreo(){
  return $this -> errorCorreo;
}
public function getErrorClave1(){
  return $this -> errorClave1;
}
public function getErrorClave2(){
  return $this -> errorClave2;
}
public function getIdUsuario(){
  return $this -> id_usuario;
}
public function getIdProducto(){
  return $this -> id_producto;
}
public function getPorcentaje(){
  return $this -> porcentaje_promocion;
}
public function getErrorPorcentaje(){
  return $this -> error_porcentaje;
}
public function getErrorId(){
  return $this -> error_id;
}
}
 ?>
