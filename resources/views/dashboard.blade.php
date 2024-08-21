@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-2xl font-semibold mb-6">Dashboard</h2>

            <!-- Contenedor de la Gráfica Combinada -->
            <div class="bg-gray-700 p-6 rounded-lg" style="height: 500px;">
                <h3 class="text-xl font-semibold mb-4">Progreso en Proyectos</h3>
                <canvas id="combinedChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Datos dinámicos de PHP a JavaScript
        const existenciaProductos = <?php echo json_encode($existenciaProductos); ?>;
        const ventasMensuales = <?php echo json_encode($ventasMensuales); ?>;
        const productosMasVendidos = <?php echo json_encode($productosMasVendidos); ?>;
        const clientesRecurrentes = <?php echo json_encode($clientesRecurrentes); ?>;

        // Crear gráfica combinada con líneas horizontales
        var ctx = document.getElementById('combinedChart').getContext('2d');
        var combinedChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(existenciaProductos),
                datasets: [{
                        label: 'Existencia de Productos',
                        data: Object.values(existenciaProductos),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Ventas Mensuales',
                        data: Object.values(ventasMensuales),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Productos Más Vendidos',
                        data: Object.values(productosMasVendidos),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Clientes Recurrentes',
                        data: Object.values(clientesRecurrentes),
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection