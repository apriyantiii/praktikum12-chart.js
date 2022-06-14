<?php
include('koneksi.php');
$case = mysqli_query($conn, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($case)) {
    $country[] = $row['country'];
    $jumlah_kasus[] = $row['total_cases'];
    $kasus_baru[] = $row['new_cases'];
    $jumlah_kematian[] = $row['total_deaths'];
    $kematian_baru[] = $row['new_deaths'];
    $total_kesembuhan[] = $row['total_recovered'];
    $sembuh_baru[] = $row['new_recovered'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Membuat Grafik Menggunakan Chart JS</title>
    <script type="text/javascript" src="Chart2.js"></script>

</head>

<body>
    <div style="width : 800px; height: 800px">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($country); ?>,
                datasets: [{
                    label: 'Grafik Total Covid',
                    data: <?php echo json_encode($jumlah_kasus); ?>,
                    backgroundColor: 'rgba(204, 178, 29, 0.2)',
                    borderColor: 'rgba(204, 178, 29, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>