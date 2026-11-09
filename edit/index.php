<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Form Edit Data Sebaran WiFi</h2>

    <?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "latihan_wifi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $sql = "SELECT * FROM sebaran_wifi WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>

        <form action="edit.php" onsubmit="return validateForm()" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="lat">Latitude:</label><br>
            <input type="text" id="lat" name="latitude" value="<?php echo $row['latitude']; ?>"><br>

            <label for="long">Longitude:</label><br>
            <input type="text" id="long" name="longitude" value="<?php echo $row['longitude']; ?>"><br>

            <label for="kelurahan">Kelurahan:</label><br>
            <input type="text" id="kelurahan" name="kelurahan" value="<?php echo $row['kelurahan']; ?>"><br>

            <label for="rw">RW:</label><br>
            <input type="text" id="rw" name="rw" value="<?php echo $row['rw']; ?>"><br>

            <label for="rt">RT:</label><br>
            <input type="text" id="rt" name="rt" value="<?php echo $row['rt']; ?>"><br>

            <label for="pasang">Pasang:</label><br>
            <input type="text" id="pasang" name="pasang" value="<?php echo $row['pasang']; ?>"><br>

            <label for="bangunan">Bangunan:</label><br>
            <input type="text" id="bangunan" name="bangunan" value="<?php echo $row['bangunan']; ?>"><br>

            <label for="alamat_lokasi">Alamat Lokasi:</label><br>
            <textarea id="alamat_lokasi" name="alamat_lokasi" rows="3"><?php echo $row['alamat_lokasi']; ?></textarea><br><br>

            <input type="submit" value="Simpan Perubahan">
        </form>

    <?php
    } else {
        echo "Data tidak ditemukan.";
    }
    $conn->close();
    ?>

    <p id="informasi" style="color: red;"></p>

    <script>
        function validateForm() {
            let lat = document.getElementById("lat").value;
            let long = document.getElementById("long").value;
            let text = "";

            if (isNaN(lat) || lat === "" || isNaN(long) || long === "") {
                text = "Koordinat Latitude dan Longitude harus berupa angka yang valid!";
                document.getElementById("informasi").innerHTML = text;
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>