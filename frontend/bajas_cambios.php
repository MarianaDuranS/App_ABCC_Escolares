<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de registros</title>
</head>
<body>

    <?php require_once('menu_principal.php');?>

    <h3>Listado de alumnos</h3>

    <?php 

        include('../backend/controllers/alumno_dao.php');
        $alumnoDAO = new alumnoDAO();

        $datos = $alumnoDAO->mostrarAlumnos();


        if(mysqli_num_rows($datos)==0){
            echo "No se encontraron registros";
        }else{
            echo '<div class="container">';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
                echo '<th scope="col">No.</th>';
                echo '<th scope="col">Num. Control</th>';
                echo '<th scope="col">Nombre</th>';
                echo '<th scope="col">Primer Ap</th>';
                echo '<th scope="col">Segundo Ap.</th>';
                echo '<th scope="col">ACCIONES</th>';
            echo '</tr>';
            echo '</thead>';    
            echo '<tbody>';
        
            while($fila = mysqli_fetch_assoc($datos)){
            //printf($fila['NumControl'], $fila['nombre']);
            printf("<tr> <td>0 </td>
                        <td>".$fila['Num_Control']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['primer_Ap']."</td>
                        <td>".$fila['segundo_Ap']."</td>
                        
                        <td>
                          <a href=\"formulario_detalle.php?nc=%s\"
                          class='btn btn-primary btn-sm'>DETALLE</a>
                          <a href=\"formulario_editar.php?nc=%s\"
                          class='btn btn-warning btn-sm'>EDITAR</a>
                          <a href=\"../backend/scripts/procesar_baja.php?nc=%s\"
                          class='btn btn-danger btn-sm'>ELIMINAR</a> 
                          </td>
                    </tr>"
            ,$fila['Num_Control'], $fila['Num_Control'], $fila['Num_Control']);
        }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    ?>
</body>
</html>