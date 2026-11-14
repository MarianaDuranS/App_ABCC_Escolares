<?php
   include_once('../backend/controllers/alumno_dao.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $respuesta['alumnos'] = array();

        try {
            $dao = new AlumnoDAO(); 

            if(isset($_GET['nc'])){
                $a = $dao->buscarAlumno($_GET['nc']);
                if($a){
                    array_push($respuesta['alumnos'], $a->toArray());
                }
            }else{
                foreach($dao->mostrarAlumnos() as $a){
                    array_push($respuesta['alumnos'], $a->toArray()); 
                }
            }

            $respuesta['consulta'] = true ;

        } catch (PDOException $e) {
            $respuesta['consulta'] = "No hay registros";
        }

        echo json_encode($respuesta);
    }

?>