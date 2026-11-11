<?php
class ConexionBDEscuela {
    private $conexion;
    private $host = "localhost";
    private $port = "3306";
    private $usuario = "Mariana";
    private $password = "mariana123";
    private $bd = "BD_Escuela_Web_2026";

    public function __construct() {
        // Cadena de conexión (DSN) para PDO
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->bd};charset=utf8mb4";
        
        // Opciones recomendadas para PDO
        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanza excepciones en caso de error
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devuelve los resultados como arreglos asociativos
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa sentencias preparadas reales del motor de BD
        ];

        try {
            $this->conexion = new PDO($dsn, $this->usuario, $this->password, $opciones);
        } catch (PDOException $e) {
            // En producción, es mejor registrar el error en un log en lugar de mostrarlo con die()
            die("Error en la conexion: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}
?>