<?php  
// Inicia el bloque PHP para procesar errores.

if (count($errores) > 0) {
  // Verifica si el array '$errores' contiene al menos un elemento.
  // Si hay errores, se ejecutará el bloque de código dentro del 'if'.

  echo "<div class='error'>";
  // Imprime un contenedor HTML con la clase 'error' para aplicar estilo a la lista de errores.

  foreach ($errores as $error) {
    // Itera sobre cada elemento del array '$errores'.
    // Cada elemento (error) se almacena temporalmente en la variable '$error'.

    echo "<p>$error</p>";
    // Imprime cada error dentro de un párrafo HTML '<p>'.
  }

  echo "</div>";
  // Cierra el contenedor HTML 'div' para finalizar la lista de errores.
}
?>
