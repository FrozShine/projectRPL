<?php
include "koneksi.php";
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$jumlah_barang = $_POST['jumlah_barang'];
$kategori = $_POST['kategori'];
$sql = "INSERT INTO barang (nama_barang,kategori, harga, jumlah_barang) VALUES ('" . $nama_barang . "','" . $kategori . "', '" . $harga . "', '" . $jumlah_barang . "')";

$query = $koneksi->query($sql);
if ($query === true) {
    header('location: home_admin.php');
} else {
    echo "error";
}
