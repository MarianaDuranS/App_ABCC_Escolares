<?php
session_start();
$u = $_POST['caja_usuario'];
$c = $_POST['caja_password'];

$u_cifrado = sha1($u);
$c_cifrado = sha1($c);

include_once __DIR__ . '/../config/database/conexion_mysql_escuela.php';
$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if($conexion){
    $sql = "SELECT * FROM Usuarrios WHERE Usuario='$u_cifrado' AND Password = '$c_cifrado'";
    
    $res = mysqli_query($conexion, $sql);
    
    if(mysqli_num_rows($res) == 1){
        session_start();
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre_usuario'] = $u;
        header('Location: ../../frontend/menu_principal.php');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
} else {
    echo "Error de conexión a la base de datos";
}
?>