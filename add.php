<<<<<<< HEAD
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $tanggal_input = date('Y-m-d H:i:s');

    // Upload file
    $lampiran = '';
    if (isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["lampiran"]["name"]);
        if (move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file)) {
            $lampiran = $target_file;
        } else {
            echo "Error uploading file.";
        }
    }

    // Query insert
    $sql = "INSERT INTO transaksi (tanggal, kategori, nominal, keterangan, tanggal_input, lampiran) VALUES ('$tanggal', '$kategori', '$nominal', '$keterangan', '$tanggal_input', '$lampiran')";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = 'tabel.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <?php include('_head.php'); ?>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-7">
                <div class="box">
                    <h3>Tambah Transaksi</h3>
                    <a href="tabel.php" class="btn mb-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <form action="add.php" method="POST" enctype="multipart/form-data">
                        <!-- FORM INPUT TRANSAKSI - TANGGAL -->
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - KATEGORI -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pemasukan">Pemasukan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                                <option value="Pemasukan Gaji">Pemasukan Gaji</option>
                                <option value="Pengeluaran Rutin">Pengeluaran Rutin</option>
                            </select>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - NOMINAL -->
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" required>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - KETERANGAN -->
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - LAMPIRAN -->
                        <div class="mb-3">
                            <label for="lampiran" class="form-label">Lampiran</label>
                            <input type="file" class="form-control" id="lampiran" name="lampiran">
                        </div>
                        <!-- SUBMIT -->
                        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
</body>
</html>
=======
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $tanggal_input = date('Y-m-d H:i:s');

    // Upload file
    $lampiran = '';
    if (isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["lampiran"]["name"]);
        if (move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file)) {
            $lampiran = $target_file;
        } else {
            echo "Error uploading file.";
        }
    }

    // Query insert
    $sql = "INSERT INTO transaksi (tanggal, kategori, nominal, keterangan, tanggal_input, lampiran) VALUES ('$tanggal', '$kategori', '$nominal', '$keterangan', '$tanggal_input', '$lampiran')";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = 'tabel.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <?php include('_head.php'); ?>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-7">
                <div class="box">
                    <h3>Tambah Transaksi</h3>
                    <a href="tabel.php" class="btn mb-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <form action="add.php" method="POST" enctype="multipart/form-data">
                        <!-- FORM INPUT TRANSAKSI - TANGGAL -->
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - KATEGORI -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pemasukan">Pemasukan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                                <option value="Pemasukan Gaji">Pemasukan Gaji</option>
                                <option value="Pengeluaran Rutin">Pengeluaran Rutin</option>
                            </select>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - NOMINAL -->
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" required>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - KETERANGAN -->
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - LAMPIRAN -->
                        <div class="mb-3">
                            <label for="lampiran" class="form-label">Lampiran</label>
                            <input type="file" class="form-control" id="lampiran" name="lampiran">
                        </div>
                        <!-- SUBMIT -->
                        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
</body>
</html>
>>>>>>> 34b8d994148da17d0da846869fa10589a16e277f
