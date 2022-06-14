<?php
include('koneksi.php');
$produk = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($row = mysqli_fetch_array($produk)) {
    $nama_produk[] = $row['barang'];

    $query = mysqli_query($conn, "select sum(jumlah) as jumlah from tb_penjualan where id_barang='" . $row['id_barang'] . "'");
    $row = $query->fetch_array();
    $jumlah_produk[] = $row['jumlah'];
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
        <h3>Jumlah Produk</h3>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($nama_produk); ?>,
                datasets: [{
                    label: 'Total Kasus',
                    data: <?php echo json_encode($jumlah_produk); ?>,
                    backgroundColor: [
                        'rgb(19, 11, 64)',
                        'rgb(153, 21, 98)',
                        'rgb(153, 21, 21)',
                        'rgb(58, 133, 115)'
                    ],
                    borderColor: [
                        'rgb(19, 11, 64, 1)',
                        'rgb(153, 21, 98, 1)',
                        'rgb(153, 21, 21, 1)',
                        'rgb(58, 133, 115, 1)'
                    ],
                    label: 'Total Kasus'
                }],

            },

            options: {
                scales: {}
            }
        });
    </script>

</body>

</html>