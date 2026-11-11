
<?php
    include_once('../backend/config/database/conexion_mysql_escuela.php');

    $con = new ConexionBDEscuela();
    $conexion = $con->getConexion();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $cadenaJSON = file_get_contents('php://input');

        if(!$cadenaJSON){
            echo "no hay cadena JSON";
        }else{

            $datos = json_decode($cadenaJSON, true);

            $nc = $datos['nc'];

            $sql = "SELECT * FROM alumnos WHERE Num_Control = '$nc'";

            $res = mysqli_query($conexion, $sql);

            $respuesta['alumnos'] = array();

            if($res){

                while($fila = mysqli_fetch_assoc($res)){

                    $alumno = array();
                    $alumno['nc'] = $fila['Num_Control'];
                    $alumno['n'] = $fila['nombre'];
                    $alumno['pa'] = $fila['primer_Ap'];
                    $alumno['sa'] = $fila['segundo_Ap'];
                    $alumno['fn'] = $fila['Fecha_Nac'];
                    $alumno['s'] = $fila['Semestre'];
                    $alumno['c'] = $fila['Carrera'];

                    array_push($respuesta['alumnos'], $alumno);
                }

                if(mysqli_num_rows($res) > 0){
                    $respuesta['consulta'] = true;
                }else{
                    $respuesta['consulta'] = "No hay registros";
                }

            }else{
                $respuesta['consulta'] = "Error en la consulta";
            }

            echo json_encode($respuesta);
        }
    }

?>
