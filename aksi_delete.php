<<<<<<< HEAD
<?php

// Mengahpus data dari tabel transaksi
include 'koneksi.php';

// ambil data dari url
$id = $_GET['id'];

// query delete
$sql = "DELETE FROM transaksi WHERE id = '$id'";

// eksekusi query
if ($koneksi->query($sql) === TRUE) {
    echo "<script>document.location.href = 'tabel.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
=======
<?php

// Mengahpus data dari tabel transaksi
include 'koneksi.php';

// ambil data dari url
$id = $_GET['id'];

// query delete
$sql = "DELETE FROM transaksi WHERE id = '$id'";

// eksekusi query
if ($koneksi->query($sql) === TRUE) {
    echo "<script>document.location.href = 'tabel.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
>>>>>>> 34b8d994148da17d0da846869fa10589a16e277f
}