<?php
include 'conexion.php';

$total_partidos = $conexion->query("SELECT COUNT(*) AS total FROM partidos")->fetch_assoc()['total'];
$total_categorias = $conexion->query("SELECT COUNT(*) AS total FROM categorias")->fetch_assoc()['total'];
$total_clientes = $conexion->query("SELECT COUNT(*) AS total FROM clientes")->fetch_assoc()['total'];
$total_promos = $conexion->query("SELECT COUNT(*) AS total FROM promociones")->fetch_assoc()['total'];

include 'header.php';
?>

            <!-- CONTENIDO PRINCIPAL -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                
                <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
                    <span class="text-muted fw-bold">Panel Administrativo / GoalBet</span>
                    <span class="badge bg-success">Base de Datos Conectada</span>
                </div>

                <!-- BANNER -->
                <div class="card text-white border-0 shadow-sm p-4 mb-4" style="background: linear-gradient(135deg, #198754 0%, #212529 100%); border-radius: 10px;">
                    <div class="card-body">
                        <h2 class="h4 fw-bold">BIENVENIDO A GOALBET</h2>
                        <p class="text-light mb-3">Sistema operativo independiente administrado por <strong>Jhob Anderson Coaquira Laura</strong>.</p>
                        <a href="promociones.php" class="btn btn-light btn-sm fw-bold text-success"><i class="fa-solid fa-pen-to-square me-1"></i> Gestionar Promociones</a>
                    </div>
                </div>

                <h3 class="h5 text-secondary mb-3">Resumen de Métricas en Vivo</h3>

                <!-- TARJETAS CON DATOS REALES DE MYSQL -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light text-success p-3 rounded me-3 border">
                                    <i class="fa-solid fa-futbol fa-lg"></i>
                                </div>
                                <div>
                                    <span class="text-muted small">Partidos / Productos</span>
                                    <h4 class="fw-bold m-0"><?php echo $total_partidos; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light text-primary p-3 rounded me-3 border">
                                    <i class="fa-solid fa-tags fa-lg"></i>
                                </div>
                                <div>
                                    <span class="text-muted small">Categorías</span>
                                    <h4 class="fw-bold m-0"><?php echo $total_categorias; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light text-warning p-3 rounded me-3 border">
                                    <i class="fa-solid fa-percent fa-lg"></i>
                                </div>
                                <div>
                                    <span class="text-muted small">Promociones</span>
                                    <h4 class="fw-bold m-0"><?php echo $total_promos; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light text-danger p-3 rounded me-3 border">
                                    <i class="fa-solid fa-users fa-lg"></i>
                                </div>
                                <div>
                                    <span class="text-muted small">Clientes Registrados</span>
                                    <h4 class="fw-bold m-0"><?php echo $total_clientes; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECCIÓN DE ACCESOS RÁPIDOS -->
                <h3 class="h5 text-secondary mt-4 mb-3"><i class="fa-solid fa-bolt text-warning me-2"></i>Accesos rápidos</h3>
                <div class="row g-2 mb-4">
                    <div class="col-auto">
                        <a href="partidos.php" class="btn btn-dark btn-sm px-3 py-2 shadow-sm"><i class="fa-solid fa-plus text-success me-1"></i> Nuevo Partido</a>
                    </div>
                    <div class="col-auto">
                        <a href="apuestas.php" class="btn btn-success btn-sm px-3 py-2 shadow-sm"><i class="fa-solid fa-ticket me-1"></i> Emitir Ticket de Apuesta</a>
                    </div>
                    <div class="col-auto">
                        <a href="promociones.php" class="btn btn-outline-dark btn-sm px-3 py-2 bg-white shadow-sm"><i class="fa-solid fa-percent text-primary me-1"></i> Lanzar Bono</a>
                    </div>
                    <div class="col-auto">
                        <a href="clientes.php" class="btn btn-outline-dark btn-sm px-3 py-2 bg-white shadow-sm"><i class="fa-solid fa-user-plus text-danger me-1"></i> Ver Apostadores</a>
                    </div>
                </div>

                <!-- TABLA DE PARTIDOS RECIENTES -->
                <div class="card border-0 shadow-sm mt-4 p-4 bg-white rounded-3">
                    <h4 class="h5 fw-bold text-dark mb-3"><i class="fa-solid fa-shield-halved text-success me-2"></i>Partidos y Cuotas Activas</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Equipo Local</th>
                                    <th>Equipo Visitante</th>
                                    <th>Cuota</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resultado = $conexion->query("SELECT * FROM partidos");
                                while($row = $resultado->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td class='fw-bold'>{$row['equipo_local']}</td>
                                        <td>{$row['equipo_visita']}</td>
                                        <td><span class='badge bg-success'>{$row['cuota']}</span></td>
                                        <td><span class='badge bg-danger'>En Vivo</span></td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>