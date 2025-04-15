<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hasil Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Hasil Sementara Pemilihan Ketua</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Kandidat</th>
                    <th>Jumlah Suara</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $labels = [];
                $data = [];
                foreach ($results as $r):
                    $labels[] = $r->nama_kandidat;
                    $data[] = $r->total;
                ?>
                    <tr>
                        <td><?= $r->nama_kandidat ?></td>
                        <td><?= $r->total ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!-- Chart Area -->
        <div class="mt-5">
            <h4 class="text-center mb-3">Grafik Hasil Pemilihan</h4>
            <div style="width: 400px; height: 400px; margin: auto;">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="<?= site_url('user') ?>" class="btn btn-dark">Kembali</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <canvas id="myChart" width="300" height="300"></canvas>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        const data = {
            labels: <?= json_encode(array_column($results, 'nama_kandidat')) ?>,
            datasets: [{
                label: 'Jumlah Suara',
                data: <?= json_encode(array_column($results, 'total')) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(201, 203, 207, 0.7)'
                ],
                borderColor: '#fff',
                borderWidth: 1,
                hoverOffset: 4 // default hover effect (sedikit membesar), bisa diatur ke 0
            }]
        };

        const options = {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                tooltip: {
                    enabled: true
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            hover: {
                mode: null // ⛔️ Nonaktifkan efek hover membesar
            }
        };

        new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>

</body>

</html>