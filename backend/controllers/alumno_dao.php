<?php

require_once __DIR__ . '/../config/database/conexion_mysql_escuela.php';

class AlumnoDAO{
    private $conexion;

    public function __construct() {
        $objetoConexion = new ConexionBDEscuela();
        $this->conexion = $objetoConexion->getConexion();
    }

    //=======ALTAS
    public function agregarAlumno($nc, $nombre, $primerAp, $segundoAp,
     $fechaNac, $semestre, $carrera) {

        $sql = "INSERT INTO alumnos
                (Num_Control, nombre, primer_Ap, segundo_Ap, Fecha_Nac, Semestre, Carrera)
                VALUES('$nc', '$nombre', '$primerAp',
                 '$segundoAp', '$fechaNac', $semestre, '$carrera')";

        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }
    
    //=======BAJAS
     public function eliminarAlumno($nc) {
        $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";

        $res = mysqli_query($this->conexion, $sql);

        return $res;
    }

    //=======CAMBIOS
     public function modificarAlumno($nc, $nombre, $primerAp, $segundoAp, $fechaNac,
      $semestre, $carrera) {

        $sql = "UPDATE alumnos SET 
            nombre = '$nombre', 
            primer_Ap = '$primerAp', 
            segundo_Ap = '$segundoAp', 
            Fecha_Nac = '$fechaNac', 
            Semestre = '$semestre', 
            Carrera = '$carrera' 
            WHERE Num_Control = '$nc'";

        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }

    //======= CONSULTAS
    public function mostrarAlumnos() {
        $sql = "SELECT Num_Control, nombre, primer_Ap, segundo_Ap FROM alumnos";
        return mysqli_query($this->conexion, $sql);
    }

    public function buscarAlumno($nc) {
        
        $sql = "SELECT * FROM alumnos WHERE Num_Control = '$nc'";
        $res = mysqli_query($this->conexion, $sql);
        
        if ($res && mysqli_num_rows($res) > 0) {
            return mysqli_fetch_assoc($res);
        }

        return null;
    }

}
?>