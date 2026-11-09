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
           

            $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";

            $res = mysqli_query($conexion, $sql);

            $respuesta = array();
            if($res){
                $respuesta['baja'] = true;
            }else{
                $respuesta['baja'] = false;
            }

            echo json_encode($respuesta); //codificar la respuesta
        }
    }

?>