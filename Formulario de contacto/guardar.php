<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Confirmación</title>
    </head>
    <body>
<?php
                                                  //MANASÉS JIMÉNEZ
                                                  
include ('conexion.php');

$carnet = $_POST['carnet'];
$alumno = $_POST['alumno'];
$grado = $_POST['grado'];
$encargado = $_POST['encargado'];
$parentesco = $_POST['parentesco'];
$dpi = $_POST['dpi'];


$sql = "INSERT INTO info (carnet, alumo, grado, encargado, dpi, parentesco, accion) VALUES ('$carnet', '$alumno', '$grado', '$encargado', '$dpi', '$parentesco', '0')";

$verificar_carnet = mysqli_query($conn, "SELECT * FROM info WHERE carnet = '$carnet'");

if (mysqli_num_rows($verificar_carnet) > 0){
?>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="js/existente.js"></script>
      <script>
      function redireccionar() {
            window.location = "http://localhost:50/regalos/Formulario%20de%20contacto/"
      }
      setTimeout("redireccionar()", 3000);
      </script>
<?php
exit();
}

$verificar_dpi = mysqli_query($conn, "SELECT * FROM info WHERE dpi = '$dpi'");

if (mysqli_num_rows($verificar_dpi) > 0){
?>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="js/existente2.js"></script>
      <script>
      function redireccionar() {
            window.location = "http://localhost:50/regalos/Formulario%20de%20contacto/"
      }
      setTimeout("redireccionar()", 3000);
      </script>
<?php
      exit();
}

if (mysqli_query($conn, $sql)) {
?>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="js/confi.js"></script>
      <script>
      function redireccionar() {
            window.location = "http://localhost:50/regalos/Formulario%20de%20contacto/"
      }
      setTimeout("redireccionar()", 2500);
      </script>
<?php
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);



?>
</body>
</html>