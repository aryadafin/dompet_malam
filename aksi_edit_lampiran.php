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

// Periksa apakah data dari form tersedia dan valid
if (isset($_POST['id_transaksi']) && is_numeric($_POST['id_transaksi']) && $_POST['id_transaksi'] > 0 && isset($_FILES['lampiranBaru'])) {
    echo "Data dari form tersedia dan valid.<br>";

    // Ambil data dari form
    $id_transaksi = intval($_POST['id_transaksi']);
    $lampiranBaru = $_FILES['lampiranBaru'];
    echo "ID Transaksi: $id_transaksi<br>";
    echo "Lampiran Baru: " . print_r($lampiranBaru, true) . "<br>";

    // Query untuk mendapatkan path lampiran lama
    $sql_select = "SELECT lampiran FROM transaksi WHERE id = '$id_transaksi'";
    $result = $koneksi->query($sql_select);

    // Periksa apakah query berhasil dieksekusi
    if ($result && $result->num_rows > 0) {
        echo "Query select berhasil.<br>";
        $row = $result->fetch_assoc();
        $lampiranLama = $row['lampiran'];
        echo "Lampiran Lama: $lampiranLama<br>";

        // Periksa apakah file berhasil diunggah
        if ($lampiranBaru['error'] === UPLOAD_ERR_OK) {
            $namaFileBaru = "uploads/" . basename($lampiranBaru['name']);
            if (move_uploaded_file($lampiranBaru['tmp_name'], $namaFileBaru)) {
                echo "File berhasil diunggah ke $namaFileBaru.<br>";
                // Hapus lampiran lama dari server
                if (!empty($lampiranLama) && file_exists($lampiranLama)) {
                    unlink($lampiranLama);
                    echo "Lampiran lama berhasil dihapus.<br>";
                }

                // Update path lampiran dalam database
                $sql_update = "UPDATE transaksi SET lampiran = '$namaFileBaru' WHERE id = '$id_transaksi'";
                if ($koneksi->query($sql_update) === TRUE) {
                    echo "Lampiran berhasil diubah dalam database.<br>";
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
        echo "Error fetching old attachment: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap atau tidak valid.";
}
?>
