<?php
        $servername = "172.17.0.3";
        $username = "root";
        $password = "Asdasd11";
        $dbname = "tarsasjatekok";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Tarsasok ORDER BY cim;";
        $result = $conn->query($sql);

        // Adatok listazasa
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

            // Adatok kartyakban valo megjelenitese aza oldalon
            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="../indexkepek/'.$row["kep"].'" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5>'.$row["cim"].'</h5> <hr>';
            echo '<img src="../forrasok/icon_emberek.png" class="kartya-magyarazo-ikonok"> <p class="card-text kartya-magyarazo-ikonok-szoveg">'.$row["letszam_min"].'-'.$row["letszam_max"].'</p> <hr>';
            echo '<img src="../forrasok/icon_ido.png" class="kartya-magyarazo-ikonok"> <p class="card-text kartya-magyarazo-ikonok-szoveg">'.$row["ido_min"].' - '.$row["ido_max"].' perc</p> <hr>';
            echo '<img src="../forrasok/icon_eletkor.png" class="kartya-magyarazo-ikonok"> <p class="card-text kartya-magyarazo-ikonok-szoveg">'.$row["eletkor_min"].'+</p> <hr>';
            echo "<p class='card-text' style='text-align: justify;'>".$row["rovid_leiras"]."</p>";
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "Nincs találat!";
        }
        $conn->close();
      ?>