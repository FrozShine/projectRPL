<?php
include 'koneksi.php';

// Ambil data dari form
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$total_pembayaran = $_POST['total_pembayaran'];
$metode_pembayaran = $_POST['metode_pembayaran'];

// Proses pembayaran sesuai metode
if ($metode_pembayaran == 'QRIS') {
    $pesan = "Pembayaran melalui QRIS berhasil!";
} else {
    $pesan = "Pembayaran tunai berhasil!";
}

// Simpan transaksi ke database
try {
    $koneksi->begin_transaction(); // Mulai transaksi           

    $barang_dibeli = [];
    foreach ($id_barang as $key => $id) {
        $jumlah_item = $jumlah[$key];
        $total_item = $total_pembayaran[$key];

        // Ambil data barang dari database
        $query = "SELECT * FROM barang WHERE id_barang = '$id'";
        $dt_query = $koneksi->query($query);
        $dt_barang = $dt_query->fetch_array();

        $barang_dibeli[] = [
            'nama_barang' => $dt_barang['nama_barang'],
            'harga' => $dt_barang['harga'],
            'jumlah' => $jumlah_item,
            'total_pembayaran' => $total_item
        ];

        $nama_barang = $dt_barang['nama_barang'];

        // Insert transaksi
        $query = "INSERT INTO transaksi (id_barang, nama_barang, jumlah, total_pembayaran, metode_pembayaran) VALUES ('$id','$nama_barang' , '$jumlah_item', '$total_item', '$metode_pembayaran')";
        $koneksi->query($query);
    }

    $koneksi->commit(); // Komit transaksi jika semua berhasil
} catch (mysqli_sql_exception $e) {
    $koneksi->rollback(); // Rollback jika terjadi kesalahan
    echo "Error: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pembayaran</title>
    <link rel="stylesheet" href="home_kasir.css"> <!-- Pastikan ini mengarah ke file CSS yang benar -->
</head>
<body>
    <div class="container">
        <h2>Proses Pembayaran</h2>
        <div class="qr-code-container">
            <img src="QR/QR CODE.jpg" alt="QR Code" class="qr-code">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang_dibeli as $barang) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($barang['nama_barang']); ?></td>
                        <td><?php echo htmlspecialchars($barang['harga']); ?></td>
                        <td><?php echo htmlspecialchars($barang['jumlah']); ?></td>
                        <td><?php echo htmlspecialchars($barang['total_pembayaran']); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan="3">Total Keseluruhan</th>
                    <td><?php echo htmlspecialchars(array_sum($total_pembayaran)); ?></td>
                </tr>
            </tbody>
        </table>
        <h2>Metode Pembayaran: <?php echo htmlspecialchars($metode_pembayaran); ?></h2>
        <a href="home_kasir.php">Kembali ke Kasir</a>
    </div>
</body>

</html>
