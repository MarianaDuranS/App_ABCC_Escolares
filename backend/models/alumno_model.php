<?php
class Alumno {
    private $nc;
    private $nombre;
    private $primerAp;
    private $segundoAp;
    private $fechaNac;
    private $semestre;
    private $carrera;

    public function __construct($nc = null, $nombre = null, $primerAp = null,
                                $segundoAp = null, $fechaNac = null,
                                $semestre = null, $carrera = null) {
        $this->nc = $nc;
        $this->nombre = $nombre;
        $this->primerAp = $primerAp;
        $this->segundoAp = $segundoAp;
        $this->fechaNac = $fechaNac;
        $this->semestre = $semestre;
        $this->carrera = $carrera;
    }

    public function getNc()        { return $this->nc; }
    public function getNombre()    { return $this->nombre; }
    public function getPrimerAp()  { return $this->primerAp; }
    public function getSegundoAp() { return $this->segundoAp; }
    public function getFechaNac()  { return $this->fechaNac; }
    public function getSemestre()  { return $this->semestre; }
    public function getCarrera()   { return $this->carrera; }

    public function setNc($v)        { $this->nc = $v; }
    public function setNombre($v)    { $this->nombre = $v; }
    public function setPrimerAp($v)  { $this->primerAp = $v; }
    public function setSegundoAp($v) { $this->segundoAp = $v; }
    public function setFechaNac($v)  { $this->fechaNac = $v; }
    public function setSemestre($v)  { $this->semestre = $v; }
    public function setCarrera($v)   { $this->carrera = $v; }

    public static function desdeFila($fila) {
        return new Alumno($fila['Num_Control'], $fila['nombre'], $fila['primer_Ap'],
            $fila['segundo_Ap'], $fila['Fecha_Nac'], $fila['Semestre'], $fila['Carrera']);
    }

    public static function desdeJson($d) {
        return new Alumno($d['nc'] ?? null, $d['n'] ?? null, $d['pa'] ?? null,
            $d['sa'] ?? null, $d['fn'] ?? null, $d['s'] ?? null, $d['c'] ?? null);
    }

    public function toArray() {
        return [
            'nc' => $this->nc, 'n' => $this->nombre, 'pa' => $this->primerAp,
            'sa' => $this->segundoAp, 'fn' => $this->fechaNac,
            's' => $this->semestre, 'c' => $this->carrera
        ];
    }
}
?>