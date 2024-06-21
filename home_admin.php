<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="home_admin.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to The Admin Dashboards</h1>

        <div class="card">
            <a href="form_input.php">Input Barang Baru</a>
        </div>

        <?php
        $no = 1;
        $query = "SELECT * FROM barang ";
        $dt_query = $koneksi->query($query);
        ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
                    <th>Update</th>
                    <th>Delete</th>
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
                        <td><?php echo $dt_barang['jumlah_barang']; ?></td>
                        <td><a href="form_update.php?id=<?php echo $dt_barang['id_barang']; ?>">Update</a></td>
                        <td><a href='aksi_delete.php?id=<?php echo $dt_barang['id_barang']; ?>'>Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <a class="logout" href='logout.php'>Logout</a>
    </div>
</body>

</html>