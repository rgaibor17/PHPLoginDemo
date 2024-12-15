<?php include('servidor.php') ?>
<!-- Incluye el archivo 'servidor.php'. -->

<!DOCTYPE html>
<html>
<head>
  <title>Registro al Sistema</title>
  <!-- Título de la página que se muestra en la pestaña del navegador. -->
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <!-- Vincula la hoja de estilos 'estilos.css' para dar formato a la página. -->
</head>
<body>
  <!-- Cuerpo del documento HTML. -->

  <div class="header">
    <h2>Registro</h2>
    <!-- Encabezado principal de la página con el texto "Registro". -->
  </div>

  <form method="post" action="registro.php">
    <!-- Inicia un formulario HTML que envía los datos al archivo 'registro.php' mediante el método POST. -->

    <?php include('errores.php'); ?>
    <!-- Incluye el archivo 'errores.php', que muestra mensajes de error almacenados, como campos vacíos o contraseñas que no coinciden. -->

    <div class="input-group">
      <label>Nombres</label>
      <!-- Etiqueta para el campo de entrada del nombre completo. -->
      <input type="text" name="fullname" value="<?php echo $nombreCompleto; ?>">
      <!-- Campo de entrada para el nombre completo; su valor se rellena dinámicamente con la variable PHP '$nombreCompleto'. -->
    </div>

    <div class="input-group">
      <label>Usuario</label>
      <!-- Etiqueta para el campo de entrada del nombre de usuario. -->
      <input type="text" name="username" value="<?php echo $usuario; ?>">
      <!-- Campo de entrada para el nombre de usuario; su valor se rellena dinámicamente con la variable PHP '$usuario'. -->
    </div>

    <div class="input-group">
      <label>Correo</label>
      <!-- Etiqueta para el campo de entrada del correo electrónico. -->
      <input type="email" name="email" value="<?php echo $correo; ?>">
      <!-- Campo de entrada para el correo electrónico; su valor se rellena dinámicamente con la variable PHP '$correo'. -->
    </div>

    <div class="input-group">
      <label>Contraseña</label>
      <!-- Etiqueta para el campo de entrada de la contraseña. -->
      <input type="password" name="password_1">
      <!-- Campo de entrada para la primera contraseña. -->
    </div>

    <div class="input-group">
      <label>Confirme contraseña</label>
      <!-- Etiqueta para el campo de entrada de confirmación de contraseña. -->
      <input type="password" name="password_2">
      <!-- Campo de entrada para la confirmación de la contraseña. -->
    </div>

    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Registrarse</button>
      <!-- Botón para enviar el formulario; el atributo 'name' está configurado como 'reg_user' para identificar esta acción. -->
    </div>

    <p>
      ¿Ya eres miembro? <a href="acceso.php">Accede</a>
      <!-- Mensaje con un enlace a 'acceso.php' para que los usuarios registrados puedan iniciar sesión. -->
    </p>
  </form>
</body>
</html>
