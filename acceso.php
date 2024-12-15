<?php include_once('servidor.php') ?>
<!-- Incluye el archivo `servidor.php` una vez para cargar las funciones y lógica necesarias. -->

<!DOCTYPE html>
<html>
<head>
  <title>Acceso al Sistema</title>
  <!-- Título que aparece en la pestaña del navegador. -->
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <!-- Enlace al archivo CSS para dar estilo a la página. -->
</head>
<body>

  <div class="header">
    <h2>Ingreso</h2>
    <!-- Encabezado principal de la página. -->
  </div>
  
  <form method="post" action="acceso.php">
    <!-- Formulario que enviará los datos al archivo `acceso.php` usando el método POST. -->
    
    <?php include('errores.php'); ?>
    <!-- Incluye el archivo `errores.php` para mostrar cualquier error almacenado en el array `$errores`. -->
    
    <div class="input-group">
      <label>Usuario</label>
      <!-- Etiqueta para el campo de usuario. -->
      <input type="text" name="username" >
      <!-- Campo de entrada para el nombre de usuario. -->
    </div>
    
    <div class="input-group">
      <label>Contraseña</label>
      <!-- Etiqueta para el campo de contraseña. -->
      <input type="password" name="password">
      <!-- Campo de entrada para la contraseña. -->
    </div>
    
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
      <!-- Botón para enviar el formulario. El atributo `name` indica que este formulario es para iniciar sesión. -->
    </div>
    
    <p>
      ¿No eres miembro? <a href="registro.php">Registrate</a>
      <!-- Mensaje con un enlace que lleva a la página de registro. -->
    </p>
  </form>
</body>
</html>
