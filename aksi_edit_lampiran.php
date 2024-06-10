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

// Ambil data dari form
if(isset($_POST['id_transaksi']) && isset($_FILES['lampiranBaru'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $lampiranBaru = $_FILES['lampiranBaru'];

    // Query untuk mendapatkan path lampiran lama
    $sql_select = "SELECT lampiran FROM transaksi WHERE id = '$id_transaksi'";
    $result = $koneksi->query($sql_select);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        $row = $result->fetch_assoc();
        $lampiranLama = $row['lampiran'];

        // Periksa apakah file berhasil diupload tanpa kesalahan
        if ($lampiranBaru['error'] === UPLOAD_ERR_OK) {
            $namaFileBaru = "uploads/" . basename($lampiranBaru['name']);
            if (move_uploaded_file($lampiranBaru['tmp_name'], $namaFileBaru)) {
                // Hapus lampiran lama dari server
                if (!empty($lampiranLama)) {
                    unlink($lampiranLama);
                }

                // Update path lampiran dalam database
                $sql_update = "UPDATE transaksi SET lampiran = '$namaFileBaru' WHERE id = '$id_transaksi'";
                if ($koneksi->query($sql_update) === TRUE) {
                    echo "<script>
                            alert('Lampiran berhasil diubah');
                            window.location.href = 'tabel.php';
                          </script>";
                } else {
                    echo "Error updating record: " . $koneksi->error;
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Error uploading file: " . $lampiranBaru['error'];
        }
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap.";
}
?>
