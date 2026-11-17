<?php
include 'conexion.php';
include 'header.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
        <h2 class="h4 fw-bold text-dark"><i class="fa-solid fa-users text-danger me-2"></i>Gestión de Clientes / Apostadores</h2>
        <span class="badge bg-dark">Admin: Jhob Anderson</span>
    </div>

    <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Nombre Completo</th>
                        <th>Correo Electrónico</th>
                        <th>Saldo Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $clientes = $conexion->query("SELECT * FROM clientes");
                    while($c = $clientes->fetch_assoc()) {
                        echo "<tr>
                            <td>{$c['id']}</td>
                            <td class='fw-bold text-success'>{$c['nombre']}</td>
                            <td>{$c['correo']}</td>
                            <td><span class='badge bg-warning text-dark'>S/. {$c['saldo']}</span></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>