<?php namespace Core\BD;
use Config\DB;

class Mysql {

    private $conexion;

    private $servidor;
    private $db;
    private $user;
    private $password;

    public function __construct()
    {
        //die('Fallo');
        $this->conexion = new MySQLConfig();
        $this->servidor = $this->conexion->config['Servidor'];
        $this->db = $db = $this->conexion->config['Base'];
        $this->user = $this->conexion->config['Usuario'];
        $this->password = $this->conexion->config['Password'];

    }

    public function abrir_conexion() 
    {
            try 
            {
                $this->conexion = new PDO('mysql:host='.$this->servidor.'; dbname='.$this->db, $this->user, $this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->exec("SET CHARACTER SET utf8");
            } 
            catch (PDOException $ex) 
            {
                print "ERROR: " . $ex -> getMessage() . "<br>";
                die();
            }

        return $this->conexion;
    }
    
    public function cerrar_conexion()
     {
        return null;
    }
    
    public function obtener_conexion() 
    {
        return self::$conexion;
    }

    public function closeConexion()
    {
        return $this->conexion = null;
    }
}