<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Confirmacion</title>
    </head>
    <body>

<?php
            //MANASÉS JIMÉNEZ (TODO LO DE ESTA PAGINA)
require_once 'conex.php';

$conex = mysqli_connect($servername, $username, $password, $database);

$upd=$_GET['up'];

if (!mysqli_connect_errno()){

    $sql = "UPDATE  info SET accion = '1' WHERE id = '$upd'";
    $exito = mysqli_query($conex, $sql);

    if ($exito){
?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/confir.js"></script>
        <script>
        function redireccionar() {
                    window.location = "http://localhost:50/regalos/menu/tablaU.php?pagina=1"
                }
                setTimeout("redireccionar()", 2500);
        </script>
<?php
    }else{
        echo 'ocurrio un error';
    }


}else{
    echo "error: ",mysqli_connect_errno();
}




?>

</body>
</html>