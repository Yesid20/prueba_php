<?php

class Usuario {
    private $id;
    private $nombre;
    private $correo;
    private $cedula;
    private $fecha_nacimiento;
    private $mensaje;
    private $conexion;
    
    public function __construct($id = null) {
        $this->id = $id;
        $this->conexion = new PDO("pgsql:host=localhost port=5432 dbname=my_dbprueba user=nuevo password=nuevo2021");
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }
    
    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    
    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getCorreo() {
        return $this->correo;
    }
    
    public function getCedula() {
        return $this->cedula;
    }
    
    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }
    
    public function getMensaje() {
        return $this->mensaje;
    }
    
    public function guardar() {
        if ($this->id) {
            $query = "UPDATE usuarios SET nombre=:nombre, correo=:correo, cedula=:cedula, fecha_nacimiento=:fecha_nacimiento, mensaje=:mensaje WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        } else {
            $query = "INSERT INTO usuarios (nombre, correo, cedula, fecha_nacimiento, mensaje) VALUES (:nombre, :correo, :cedula, :fecha_nacimiento, :mensaje)";
            $stmt = $this->conexion->prepare($query);
        }
        
        $stmt->bindValue(":nombre", $this->nombre, PDO::PARAM_STR);
        $stmt->bindValue(":correo", $this->correo, PDO::PARAM_STR);
        $stmt->bindValue(":cedula", $this->cedula, PDO::PARAM_STR);
        $stmt->bindValue(":fecha_nacimiento", $this->fecha_nacimiento, PDO::PARAM_STR);
        $stmt->bindValue(":mensaje", $this->mensaje, PDO::PARAM_STR);
        
        $stmt->execute();
        
        if (!$this->id) {
            $this->id = $this->conexion->lastInsertId();
        }
    }
    
    public function cargar() {
        $query = "SELECT nombre, correo, cedula, fecha_nacimiento, mensaje FROM usuarios WHERE id=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->nombre = $result["nombre"];
            $this->correo = $result["correo"];
            $this->cedula = $result["cedula"];
            $this->fecha_nacimiento = $result["fecha_nacimiento"];
            $this->mensaje = $result["mensaje"];
        }
    }
    
    public function eliminar() {
        $query = "DELETE FROM usuarios WHERE id=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public static function listar() {
        $conexion = new PDO("pgsql:host=localhost port=5432 dbname=my_dbprueba user=nuevo password=nuevo2021");
        $query = "SELECT id, nombre, correo, cedula, fecha_nacimiento, mensaje FROM usuarios ORDER BY id";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>
