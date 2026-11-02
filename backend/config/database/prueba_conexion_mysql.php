<?php
    include("conexion_mysql_escuela.php");

    $conexion = new ConexionBDEscuela();
    $con = $conexion->getConexion();

    if($con){
        echo "Conexión exitosa a BD_Escuela_Web_2026";
    }
?>