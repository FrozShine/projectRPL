<?php
include "koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$level = $_POST['level'];
$email = $_POST['email'];
$sql = "INSERT INTO admin (username, password, level, email) VALUES ('" . $user . "', '" . $psw . "', '" . $level . "', '" . $email . "')";
$query = $koneksi->query($sql);
if ($query === true) {
    header('location: login.php');
} else {
    echo "error";
}
?>