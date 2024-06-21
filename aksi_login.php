<?php
session_start();
include "koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $sql = "SELECT * FROM admin WHERE username='$user' AND password='$psw'";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        if ($data['level'] == "Admin") {
            header("location:home_admin.php");
        } elseif ($data['level'] == "Kasir") {
            header("location:home_kasir.php");
        }
    } else {
        $_SESSION['error'] = "Username atau Password salah";
        header("location:login.php");
    }
} elseif ($op == "out") {
    unset($_SESSION['level']);
    unset($_SESSION['username']);
    header("location:login.php");
}
