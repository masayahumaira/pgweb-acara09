<?php
    $latitude      = $_POST['latitude'];
    $longitude     = $_POST['longitude'];
    $kelurahan     = $_POST['kelurahan'];
    $rw            = $_POST['rw'];
    $rt            = $_POST['rt'];
    $pasang        = $_POST['pasang'];
    $bangunan      = $_POST['bangunan'];
    $alamat_lokasi = $_POST['alamat_lokasi'];

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "latihan_wifi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO sebaran_wifi (latitude, longitude, kelurahan, rw, rt, pasang, bangunan, alamat_lokasi) 
            VALUES ('$latitude', '$longitude', '$kelurahan', '$rw', '$rt', '$pasang', '$bangunan', '$alamat_lokasi')";

    if ($conn->query($sql) === TRUE) {
        echo "Data WiFi berhasil ditambahkan!<br><br>";
        echo "<a href='../index.php'>Kembali ke Halaman Utama</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>