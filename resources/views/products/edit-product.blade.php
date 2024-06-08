<?php
include '../koneksi.php';
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'product.php';
      </script>
    ";
}

$sql = "SELECT * FROM products WHERE id_product = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('location: ../login.php');
    exit();
}

include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | GoInvest</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="imge">
                    <img src="../assets/image/profile.png" alt="personal-photo">
                </div>
                <h2>Admin</h2>
            </li>
            <li>
                <a href="../admin.php">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="client.php">
                    <i class="fas fa-user-group"></i>
                    <p>Clients</p>
                </a>
            </li>
            <li>
                <a href="../product/product.php" class="active">
                    <i class="fas fa-table"></i>
                    <p>Products</p>
                </a>
            </li>
            <li>
                <a href="../transactions/transaksi.php">
                    <i class="fas fa-money-check"></i>
                    <p>Transaksi</p>
                </a>
            </li>
            <li class="log-out">
                <a href="../logout.php">
                    <i class="fas fa-sign-out"></i>
                    <p>Log out</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="title-info">
            <p>Edit Data Products</p>
            <i class="fas fa-chart-bar"></i>
        </div>

        <form action="proses-product.php" method="POST" class="form-tambah">
            <input type="hidden" name="id_product" value="<?= $data['id_product'] ?>">
            <label for="kode">Kode Produk</label>
            <input type="text" id="kode" name="kode_produk" placeholder="Kode Produk"
                value="<?= $data['kode_produk'] ?>" required>

            <label for=" produk">Produk</label>
            <input type="text" id="produk" name="nama_produk" placeholder="Nama Produk"
                value="<?= $data['nama_produk'] ?>" required>

            <label for=" harga">Harga</label>
            <input type="number" id="harga" name="harga" placeholder="Harga Produk" value="<?= $data['harga'] ?>"
                required>

            <label for=" penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="nama_penerbit" placeholder="Nama Penerbit"
                value="<?= $data['nama_penerbit'] ?>" required>

            <label for=" status" name="status">Status</label>
            <select id="status" name="status" required>
                <option value="" disabled <?php echo !$status ? 'selected' : ''; ?>>PILIH STATUS</option>
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
            </select>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi"
                required><?= $data['deskripsi'] ?></textarea>

            <button type="submit" name="edit" class="btn-tmbh">Update</button>
        </form>
    </div>
</body>

</html>