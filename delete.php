<?php
    $id = $_GET['id'];

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "latihan_wifi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM sebaran_wifi WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data lokasi WiFi berhasil dihapus!');
                window.location.href='index.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>