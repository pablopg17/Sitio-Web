<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nombre = test_input($_POST["input-text"]);
  if (empty($nombre)) {
    $nombre_error = "El nombre es obligatorio";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
    $nombre_error = "Solo se permiten letras y espacios en blanco";
  }

  $sexo = test_input($_POST["select-button"]);
  if (empty($sexo)) {
    $sexo_error = "Debes seleccionar tu sexo";
  }

  $edad = test_input($_POST["edad"]);
  if (empty($edad)) {
    $edad_error = "La edad es obligatoria";
  } elseif (!is_numeric($edad)) {
    $edad_error = "La edad debe ser un número";
  } elseif ($edad > 0) {
    $edad_error = "No puedes poner un númer negativo";
  }

  $gijon = test_input($_POST["radio-button"]);
  if (empty($gijon)) {
    $gijon_error = "Debes indicar si te gustaría visitar Gijón";
  }

  if (empty($nombre_error) && empty($sexo_error) && empty($edad_error) && empty($gijon_error)) {
    echo "¡Gracias por enviar la encuesta!";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>