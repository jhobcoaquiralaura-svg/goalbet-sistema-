<?php
include 'conexion.php';
include 'header.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
        <h2 class="h4 fw-bold text-dark m-0"><i class="fa-solid fa-ticket text-warning me-2"></i>Historial de Tickets de Apuestas</h2>
        <span class="badge bg-dark">Operador: Jhob Anderson</span>
    </div>

    <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th># Ticket</th>
                        <th>Apostador / Cliente</th>
                        <th>Selección de Partido</th>
                        <th>Monto Apostado</th>
                        <th>Ganancia Potencial</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#TK-9081</strong></td>
                        <td>Carlos "El Tunche" Gómez</td>
                        <td>Real Madrid vs Barcelona (Local)</td>
                        <td>S/. 50.00</td>
                        <td class="text-success fw-bold">S/. 105.00</td>
                        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                    </tr>
                    <tr>
                        <td><strong>#TK-9082</strong></td>
                        <td>Gianella Mamani Quispe</td>
                        <td>Lakers vs Golden State (Visita)</td>
                        <td>S/. 100.00</td>
                        <td class="text-success fw-bold">S/. 185.00</td>
                        <td><span class="badge bg-success">Ganada</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>