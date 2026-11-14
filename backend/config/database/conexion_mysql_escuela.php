<?php
class ConexionBDEscuela {
    private $conexion;
    private $host = "localhost";
    private $puerto = "3306";
    private $usuario = "Mariana";
    private $password = "mariana123";
    private $bd = "BD_Escuela_Web_2026";

    public function __construct() {
        try {
            $this->conexion = new PDO(
                "mysql:host=$this->host;port=$this->puerto;dbname=$this->bd;charset=utf8mb4",
                $this->usuario,
                $this->password
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexion: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}
?>