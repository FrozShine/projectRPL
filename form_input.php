<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Barang</title>
    <link rel="stylesheet" href="form_input.css"> <!-- Pastikan ini mengarah ke file CSS yang benar -->
</head>

<body>
    <form action="aksi_input.php" method="POST">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" required></td>
            </tr>
                <td>kategori</td>
                <td><input type="text" name="kategori" required ></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" required></td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td><input type="text" name="jumlah_barang" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="save" value="Save">
                    <a class="button" href="home_admin.php">Back</a>
                </td>
            </tr>
        </table>
        <a class="logout" href="logout.php">Logout</a>
    </form>
</body>

</html>