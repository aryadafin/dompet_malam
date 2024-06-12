# Dompet Malam Arya Dafin

## Deskripsi
**Dompet Malam** adalah aplikasi CRUD (Create, Read, Update, Delete) sederhana yang dibuat sebagai bagian dari tugas dari Institut Teknologi Tangerang Selatan (ITTS). Aplikasi ini dirancang untuk membantu pengguna dalam mengelola transaksi keuangan mereka, termasuk pemasukan, pengeluaran, dan lampiran bukti transaksi.

## Fitur
- Menambah, mengubah, dan menghapus transaksi keuangan.
- Mengelola kategori transaksi seperti Pemasukan, Pengeluaran, Pemasukan Gaji, dan Pengeluaran Rutin.
- Menyimpan lampiran bukti transaksi dalam format file.
- Tampilan daftar transaksi yang rapi dan mudah dibaca.
- Cetak daftar transaksi langsung dari aplikasi.

## Instalasi
1. Clone repositori ini ke lokal Anda:
    ```sh
    git clone https://github.com/aryadafin/dompet_malam.git
    ```
2. Navigasikan ke direktori proyek:
    ```sh
    cd dompet_malam
    ```
3. Pastikan Anda telah menginstal server web (seperti Apache) dan database MySQL.
4. Impor database `dompet_malam` dari file `dompet_malam.sql` yang terdapat dalam repositori ini ke MySQL Anda.
5. Sesuaikan konfigurasi database di file `config.php`:
    ```php
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "dompet_malam";
    ```
6. Jalankan server web Anda dan buka aplikasi di browser dengan mengakses:
    ```sh
    http://localhost/dompet_malam
    ```

## Penggunaan
- **Menambah Transaksi**: Klik tombol "Tambah Transaksi", isi formulir yang muncul, dan simpan.
- **Mengubah Transaksi**: Klik ikon pensil pada transaksi yang ingin diubah, lakukan perubahan, dan simpan.
- **Menghapus Transaksi**: Klik ikon tempat sampah pada transaksi yang ingin dihapus, dan konfirmasi penghapusan.
- **Cetak Daftar Transaksi**: Klik tombol cetak untuk mencetak daftar transaksi yang ada.

## Terima Kasih
Saya ingin mengucapkan terima kasih kepada Pak Muhammad Yusuf, dosen saya di ITTS, atas bimbingan dan dukungan beliau dalam menyelesaikan proyek ini. Bimbingan dan ilmu yang telah beliau berikan sangat berarti dalam pengembangan aplikasi ini.

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).

