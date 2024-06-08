<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_produk'];
    $produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $penerbit = $_POST['nama_penerbit'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];

    if (empty($kode) || empty($produk) || empty($harga) || empty($penerbit) || empty($status) || empty($deskripsi)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'entry-produk.php';
            </script>
        ";
    } else {
        $sql = "INSERT INTO products (kode_produk, nama_produk, harga, nama_penerbit, status, deskripsi) VALUES ('$kode', '$produk', '$harga', '$penerbit', '$status', '$deskripsi')";

        if (mysqli_query($koneksi, $sql)) {
            echo "
                <script>
                    alert('Data Produk Berhasil Ditambahkan');
                    window.location = 'product.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan');
                    window.location = 'entry-produk.php';
                </script>
            ";
        }
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id_product'];
    $kode = $_POST['kode_produk'];
    $produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $penerbit = $_POST['nama_penerbit'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE products SET 
            kode_produk = '$kode',
            nama_produk = '$produk',
            harga = '$harga',
            nama_penerbit = '$penerbit',
            status = '$status',
            deskripsi = '$deskripsi'
            WHERE id_product = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Diubah');
                window.location = 'product.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'edit-product.php';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id_product'];

    $sql = "DELETE FROM products WHERE id_product = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Dihapus');
                window.location = 'product.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Produk Gagal Dihapus');
                window.location = 'product.php';
            </script>
        ";
    }
} else {
    header('location: product.php');
}