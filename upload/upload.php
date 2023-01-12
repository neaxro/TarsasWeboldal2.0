<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $cim = $_POST["cim"];
        
        $min_jatekos = $_POST["min_jatekos"];
        $max_jatekos = $_POST["max_jatekos"];

        $min_hossz = $_POST["min_hossz"];
        $max_hossz = $_POST["max_hossz"];

        $korhatar = $_POST["korhatar"];

        $indexkep = $_FILES["indexkep"]["name"];
        $temp_indexkep = $_FILES["indexkep"]["tmp_name"];
        $kepekMappa = "../indexkepek/" . $indexkep;

        // SQL kapcsolat es beszurasa
        $servername = "192.168.1.24";
        $username = "tarsasjatek_web";
        $password = "Asdasd11#";
        $dbname = "tarsasjatekok";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //$sql = "INSERT INTO Tarsasok (kep) VALUES ('$indexkep');";
        $sql = "INSERT INTO Tarsasok (kep, cim, letszam_min, letszam_max, ido_min, ido_max, eletkor_min, rovid_leiras) VALUES ('$indexkep', '$cim', '$min_jatekos', '$max_jatekos', '$min_hossz', '$max_hossz', '$korhatar')"

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Kep mentese mappaba
        if (move_uploaded_file($temp_indexkep, $kepekMappa)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        $conn->close();
    }
?>