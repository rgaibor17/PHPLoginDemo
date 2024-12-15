<?php

session_start(); 
// Inicia una sesión en el servidor para rastrear información del usuario entre páginas.

$usuario = ""; 
$correo = ""; 
$nombreCompleto = ""; 
$errores = array(); 
// Inicializa las variables para almacenar datos de entrada y errores.

$archivo = "usuarios.csv"; 
// Especifica el archivo donde se almacenarán los usuarios registrados.

if (isset($_POST['reg_user'])) { 
  // Verifica si el formulario de registro ha sido enviado.

  $nombreCompleto = $_POST['fullname']; 
  $usuario = $_POST['username']; 
  $correo = $_POST['email']; 
  $clave_1 = $_POST['password_1']; 
  $clave_2 = $_POST['password_2']; 
  $existe = true; 
  // Recoge los datos enviados por el formulario y establece una bandera para verificar duplicados.

  if (empty($usuario)) { 
    array_push($errores, "Usuario es requerido"); 
    $existe = false; 
  }
  if (empty($correo)) { 
    array_push($errores, "Email es requerido"); 
    $existe = false; 
  }
  if (empty($clave_1)) { 
    array_push($errores, "Contraseña es requerida"); 
    $existe = false; 
  }
  if ($clave_1 != $clave_2) { 
    array_push($errores, "Las contraseñas no son las mismas"); 
    $existe = false; 
  }
  // Realiza validaciones básicas para asegurarse de que los campos requeridos están completos y que las contraseñas coinciden.

  if(file_exists($archivo)) { 
    // Verifica si el archivo `usuarios.csv` existe.

    $recurso = file($archivo); 
    // Carga todas las líneas del archivo en un array.

    foreach($recurso as $linea) { 
      $arreglo = explode(",", $linea); 
      // Divide cada línea en un array usando la coma como delimitador.

      if ($arreglo[2] == $usuario) { 
        array_push($errores, "El usuario ya existe"); 
        $existe = false; 
      }
      if ($arreglo[1] == $correo) { 
        array_push($errores, "El correo ya existe"); 
        $existe = false; 
      }
      // Comprueba si el nombre de usuario o el correo ya existen en el archivo.
    }
  } else {
    array_push($errores, "Archivo no encontrado."); 
    // Si el archivo no existe, agrega un mensaje de error.
  }

  if ($existe) { 
    // Si no hay errores ni duplicados:

    $claveCifrada = md5($clave_1); 
    // Cifra la contraseña utilizando el algoritmo MD5.

    $linea = "$nombreCompleto,$correo,$usuario,$claveCifrada\n"; 
    // Crea una nueva línea con los datos del usuario.

    file_put_contents($archivo, $linea, FILE_APPEND) 
    or die("ERROR: No se puede escribir datos."); 
    // Agrega la línea al archivo CSV. Si falla, muestra un error.

    $_SESSION['fullname'] = $nombreCompleto; 
    $_SESSION['success'] = "Has iniciado sesión"; 
    header('location: index.php'); 
    // Almacena el nombre completo en la sesión y redirige al inicio.
  }
}

if (isset($_POST['login_user'])) { 
  // Verifica si el formulario de inicio de sesión ha sido enviado.

  $usuario = $_POST['username']; 
  $clave = $_POST['password']; 
  // Recoge el usuario y la contraseña ingresados.

  if (empty($usuario)) { 
    array_push($errores, "Usuario es requerido"); 
  }
  if (empty($clave)) { 
    array_push($errores, "Contrasena es requerida"); 
  }
  // Valida que ambos campos estén completos.

  if(file_exists($archivo)) { 
    // Verifica si el archivo `usuarios.csv` existe.

    $existe = false; 
    $recurso = file($archivo); 
    // Carga todas las líneas del archivo en un array.

    foreach($recurso as $linea) { 
      $arreglo = explode(",", $linea); 
      // Divide cada línea en un array usando la coma como delimitador.

      if ($arreglo[2] == $usuario and trim($arreglo[3]) == md5($clave)) { 
        // Comprueba si el usuario existe y si la contraseña coincide (cifrada con MD5).

        $existe = true; 
        $nombreCompleto = $arreglo[0]; 
        // Si se encuentra una coincidencia, almacena el nombre completo.
      }
    }

    if ($existe) { 
      $_SESSION['fullname'] = $nombreCompleto; 
      $_SESSION['success'] = "Has iniciado sesión"; 
      header('location: index.php'); 
      // Si las credenciales son válidas, inicia sesión y redirige al inicio.
    } else {
      array_push($errores, "Datos incorrectos."); 
      // Si no se encuentra el usuario o la contraseña, muestra un mensaje de error.
    }
  } else {
    array_push($errores, "ERROR: Archivo no encontrado."); 
    // Si el archivo no existe, agrega un mensaje de error.
  }
}
?>
