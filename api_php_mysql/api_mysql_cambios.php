<?php
    include_once('../backend/controllers/alumno_dao.php');

     if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH'){

        $cadenaJSON = file_get_contents('php://input');

        if(!$cadenaJSON){
            echo"no hay cadena JSON";
        }else{
            $datos = json_decode($cadenaJSON, true);

            $respuesta = array();
         
            try {
                $dao = new AlumnoDAO(); 

                if($_SERVER['REQUEST_METHOD'] == 'PUT'){
                    $alumno = Alumno::desdeJson($datos);
                    $res = $dao->modificarAlumno($alumno);
                }else{
                    $nc = $datos['nc'];
                    unset($datos['nc']);
                    $res = $dao->modificarParcial($nc, $datos);
                }
            } catch (PDOException $e) {
                $res = false;
            }

            if($res){
                $respuesta['cambios'] = true;
            }else{
                $respuesta['cambios'] = false;
            }

            echo json_encode($respuesta); 
        }
     }
?>