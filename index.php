<?php
  session_start(); 
  // Inicia o reanuda una sesión para utilizar variables de sesión en el script.

  if (!isset($_SESSION['fullname'])) {
    // Comprueba si no existe la variable de sesión 'fullname', lo que indica que el usuario no ha iniciado sesión.
    $_SESSION['msg'] = "Primero debes iniciar sesion";
    // Establece un mensaje de sesión indicando que el usuario debe iniciar sesión.
    header('location: acceso.php');
    // Redirige al usuario a la página 'acceso.php'.
  }

  if (isset($_GET['logout'])) {
    // Verifica si se ha recibido un parámetro 'logout' en la URL.
    session_destroy();
    // Destruye la sesión actual, eliminando todos los datos de la sesión.
    unset($_SESSION['fullname']);
    // Elimina la variable de sesión 'fullname'.
    header("location: acceso.php");
    // Redirige nuevamente al usuario a la página 'acceso.php'.
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>PHP Intermedio</title>
  <!-- Título de la página que aparece en la pestaña del navegador. -->
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <!-- Vincula una hoja de estilos externa para dar formato a la página. -->
</head>
<body>

<div class="header">
  <h2>Inicio</h2>
  <!-- Encabezado principal de la página con el texto "Inicio". -->
</div>
<div class="content">
    <!-- Contenedor principal para el contenido de la página. -->

    <!-- Aviso -->
    <?php if (isset($_SESSION['success'])) : ?>
      <!-- Comprueba si existe la variable de sesión 'success' que indica un mensaje de éxito. -->
      <div class="error success" >
        <!-- Crea un contenedor para mostrar el mensaje de éxito. -->
        <h3>
          <?php 
            echo $_SESSION['success']; 
            // Muestra el mensaje de éxito almacenado en la variable de sesión.
            unset($_SESSION['success']);
            // Elimina la variable de sesión 'success' después de mostrar el mensaje.
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- Usuario logueado -->
    <?php  if (isset($_SESSION['fullname'])) : ?>
      <!-- Comprueba si la variable de sesión 'fullname' está definida, lo que indica que el usuario ha iniciado sesión. -->
      <p>Bienvenido <strong><?php echo $_SESSION['fullname']; ?></strong></p>
      <!-- Muestra un mensaje de bienvenida con el nombre completo del usuario. -->
  <iframe width="100%" height="300" src="https://www.youtube.com/embed/Og847HVwRSI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <!-- Inserta un video de YouTube con un iframe. -->
      <p> <a href="index.php?logout='1'" style="color: red;">Salir</a> </p>
      <!-- Muestra un enlace para cerrar sesión, que incluye el parámetro 'logout' en la URL. -->
    <?php endif ?>
</div>

</body>
</html>
