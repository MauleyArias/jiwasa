
<!-- HEADER-->
<header class="header">
      <div class="header__logo-container">
        <img class="header__logo" src="../assets/image/jiwasa-logo.png" alt="" />
      </div>
      <nav class="header__nav">
        <ul class="header__nav-list">
          <li class="header__list-item"><a href="../pages/index.php">Inicio</a></li>
          <li class="header__list-item"><a href="../pages/catalog.php">Catalogo</a></li>
          <li class="header__list-item"><a href="../pages/us.php">Sobre nosotros</a></li>
          <li class="header__list-item"><a href="../pages/contact.php">Contacto</a></li>
        </ul>
      </nav>
      <div  class="header__profile">
        <img
          class="header__profile-image"
          src="../assets/image/profile-picture.png"
          alt=""
        />
        <div class="dropdown">
          <?php
          $mi_cuenta_enlace = isset($_SESSION['usuario_id']) ? "../pages/mi-cuenta.php" : "../pages/login-register.php";
          $historial_enlace = isset($_SESSION['usuario_id']) ? "../pages/mi-cuenta.php" : "../pages/login-register.php";
          $logout= isset($_SESSION['usuario_id'])? "../includes/logout.php":"../includes/logout.php";
          

          ?>
            <a href="<?php echo $mi_cuenta_enlace; ?>">Mi cuenta</a>
            <a href="<?php echo $historial_enlace; ?>">Historial de Reservas</a>
            <a href="<?php echo $logout; ?>">Cerrar Sesion</a>
        </div>
      </div>
    </header>
