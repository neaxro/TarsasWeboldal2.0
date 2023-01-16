<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Saját stílusok CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- JQuery import -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>Társasjátékok</title>

  </head>

  <body>
    <main>
      <!-- Oldal fejléce -->
      <nav class="navbar d-flex-row justify-content-between">

        <div class="d-inline-flex align-items-baseline">
          <a class="navbar-brand" href="index.php"><h2 style="color:white;">Társasjátékok</h2></a>

          <a class="nav-link" href="../upload/upload.php" style="color:white;">Új hozzáadása</a>
        </div>

        <form class="form-inline my-2">
          <input class="form-control mr-sm-4" type="search" placeholder="Keresés" aria-label="Search" id="kereso">
        </form>

      </nav>
    </main>

    
    <div class="d-flex justify-content-around align-items-start flex-shrink-0 flex-grow-0 flex-wrap py-3">

      <!-- SQL kapcsolat es listazas -->
      <?php
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
    </div>

    <script src="script.js" type="text/javascript"></script>
  </body>
</html>