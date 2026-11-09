<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "latihan_wifi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql    = "SELECT * FROM sebaran_wifi";
    $result = $conn->query($sql);

    echo "<h2>Data Sebaran WiFi RT/RW</h2>";
    echo "<a href='input/index.html'>Input Wifi</a><br><br>";

    if ($result && $result->num_rows > 0) {
        echo "<table border='1px' cellpadding='8' cellspacing='0'>
                <tr>
                    <th>No</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Kelurahan</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Pasang</th>
                    <th>Bangunan</th>
                    <th>Alamat Lokasi</th>
                    <th colspan='2'>Aksi</th>
                </tr>";

        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row["latitude"] . "</td>
                    <td>" . $row["longitude"] . "</td>
                    <td>" . $row["kelurahan"] . "</td>
                    <td>" . $row["rw"] . "</td>
                    <td>" . $row["rt"] . "</td>
                    <td>" . $row["pasang"] . "</td>
                    <td>" . $row["bangunan"] . "</td>
                    <td>" . $row["alamat_lokasi"] . "</td>
                    <td><a href='edit/index.php?id=" . $row["id"] . "'>Edit</a></td>
                    <td><a href='delete.php?id=" . $row["id"] . "'>Hapus</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Belum ada data sebaran WiFi.";
    }

    $conn->close();
?>