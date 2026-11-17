<?php
include 'conexion.php';

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $local = $conexion->real_escape_string($_POST['local']);
    $visita = $conexion->real_escape_string($_POST['visita']);
    $cuota = $conexion->real_escape_string($_POST['cuota']);
    $cat = intval($_POST['categoria']);

    $sql = "INSERT INTO partidos (equipo_local, equipo_visita, cuota, categoria_id) VALUES ('$local', '$visita', '$cuota', $cat)";
    if ($conexion->query($sql)) {
        $mensaje = "<div class='alert alert-success alert-dismissible fade show'>¡Partido registrado con éxito!<button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
    }
}

include 'header.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
        <h2 class="h4 fw-bold text-dark m-0"><i class="fa-solid fa-trophy text-success me-2"></i>Gestión de Partidos y Cuotas</h2>
        <span class="badge bg-dark">Operador: Jhob Anderson</span>
    </div>

    <?php echo $mensaje; ?>

    <div class="row g-4">
        <!-- Formulario para agregar partido -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 rounded-3">
                <h5 class="fw-bold text-success mb-3"><i class="fa-solid fa-plus-circle me-1"></i> Programar Encuentro</h5>
                <form method="POST" action="partidos.php">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Equipo Local</label>
                        <input type="text" name="local" class="form-control" placeholder="Ej. Alianza Lima" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Equipo Visitante</label>
                        <input type="text" name="visita" class="form-control" placeholder="Ej. Universitario" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Cuota Ganador (Local)</label>
                        <input type="text" name="cuota" class="form-control" placeholder="Ej. 2.10" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Disciplina / Categoría</label>
                        <select name="categoria" class="form-select">
                            <?php
                            $cats = $conexion->query("SELECT * FROM categorias");
                            while($c = $cats->fetch_assoc()) {
                                echo "<option value='{$c['id']}'>{$c['nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100 fw-bold"><i class="fa-solid fa-save me-1"></i> Registrar Partido</button>
                </form>
            </div>
        </div>

        <!-- Tabla de Partidos -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
                <h5 class="fw-bold text-dark mb-3">Encuentros Disponibles en la Base de Datos</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Local</th>
                                <th>Visitante</th>
                                <th>Cuota</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $partidos = $conexion->query("SELECT * FROM partidos");
                            while($p = $partidos->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$p['id']}</td>
                                    <td class='fw-bold'>{$p['equipo_local']}</td>
                                    <td>{$p['equipo_visita']}</td>
                                    <td><span class='badge bg-success'>{$p['cuota']}</span></td>
                                    <td><span class='badge bg-danger'>En Vivo</span></td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>