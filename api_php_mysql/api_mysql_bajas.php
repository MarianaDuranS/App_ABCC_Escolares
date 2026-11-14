<?php

    include_once('../backend/controllers/alumno_dao.php');

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

        $cadenaJSON = file_get_contents('php://input');

        if(!$cadenaJSON){
            echo"no hay cadena JSON";
        }else{
            $datos = json_decode($cadenaJSON, true);
            $nc = $datos['nc'];

            $respuesta = array();
            try {
                $dao = new AlumnoDAO();             
                $res = $dao->eliminarAlumno($nc); 
            } catch (PDOException $e) {
                $res = false;
            }

            if($res){
                $respuesta['baja'] = true;
            }else{
                $respuesta['baja'] = false;
            }

            echo json_encode($respuesta); 
        }
    }

?>