<?php
include_once('../backend/config/database/conexion_mysql_escuela.php');

    $con = new ConexionBDEscuela();
    $conexion = $con->getConexion();

     if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $cadenaJSON = file_get_contents('php://input');

        if(!$cadenaJSON){
            echo"no hay cadena JSON";
        }else{
            $datos = json_decode($cadenaJSON, true);
            $nc = $datos['nc'];
            $n = $datos['n']; //nombre
            $pa = $datos['pa']; //primer apellido
            $sa = $datos['sa']; //Segundo apellido
            $fn = $datos['fn']; //fecha nacimiento
            $s = $datos['s']; //semestre
            $c = $datos['c']; //carrera

            $sql = "UPDATE alumnos SET 
            nombre = '$n', 
            primer_Ap = '$pa', 
            segundo_Ap = '$sa', 
            Fecha_Nac = '$fn', 
            Semestre = '$s', 
            Carrera = '$c' 
            WHERE Num_Control = '$nc'";

            $res = mysqli_query($conexion, $sql);

            $respuesta = array();
            if($res){
                $respuesta['cambios'] = true;
            }else{
                $respuesta['cambios'] = false;
            }

            echo json_encode($respuesta); //codificar la respuesta
        }
     }
?>