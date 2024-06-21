<?php
include 'koneksi.php';

// Ambil data dari POST
$jumlah_beli = $_POST['jumlah'] ?? [];

// Inisialisasi variabel untuk total keseluruhan
$total_keseluruhan = 0;
$barang_dibeli = [];

foreach ($jumlah_beli as $id_barang => $jumlah) {
    // Ambil data barang dari database berdasarkan ID barang
    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $dt_query = $koneksi->query($query);

    if ($dt_query && $dt_query->num_rows > 0) {
        $dt_barang = $dt_query->fetch_array();
        
        // Hitung total pembayaran untuk setiap barang
        $total_pembayaran = $dt_barang['harga'] * $jumlah;
        $total_keseluruhan += $total_pembayaran;
        
        // Simpan data barang dan total pembayaran ke dalam array
        $barang_dibeli[] = [
            'id_barang' => $id_barang,
            'nama_barang' => $dt_barang['nama_barang'],
            'harga' => $dt_barang['harga'],
            'jumlah' => $jumlah,
            'total_pembayaran' => $total_pembayaran
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="home_kasir.css"> <!-- Pastikan ini mengarah ke file CSS yang benar -->
</head>

<body>
    <div class="container">
        <h1>Payment</h1>
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
                    <td><?php echo htmlspecialchars($total_keseluruhan); ?></td>
                </tr>
            </tbody>
        </table>
        <h2>Pilih Metode Pembayaran</h2>
        <form action="proses_pembayaran.php" method="POST">
            <?php foreach ($barang_dibeli as $barang) { ?>
                <input type="hidden" name="id_barang[]" value="<?php echo htmlspecialchars($barang['id_barang']); ?>">
                <input type="hidden" name="jumlah[]" value="<?php echo htmlspecialchars($barang['jumlah']); ?>">
                <input type="hidden" name="total_pembayaran[]" value="<?php echo htmlspecialchars($barang['total_pembayaran']); ?>">
                
            <?php } ?>
            <input type="hidden" name="total_keseluruhan" value="<?php echo htmlspecialchars($total_keseluruhan); ?>">
            <label>
                <input type="radio" name="metode_pembayaran" value="QRIS" required> QRIS
            </label>
            <label>
                <input type="radio" name="metode_pembayaran" value="Tunai" required> Tunai
            </label>
            
            <br>

            <button type="submit">Bayar</button>
        </form>
    </div>
</body>

</html>
