<?php
include 'conexion.php';

$alerta = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $bono = $conexion->real_escape_string($_POST['bono']);

    $sql = "INSERT INTO promociones (titulo, descripcion, bono) VALUES ('$titulo', '$descripcion', '$bono')";
    if ($conexion->query($sql)) {
        $alerta = "<div class='alert alert-success alert-dismissible fade show'>¡Promoción registrada en la base de datos!<button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
    }
}

include 'header.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
        <h2 class="h4 fw-bold text-dark m-0"><i class="fa-solid fa-percent text-success me-2"></i>Promociones y Bonos Activos</h2>
        <span class="badge bg-dark">Operador: Jhob Anderson</span>
    </div>

    <?php echo $alerta; ?>

    <div class="row g-4">
        <!-- Formulario para crear nueva promoción -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 rounded-3">
                <h5 class="fw-bold text-success mb-3"><i class="fa-solid fa-plus-circle me-1"></i> Crear Nueva Promo</h5>
                <form method="POST" action="promociones.php">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nombre de la Promoción</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ej. Bono Liga 1 Perú" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Condiciones / Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Válido para apuestas simples o combinadas..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Beneficio / Multiplicador</label>
                        <input type="text" name="bono" class="form-control" placeholder="Ej. Cuota x2.0 / +50%" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 fw-bold"><i class="fa-solid fa-save me-1"></i> Guardar Promoción</button>
                </form>
            </div>
        </div>

        <!-- Listado de promociones desde MySQL -->
        <div class="col-md-8">
            <div class="row g-3">
                <?php
                $promos = $conexion->query("SELECT * FROM promociones ORDER BY id DESC");
                while ($p = $promos->fetch_assoc()) {
                    echo "
                    <div class='col-md-6'>
                        <div class='card border-0 shadow-sm h-100 rounded-3 border-start border-success border-4'>
                            <div class='card-body'>
                                <div class='d-flex justify-content-between align-items-start mb-2'>
                                    <h5 class='card-title fw-bold text-dark m-0'>{$p['titulo']}</h5>
                                    <span class='badge bg-success'>{$p['bono']}</span>
                                </div>
                                <p class='card-text text-muted small'>{$p['descripcion']}</p>
                            </div>
                            <div class='card-footer bg-white border-0 d-flex justify-content-between align-items-center'>
                                <small class='text-success fw-bold'><i class='fa-solid fa-circle-check me-1'></i>Activa</small>
                                <button class='btn btn-outline-secondary btn-sm'>Editar</button>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</main>
</div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>