<?php
session_start();
if (isset($_COOKIE["logincookie"])) {
  $login_session_duration = $_COOKIE["logincookie"];
} else {
  $login_session_duration = 3600; // 1 hour
}
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hotel XYZ</title>
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
        <p><a class="btn btn-light" href="./index.php?menu=hilfe" role="button">Infos zum Aufenthalt »</a></p>
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

          <li class="nav-item">
            <a class="nav-link" href="./index.php?menu=news">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?menu=hilfe">Hilfe</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Service Ticket</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./index.php?menu=serviceTicketFormular">erstellen</a></li>
              <li><a class="dropdown-item" href="#">bearbeiten</a></li>
            </ul>
          </li>
        </ul>

        <div class="d-flex">
          <!-- Entweder wir lassen die Gästerregistrierung hier oder man kann Sie nur übers Login-Formular auffinden -->
          <?php
          if (empty($_SESSION["username"])) {
            echo '
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                  <a class="nav-link" href="./index.php?menu=registrierung">G&auml;sterregistrierung</a>
              </li>
            </ul>';
          }
          ?>
          <!-- Login oder Logout Button -->
          <?php
          if (empty($_SESSION["username"])) {
            echo '
              <a class="navbar-brand" href="./index.php?menu=login">
                  <i class="fas fa-sign-in-alt fa-lg text-muted"></i>
              </a>';
          } else {
            echo '
              <a class="navbar-brand" href="./index.php?menu=logout">
                  <i class="fas fa-sign-out-alt fa-lg text-muted"></i>
              </a>';
          }
          ?>
        </div>
      </div>
    </div>
  </nav>

  <header>

  </header>

  <main>
    <?php
    $menu = @$_GET['menu'];
    // All PHP-Pages are included using "include"
    switch ($menu) {
      case 'login':
        include 'sites/login.php';
        break;
      case 'assignments':
        include 'sites/assignments.php';
        break;
      case 'logout':
        include 'sites/logout.php';
        break;
      case 'upload':
        include 'sites/upload.php';
        break;
      case 'download':
        include 'sites/download.php';
        break;
      case 'sessionexpired':
        include 'sites/sessionexpired.php';
        break;
    }
    ?>
  </main>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>