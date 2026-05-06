@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Статистика посещений</h1>

        <div class="row">
            <!-- График по часам -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Уникальные посещения по часам (последние 24 часа)</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="hourlyChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- График по городам -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Распределение по городам</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="cityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Данные для графика по часам
        const hourData = @json($hourData);
        const hourLabels = hourData.map(item => item.hour);
        const hourValues = hourData.map(item => item.unique_visits);

        // График по часам
        const hourlyCtx = document.getElementById('hourlyChart').getContext('2d');
        new Chart(hourlyCtx, {
            type: 'bar',
            data: {
                labels: hourLabels,
                datasets: [{
                    label: 'Уникальные посещения',
                    data: hourValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Количество посещений'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Время (часы)'
                        }
                    }
                }
            }
        });

        // Данные для графика по городам
        const cityData = @json($cityData);
        const cityLabels = cityData.map(item => item.city);
        const cityValues = cityData.map(item => item.count);

        // График по городам
        const cityCtx = document.getElementById('cityChart').getContext('2d');
        new Chart(cityCtx, {
            type: 'doughnut',
            data: {
                labels: cityLabels,
                datasets: [{
                    label: 'Количество посещений',
                    data: cityValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
@endsection