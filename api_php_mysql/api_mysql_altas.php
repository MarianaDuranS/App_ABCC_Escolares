<?php

    include_once('../backend/controllers/alumno_dao.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $cadenaJSON = file_get_contents('php://input');

        if(!$cadenaJSON){
            echo"no hay cadena JSON";
        }else{
            $datos = json_decode($cadenaJSON, true);

            $alumno = Alumno::desdeJson($datos);

            $respuesta = array();

             try {
                $dao = new AlumnoDAO();               
                $res = $dao->agregarAlumno($alumno);  
            } catch (PDOException $e) {
                $res = false;
            }

            if($res){
                $respuesta['alta'] = true;
            }else{
                $respuesta['alta'] = false;
            }

            echo json_encode($respuesta);
        }
    }

?>