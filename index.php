<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Saját stílusok CSS -->
    <link rel="stylesheet" href="./res/main/style.css">

    <!-- JQuery import -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>Társasjátékok</title>

  </head>

  <body>
    <main>
      <!-- Oldal fejléce -->
      <nav class="navbar d-flex-row justify-content-between">

        <div class="d-inline-flex align-items-baseline">
          <a class="navbar-brand" href="index.php"><h2 style="color:white;">Főoldal</h2></a>

          <a class="nav-link" href="./res/upload/upload.php" style="color:white;">Társasjátékok hozzáadása</a>
        </div>

        <form class="form-inline my-2">
          <input class="form-control mr-sm-4" type="search" placeholder="Keresés" aria-label="Search" id="kereso">
        </form>

      </nav>
    </main>

    
    <div class="d-flex justify-content-around align-items-start flex-shrink-0 flex-grow-0 flex-wrap py-3">
      <!-- Listazas -->
      <?php require_once("./res/main/listData.php") ?>
    </div>

    <script src="./res/main/script.js" type="text/javascript"></script>
  </body>
</html>