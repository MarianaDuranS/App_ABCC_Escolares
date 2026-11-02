<?php
    session_start();
    include('../controllers/alumno_dao.php');
    $alumnoDAO = new AlumnoDAO();

    $nc        = $_POST['caja_num_control'];
    $nombre    = $_POST['caja_nombre'];
    $primerAp  = $_POST['caja_primer_ap'];
    $segundoAp = $_POST['caja_segundo_ap'];
    $fechaNac  = $_POST['caja_fecha_nac'];
    $semestre  = $_POST['caja_semestre'];
    $carrera   = $_POST['caja_carrera'];

    $res = $alumnoDAO->modificarAlumno($nc, $nombre, $primerAp, $segundoAp, $fechaNac, $semestre, $carrera);

    if ($res) {
        header('location: ../../frontend/bajas_cambios.php');
        exit();
    } else {
        echo "Error al modificar el registro.";
    }
?>