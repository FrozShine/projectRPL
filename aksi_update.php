<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$jumlah_barang = $_POST['jumlah_barang'];

$sql = "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', jumlah_barang='$jumlah_barang', kategori='$kategori' WHERE id_barang='$id'";
$query = $koneksi->query($sql);
if ($query) {
   header('location: home_admin.php');
}
