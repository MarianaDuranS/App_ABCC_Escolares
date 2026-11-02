<?php
    require_once __DIR__ . '/../backend/controllers/alumno_dao.php';
    $alumnoDAO = new AlumnoDAO();

    // Obtenemos el número de control que viene por la URL (GET)
    $nc = isset($_GET['nc']) ? $_GET['nc'] : '';
    $alumno = $alumnoDAO->buscarAlumno($nc);

    if (!$alumno) {
        echo "Alumno no encontrado.";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Alumno</title>
</head>
<body>

  <?php require_once('menu_principal.php')?>

  <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
          <div class="col-md-9">
              <div class="card shadow border-0 rounded-4">
                  <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                      <h4 class="mb-0 fw-bold">Detalle del Alumno</h4>
                  </div>

                  <div class="card-body p-4">

                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label for="caja_num_control" class="form-label fw-bold text-secondary">Número de Control:</label>
                              <input type="text" class="form-control rounded-3 shadow-sm bg-light" id="caja_num_control"
                                     value="<?php echo htmlspecialchars($alumno['Num_Control']); ?>" readonly>
                          </div>
                          <div class="col-md-6">
                              <label for="caja_nombre" class="form-label fw-bold text-secondary">Nombre:</label>
                              <input type="text" class="form-control rounded-3 shadow-sm bg-light" id="caja_nombre"
                                     value="<?php echo htmlspecialchars($alumno['nombre']); ?>" readonly>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label for="caja_primer_ap" class="form-label fw-bold text-secondary">Primer Apellido:</label>
                              <input type="text" class="form-control rounded-3 shadow-sm bg-light" id="caja_primer_ap"
                                     value="<?php echo htmlspecialchars($alumno['primer_Ap']); ?>" readonly>
                          </div>
                          <div class="col-md-6">
                              <label for="caja_segundo_ap" class="form-label fw-bold text-secondary">Segundo Apellido:</label>
                              <input type="text" class="form-control rounded-3 shadow-sm bg-light" id="caja_segundo_ap"
                                     value="<?php echo htmlspecialchars($alumno['segundo_Ap']); ?>" readonly>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <div class="col-md-4">
                              <label for="caja_fecha_nac" class="form-label fw-bold text-secondary">Fecha de Nacimiento:</label>
                              <input type="date" class="form-control rounded-3 shadow-sm bg-light" id="caja_fecha_nac"
                                     value="<?php echo htmlspecialchars($alumno['Fecha_Nac']); ?>" readonly>
                          </div>
                          <div class="col-md-4">
                              <label for="caja_semestre" class="form-label fw-bold text-secondary">Semestre:</label>
                              <input type="number" class="form-control rounded-3 shadow-sm bg-light" id="caja_semestre"
                                     value="<?php echo htmlspecialchars($alumno['Semestre']); ?>" readonly>
                          </div>
                          <div class="col-md-4">
                              <label for="caja_carrera" class="form-label fw-bold text-secondary">Carrera:</label>
                              <input type="text" class="form-control rounded-3 shadow-sm bg-light" id="caja_carrera"
                                     value="<?php echo htmlspecialchars($alumno['Carrera']); ?>" readonly>
                          </div>
                      </div>

                      <div class="d-flex justify-content-end gap-2 mt-4">
                          <a href="bajas_cambios.php" class="btn btn-primary px-4 rounded-pill shadow-sm">Regresar</a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>

</body>
</html>