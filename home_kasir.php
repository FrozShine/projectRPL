<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasir</title>
    <link rel="stylesheet" href="home_kasir.css"> <!-- Pastikan ini mengarah ke file CSS yang benar -->
</head>

<body>
<div class="container">
    <h1>kasir</h1>
    <?php
    $no = 1;
    $query = "SELECT * FROM barang";
    $dt_query = $koneksi->query($query);
    ?>
    <form action="payment.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($dt_barang = $dt_query->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $dt_barang['nama_barang']; ?></td>
                        <td><?php echo $dt_barang['kategori']; ?></td>
                        <td><?php echo $dt_barang['harga']; ?></td>
                        <td><input type="text" name="jumlah[<?php echo $dt_barang['id_barang']; ?>]" required></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Beli</button>
        <a class="logout" href='logout.php'>Logout</a>
    </form>
</div>
</body>
</html>
