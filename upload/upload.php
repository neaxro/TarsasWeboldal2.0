<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Saját stílusok CSS -->
        <link rel="stylesheet" href="style.css">

        <title>Társasjáték hozzáadása</title>
    </head>
    <body>
        <main>
            <!-- Oldal fejléce -->
            <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand" href="upload.php"><h2>Társasjátékok hozzáadása</h2></a>

              <a class="nav-link" href="../main/index.php">Főoldal<span class="sr-only"></span></a>
            </nav>
        </main>

        <section>
          <div class="form-box card" style="top: 70%;">

            <div class="form-box-fejlec card-header">
              <h3>Új Társasjáték</h3>
            </div>

            <!-- Submit eseten adatok feltoltese es visszajelzes -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['upload'])){
                    
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
            
            <!-- TODO: Validacio -->
            <form method="post" enctype="multipart/form-data" class="needs-validation">
              <div class="form-group px-3">

                <!-- Címe -->
                <label for="tarsasCime">Társas neve</label>
                <input name="cim" type="text" class="form-control" id="tarsasCime" aria-describedby="cimhelp" placeholder="Társasjáték neve" maxlength="45" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Looks baaad!</div>
                <small id="cimhelp" class="form-text text-muted">Maximum 45 karakter hosszúságú lehet a cím!</small>
                
                <hr>

                <!-- Játékosszám -->
                <label for="jatekosszam">Játékosszám</label>
                <div class="row">
                  <!-- Min -->
                  <div class="col">
                    <input name="min_jatekos" type="number" class="form-control" id="minjatekosszam" aria-describedby="" placeholder="Minimum Játékosszám" required>
                  </div>

                  <!-- Max -->
                  <div class="col">
                    <input name="max_jatekos" type="number" class="form-control" id="maxjatekosszam" aria-describedby="" placeholder="Maximum Játékosszám" required>
                  </div>
                </div>
                <hr>

                <!-- Hossza -->
                <label for="hossz">Időtartama</label>
                <div class="row">
                  <!-- Min -->
                  <div class="col">
                    <input name="min_hossz" type="number" class="form-control" id="minido" aria-describedby="" placeholder="Minimum Időtartam" required>
                  </div>

                  <!-- Max -->
                  <div class="col">
                    <input name="max_hossz" type="number" class="form-control" id="maxido" aria-describedby="" placeholder="Maximum Időtartam" required>
                  </div>
                </div>
                <hr>

                <!-- Korhatár -->
                <label for="tarsasKorhatara">Minimum korhatár</label>
                <input name="korhatar" type="number" class="form-control" id="tarsasKorhatara" aria-describedby="korhelp" placeholder="Társasjáték korhatára" required>
                <small id="korhelp" class="form-text text-muted">Amennyiben nincs korhatárbesorolás 0-t adjon meg!</small>
                <hr>

                <!-- Rövid leírás -->
                <div class="form-group">
                  <label for="rovidLeiras">Rövid leírás</label>
                  <textarea name="leiras" class="form-control" aria-label="With textarea" id="rovidLeiras"
                    maxlength="2500" rows="3" style="resize: none"></textarea>
                </div>
                <hr>

                <div class="container row align-items-center">
                  <!-- Indexkép -->
                  <div class="form-group col-10">                 
                    <label for="indexkep">Társasjáték indexképe</label>
                    <input name="indexkep" type="file" class="form-control-file" id="indexkep" required>
                  </div>
                
                  <!-- Submit gomb -->
                  <div class="col-2">
                    <button type="submit" class="btn" name="upload">Hozzáadás</button>
                  </div>

                </div>
              </div>
            </form>

          </div>
        </section>
    </body>
</html>