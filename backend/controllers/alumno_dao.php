<?php

require_once __DIR__ . '/../config/database/conexion_mysql_escuela.php';
require_once __DIR__ . '/../models/alumno_model.php';

class AlumnoDAO{
    private $conexion;

    public function __construct() {
        $objetoConexion = new ConexionBDEscuela();
        $this->conexion = $objetoConexion->getConexion();
    }

    //=======ALTAS
    public function agregarAlumno(Alumno $a) {

        $sql = "INSERT INTO alumnos
                (Num_Control, nombre, primer_Ap, segundo_Ap, Fecha_Nac, Semestre, Carrera)
                VALUES(:nc, :nombre, :primerAp, :segundoAp, 
                :fechaNac, :semestre, :carrera)";

        $stmt = $this->conexion->prepare($sql);
        $res = $stmt->execute([
            ':nc' => $a->getNc(),               
            ':nombre' => $a->getNombre(),
            ':primerAp' => $a->getPrimerAp(),
            ':segundoAp' => $a->getSegundoAp(),
            ':fechaNac' => $a->getFechaNac(),
            ':semestre' => $a->getSemestre(),
            ':carrera' => $a->getCarrera()
        ]);
        return $res;
    }
    
    //=======BAJAS
     public function eliminarAlumno($nc) {
        $sql = "DELETE FROM alumnos WHERE Num_Control = :nc";

        $stmt = $this->conexion->prepare($sql);
        $res = $stmt->execute([':nc' => $nc]);

        return $res;
    }

    //=======CAMBIOS
     public function modificarAlumno(Alumno $a) {

        $sql = "UPDATE alumnos SET 
            nombre = :nombre, 
            primer_Ap = :primerAp, 
            segundo_Ap = :segundoAp, 
            Fecha_Nac = :fechaNac, 
            Semestre = :semestre, 
            Carrera = :carrera 
            WHERE Num_Control = :nc";

        $stmt = $this->conexion->prepare($sql);
        $res = $stmt->execute([
            ':nombre' => $a->getNombre(),
            ':primerAp' => $a->getPrimerAp(),
            ':segundoAp' => $a->getSegundoAp(),
            ':fechaNac' => $a->getFechaNac(),
            ':semestre' => $a->getSemestre(),
            ':carrera' => $a->getCarrera(),
            ':nc' => $a->getNc()
        ]);
        return $res;
    }

     public function modificarParcial($nc, $campos) {
        $mapa = ['n' => 'nombre', 'pa' => 'primer_Ap', 'sa' => 'segundo_Ap',
                 'fn' => 'Fecha_Nac', 's' => 'Semestre', 'c' => 'Carrera'];

        $sets = [];
        $params = [':nc' => $nc];

        foreach ($mapa as $clave => $columna) {
            if (array_key_exists($clave, $campos)) {
                $sets[] = "$columna = :$clave";
                $params[":$clave"] = $campos[$clave];
            }
        }

        if (empty($sets)) {
            return false; 
        }

        $sql = "UPDATE alumnos SET " . implode(', ', $sets) . " WHERE Num_Control = :nc";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute($params);
    }


    //======= CONSULTAS
    public function mostrarAlumnos() {
        $sql = "SELECT * FROM alumnos";

        $filas = $this->conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $alumnos = [];
        foreach ($filas as $fila) {
            $alumnos[] = Alumno::desdeFila($fila);
        }
        return $alumnos;
    }

    public function buscarAlumno($nc) {
        
        $sql = "SELECT * FROM alumnos WHERE Num_Control = :nc";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':nc' => $nc]);

        
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return Alumno::desdeFila($fila);
        }

        return null;
    }

}
?>