<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap-grid.min.css">
  <title>CodingHQ Blog</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="style.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

<body class="light-theme">

  <!--
    - #HEADER
  -->

  <header>

    <div class="container">

      <nav class="navbar">

        <a href="#">
          <img src="image/logo_coding/logo.png" alt="SimpleBlog logo" width="150" class="logo-light">
          <img src="image/logo_coding/logo.png" alt="SimpleBlog logo" width="150" class="logo-dark">
        </a>

        <div class="btn-group">

          <button class="theme-btn theme-btn-mobile light">
            <ion-icon name="moon" class="moon"><img src="bootstrap-icons-1.11.0/moon-fill.svg" alt=""></ion-icon>
            <ion-icon name="sunny" class="sun"><img src="bootstrap-icons-1.11.0/sun-fill.svg" alt=""></ion-icon>
          </button>

          <button class="nav-menu-btn">
            <ion-icon name="menu-outline"><img src="bootstrap-icons-1.11.0/list.svg" alt=""></ion-icon>
          </button>

        </div>

        <div class="flex-wrapper">

          <ul class="desktop-nav">

            <li>
              <a href="#" class="nav-link">Accueil</a>
            </li>

            <li>
              <a href="#" class="nav-link">A propos</a>
            </li>

            <li>
              <a href="#" class="nav-link">Contact</a>
            </li>

          </ul>

          <button class="theme-btn theme-btn-desktop light">
            <ion-icon name="moon" class="moon"><img src="bootstrap-icons-1.11.0/moon-fill.svg" alt=""></ion-icon>
            <ion-icon name="sunny" class="sun"><img src="bootstrap-icons-1.11.0/sun-fill.svg" alt=""></ion-icon>
          </button>

        </div>

        <div class="mobile-nav">

          <button class="nav-close-btn">
            <ion-icon name="close-outline"><img src="bootstrap-icons-1.11.0/x-lg.svg" alt=""></ion-icon>
          </button>

          <div class="wrapper">

            <p class="h3 nav-title">Menu</p>

            <ul>
              <li class="nav-item">
                <a href="#" class="nav-link">Accueil</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">A propos</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li>
            </ul>

          </div>

          <div>

            <p class="h3 nav-title">Articles courant</p>

            <ul>
              <li class="nav-item">
                <a href="#" class="nav-link">Base de donnee</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Accessibilte</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Performance Web</a>
              </li>
            </ul>

          </div>

        </div>

      </nav>

    </div>

  </header>