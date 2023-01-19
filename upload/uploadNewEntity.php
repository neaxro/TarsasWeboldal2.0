<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['upload'])){

        $biztonsagi_kod = $_POST["biztonsagiKod"];
        $helyes_kod = "9098c53fe0e338cf9ef819e1048b6cf42e9d840425a43f96c64c19843ed80b61"; // SHA256-al kodolt

        if(hash("sha256", $biztonsagi_kod) !== $helyes_kod){
            
            echo '<script>alert("Helytelen biztonsági kód!")</script>';
            return;
        }
        
        $cim = $_POST["cim"];
        
        $min_jatekos = $_POST["min_jatekos"];
        $max_jatekos = $_POST["max_jatekos"];

        $min_hossz = $_POST["min_hossz"];
        $max_hossz = $_POST["max_hossz"];

        $korhatar = $_POST["korhatar"];

        $indexkep = $_FILES["indexkep"]["name"];
        $temp_indexkep = $_FILES["indexkep"]["tmp_name"];
        $kepekMappa = "../indexkepek/" . $indexkep;

        $rovid_leiras = $_POST["leiras"];

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
        $sql = "INSERT INTO Tarsasok (kep, cim, letszam_min, letszam_max, ido_min, ido_max, eletkor_min, rovid_leiras) VALUES ('$indexkep', '$cim', '$min_jatekos', '$max_jatekos', '$min_hossz', '$max_hossz', '$korhatar', '$rovid_leiras');";

        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            // TODO jobb visszajelzést
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Kep mentese mappaba
        if (move_uploaded_file($temp_indexkep, $kepekMappa)) {
            echo '<script>alert("Sikeres hozzáadás!")</script>';
        } else {
            echo '<script>alert("Sikertelen művelet!")</script>';
        }

        $conn->close();
    }
?>