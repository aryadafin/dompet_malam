<?php
// Koneksi ke MySQL
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "dompet_malam";

$koneksi = new mysqli($server, $username, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <?php include('_head.php'); ?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 100%;
            margin-top: 20px;
        }
        .box {
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
        }
        .noPrint {
            display: none;
        }
        @media print {
            .noPrint {
                display: block;
            }
            .printHide {
                display: none;
            }
        }
        .dompet-title {
            color: #007bff; 
            border: 2px solid #000000; 
            border-radius: 12px; 
            padding: 5px 10px; 
            display: inline-block; 
        }
        .wallet-icon {
            margin-right: 10px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h2>Dompet Malam</h2> <h2 class="dompet-title"><i class="fas fa-wallet wallet-icon"></i>Arya Dafin</h2>
            <br/>
            <h3>Daftar Transaksi</h3>
            <div class="btn-group mb-3 printHide" role="group" aria-label="Basic example">
                <a href="add.php" class="btn btn-primary printHide "><i class="fas fa-plus"></i> Tambah Transaksi</a>
                <a onclick="window.print()" class="btn btn-secondary printHide"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>KATEGORI</th>
                            <th>NOMINAL</th>
                            <th>KETERANGAN</th> 
                            <th>TANGGAL INPUT</th>
                            <th class="printHide">LAMPIRAN</th>
                            <th class="printHide">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT *, 
                                       CASE 
                                           WHEN kategori = 'Pemasukan Gaji' THEN 'Pemasukan Gaji'
                                           WHEN kategori = 'Pengeluaran Rutin' THEN 'Pengeluaran Rutin'
                                           ELSE kategori 
                                       END AS kategori_lengkap 
                                FROM transaksi";
                        $data = $koneksi->query($sql);

                        // Cek jumlah data
                        if ($data->num_rows == 0) {
                            echo "<tr><td colspan='8' class='text-center'>Tidak ada data.</td></tr>";
                        } else {
                            // Menampilkan data
                            while ($row = $data->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$no++."</td>";
                                echo "<td>".$row['tanggal']."</td>";
                                echo "<td>".$row['kategori_lengkap']."</td>";
                                echo "<td>Rp. ".number_format($row['nominal'], 0, ',', '.')."</td>"; 
                                echo "<td>".$row['keterangan']."</td>"; 
                                echo "<td>".$row['tanggal_input']."</td>";
                                echo "<td class='printHide'>";
                                if (!empty($row['lampiran'])) {
                                    echo "<a href='".$row['lampiran']."' target='_blank' class='printHide'>Lihat Lampiran</a>";
                                } else {
                                    echo "Tidak ada lampiran";
                                }
                                echo "</td>";
                                echo "<td class='printHide'>";
                                echo "<a href='edit.php?id=".$row['id']."' class='btn btn-warning btn-sm mr-1 printHide'><i class='fas fa-pencil-alt '></i> Edit</a>";
                                echo "<a href='aksi_delete.php?id=".$row['id']."' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' class='btn btn-danger btn-sm printHide'><i class='fas fa-trash'></i> Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br/><br/><br/>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
