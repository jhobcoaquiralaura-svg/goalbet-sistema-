<?php $pagina_actual = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoalBet - Sistema de Apuestas Deportivas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background-color: #1e2125; }
        .sidebar .nav-link { color: #adb5bd; padding: 10px 15px; margin-bottom: 4px; border-radius: 6px; font-size: 0.95rem; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: #198754; }
        .submenu .nav-link { padding: 6px 15px 6px 35px; font-size: 0.85rem; }
        .section-title { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1px; color: #6c757d; margin: 15px 0 5px 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- MENÚ LATERAL DETALLADO -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3 shadow">
                <div class="text-center py-2">
                    <h4 class="text-white fw-bold m-0"><i class="fa-solid fa-futbol text-success me-2"></i>GoalBet</h4>
                    <small class="text-muted">Plataforma de Apuestas</small>
                </div>
                <hr class="text-secondary">
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina_actual == 'index.php') ? 'active' : ''; ?>" href="index.php">
                            <i class="fa-solid fa-desktop me-2"></i> Escritorio
                        </a>
                    </li>

                    <div class="section-title">Deportes & Eventos</div>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina_actual == 'partidos.php') ? 'active' : ''; ?>" href="partidos.php">
                            <i class="fa-solid fa-trophy me-2"></i> Partidos y Cuotas
                        </a>
                        <div class="submenu">
                            <a class="nav-link" href="partidos.php"><i class="fa-solid fa-circle-dot text-danger me-2 small"></i>En Vivo (Live)</a>
                            <a class="nav-link" href="partidos.php"><i class="fa-solid fa-layer-group me-2 small"></i>Ligas y Categorías</a>
                        </div>
                    </li>

                    <div class="section-title">Operaciones</div>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina_actual == 'apuestas.php') ? 'active' : ''; ?>" href="apuestas.php">
                            <i class="fa-solid fa-ticket me-2"></i> Tickets / Apuestas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina_actual == 'promociones.php') ? 'active' : ''; ?>" href="promociones.php">
                            <i class="fa-solid fa-percent me-2"></i> Promociones & Bonos
                        </a>
                    </li>

                    <div class="section-title">Administración</div>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina_actual == 'clientes.php') ? 'active' : ''; ?>" href="clientes.php">
                            <i class="fa-solid fa-users me-2"></i> Clientes
                        </a>
                    </li>
                </ul>

                <div class="mt-5 pt-3 border-top border-secondary text-center">
                    <span class="badge bg-success mb-1">Administrador</span>
                    <p class="text-white small fw-bold m-0"><i class="fa-solid fa-user-check me-1"></i> Jhob Anderson</p>
                </div>
            </nav>