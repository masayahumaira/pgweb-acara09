<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id            = $_POST['id'];
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

    $sql = "UPDATE sebaran_wifi SET 
                latitude = '$latitude', 
                longitude = '$longitude', 
                kelurahan = '$kelurahan', 
                rw = '$rw', 
                rt = '$rt', 
                pasang = '$pasang', 
                bangunan = '$bangunan', 
                alamat_lokasi = '$alamat_lokasi' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data lokasi WiFi berhasil diperbarui!');
                window.location.href='../index.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: ../index.php");
    exit();
}
?>