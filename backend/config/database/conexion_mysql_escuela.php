<?php
class ConexionBDEscuela{
    private $conexion;
    private $host = "localhost:3306";
    private $usuario = "Mariana";
    private $password = "mariana123";
    private $bd = "BD_Escuela_Web_2026";

    public function __construct(){
        $this->conexion = mysqli_connect($this->host, $this->usuario, $this->password, $this->bd);
        if (!$this->conexion){
            die("Error en la conexion: " . mysqli_connect_error());
        }else{
            echo "SI SE PUDO";
        }
        
    }

    public function getConexion(){
        return $this->conexion;
    }
}
?>