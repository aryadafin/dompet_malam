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
    <?php include('_head.php'); ?>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-7">
                <div class="box">
                    <h3>Daftar Transaksi</h3>
                    <div class="btn-group noPrint" role="group" aria-label="Basic example">
                        <a href="add.php" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Transaksi</a>
                        <a onclick="window.print()" class="btn btn-secondary mb-2"><i class="fa-solid fa-print"></i> Cetak</a>
                    </div>
                    <table class="table table-striped-columns mt-1">
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>KATEGORI</th>
                            <th>NOMINAL</th>
                            <th>TANGGAL INPUT</th>
                            <th>LAMPIRAN</th>
                            <th class="noPrint">AKSI</th>
                        </tr>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM transaksi";
                        $data = $koneksi->query($sql);

                        // Cek jumlah data
                        if ($data->num_rows == 0) {
                            echo "<tr><td colspan='7' align='center'>Tidak ada data.</td></tr>";
                        } else {
                            // Menampilkan data
                            foreach ($data as $row) {
                                echo "<tr>";
                                echo "<td>".$no++."</td>";
                                echo "<td>".$row['tanggal']."</td>";
                                echo "<td>".$row['kategori']."</td>";
                                echo "<td>".$row['nominal']."</td>";
                                echo "<td>".$row['tanggal_input']."</td>";
                                echo "<td>";
                                if (!empty($row['lampiran'])) {
                                    echo "<a href='".$row['lampiran']."' target='_blank'>Lihat Lampiran</a>";
                                } else {
                                    echo "Tidak ada lampiran";
                                }
                                echo "</td>";
                                $confirm = "onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'";
                                echo "<td class='noPrint'>
                                    <a href='edit.php?id=".$row['id']."' class='btn btn-warning'><i class='fa-regular fa-pen-to-square'></i></a>
                                    <a href='aksi_delete.php?id=".$row['id']."' ".$confirm." class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
</body>
</html>
