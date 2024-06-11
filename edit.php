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

// Ambil data dari URL
$id = $_GET['id'];

// Query select
$sql = "SELECT * FROM transaksi WHERE id = '$id'";

// Eksekusi query
$data = $koneksi->query($sql);

// Ambil data
$row = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Transaksi</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <?php include('_head.php'); ?>
    <style>
        body {
            background-color: #f8f9fa;
            margin-top: 20px;
        }
        .box {
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-7">
                <div class="box">
                    <h3>Ubah Transaksi</h3>
                    <a href="tabel.php" class="btn mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="aksi_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <!-- FORM INPUT TRANSAKSI - TANGGAL -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?php echo $row['tanggal'];?>">
                        </div>
                        <!-- FORM INPUT TRANSAKSI - KATEGORI -->
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pemasukan" <?php if($row['kategori'] == "Pemasukan"){ echo "selected='selected'"; } ?>>Pemasukan</option>
                                <option value="Pengeluaran" <?php if($row['kategori'] == "Pengeluaran"){ echo "selected='selected'"; } ?>>Pengeluaran</option>
                                <option value="Pengeluaran Rutin" <?php if($row['kategori'] == "Pengeluaran Rutin"){ echo "selected='selected'"; } ?>>Pengeluaran Rutin</option>
                                <option value="Pemasukan Gaji" <?php if($row['kategori'] == "Pemasukan Gaji"){ echo "selected='selected'"; } ?>>Pemasukan Gaji</option>
                            </select>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - NOMINAL -->
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" required value="<?php echo $row['nominal'];?>">
                        </div>
                        <!-- FORM INPUT TRANSAKSI - KETERANGAN -->
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $row['keterangan'];?></textarea>
                        </div>
                        <!-- FORM INPUT TRANSAKSI - LAMPIRAN -->
<div class="form-group">
    <label for="lampiran">Lampiran</label>
    <input type="file" class="form-control" id="lampiran" name="lampiran">
    <?php if (!empty($row['lampiran'])): ?>
        <p>Lampiran saat ini: <a href="<?php echo $row['lampiran']; ?>" target="_blank">Lihat Lampiran</a></p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit Lampiran</button>
        <a href="aksi_hapus_lampiran.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lampiran ini?')">Hapus Lampiran</a>
    <?php else: ?>
        <p>Tidak ada lampiran.</p>
    <?php endif; ?>
</div>

                        <!-- SUBMIT -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Modal Edit Lampiran -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Lampiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="aksi_edit_lampiran.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_transaksi" value="<?php echo $row['id'];?>">
    <div class="form-group">
        <label for="lampiranBaru">Pilih Lampiran Baru</label>
        <input type="file" class="form-control-file" id="lampiranBaru" name="lampiranBaru">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>


            </div>
        </div>
    </div>
</div>

</body>
</html>