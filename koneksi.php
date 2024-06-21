<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_toko";
    $koneksi = mysqli_connect($host, $username, $password, $database);
    if ($koneksi) {
        //echo "Server Connected";
    } else {
        echo "Server not Connected";
    }
    ?>

    <br>
    <br>
</body>

</html>