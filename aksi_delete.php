<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE from barang where id_barang='$id'";
$query = $koneksi->query($sql);
if ($query) {
   header('location: home_admin.php');
}
