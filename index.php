<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Eigenes css -->
  <link rel="stylesheet" href="./css/custom_stylesheet.css">
  <!-- fontawsome -->
  <script src="https://kit.fontawesome.com/e136e83032.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="content">
    <div class="jumbotron" id="header-wrap">
      <div class="container" id="header-content">
        <h1 class="display-3">Hotel XYZ!</h1>
        <p>Willkommen in unserem Hotel...</p>
        <p><a class="btn btn-light" href="./hilfe.php" role="button">Infos zum Aufenthalt »</a></p>
      </div>
    </div>
  </div>

  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white mb-5 shadow-sm">
    <div class="container-fluid">
      <!-- navbar icon -->
      <a class="navbar-brand" href="./index.php">
        <i class="fas fa-home fa-lg text-muted"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <?php
          session_start();
          if (empty($_SESSION["username"])) {
            echo '
              <li class="nav-item">
                  <a class="nav-link" href="./registrierung.php">Registrierung</a>
              </li>';
          } else {
            echo '
              <li class="nav-item">
                  <a class="nav-link" href="./news.php">News</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="./hilfe.php">Hilfe</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Service Ticket</a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="./serviceTicketFormular.php">erstellen</a></li>
                      <li><a class="dropdown-item" href="#">bearbeiten</a></li>
                  </ul>
              </li>
            ';
          }
          ?>
        </ul>

        <div class="d-flex">
          <?php
          if (empty($_SESSION["username"])) {
            echo '
              <a class="navbar-brand" href="./login.php">
                  <i class="fas fa-sign-in-alt fa-lg text-muted"></i>
              </a>';
          } else {
            echo '
              <a class="navbar-brand" href="./logout.php">
                  <i class="fas fa-sign-out-alt fa-lg text-muted"></i>
              </a>';
          }
          ?>
        </div>
      </div>
    </div>
  </nav>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>