<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$nm_jenis = $_POST['jenis'];
$merek = $_POST['merek'];

$sql = "UPDATE jenis_minuman SET nm_jenis='$nm_jenis', merek='$merek' WHERE id_jenis='$id'";
$query = $koneksi->query($sql);
if ($query) {
   header('location: dt_jenis.php');
}
?>