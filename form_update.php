<?php
session_start();
include "koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
$id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id_barang='$id'";
$dt_query = $koneksi->query($query);
$dt_barang = $dt_query->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
    <link rel="stylesheet" href="form_update.css"> <!-- Pastikan ini mengarah ke file CSS yang benar -->
</head>

<body>
    <form action="<?php $_PHP_SELF ?>" method="GET">
        <div class="nav-links">
            <a href='home_admin.php'>Home</a> | <a href='logout.php'>Logout</a>
        </div>
    </form>

    <form action="aksi_update.php?id=<?= $id ?>" method="post">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" required placeholder="<?php echo $dt_barang['nama_barang']; ?>"></td>
            </tr>
            <tr>
                <td>kategori</td>
                <td><input type="text" name="kategori" required placeholder="<?php echo $dt_barang['kategori']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" required placeholder="<?php echo $dt_barang['harga']; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td><input type="text" name="jumlah_barang" required placeholder="<?php echo $dt_barang['jumlah_barang']; ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Update">
    </form>
</body>

</html>