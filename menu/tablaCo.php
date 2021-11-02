<?php
           //MANASÉS JIMÉNEZ (TODO LO DE ESTA PAGINA)
include_once 'conexion.php';

$sql = "SELECT * FROM info WHERE accion = '1' ORDER BY id ASC";

$sentencia = $pdo->prepare($sql);
$sentencia->execute();

$resultado = $sentencia->fetchAll();

//var_dump($resultado); 

$articulo_x_pagina = 3;

$total_de_datos = $sentencia->rowCount();
//echo $total_de_datos;
$paginas = $total_de_datos/3;
$paginas = ceil($paginas);
//echo $paginas;

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="css/img/logo.png">
    <link rel="stylesheet" href="css/tablestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>En espera</title>
    <script> var timer = null;
      function auto_reload()
    {
      top.location.href = 'http://localhost:50/regalos/menu/tablaCo.php?pagina=1';
    } 
    </script>  
  </head>

<body onload="timer = setTimeout('auto_reload()',7000);">
<form action="" method="">
  <header><br>
  <h1><center>En espera de entregar</h1></center></header>

<div class="container my-5">
<p>Buscar por: carnet, nombre del alumno, Dpi o por nombre del encargado</p>
<input type="search" class="light-table-filter" data-table="order-table" placeholder="Buscar">


	<table class ="order-table ">
	<thead>
            <tr>
                <th>Carnet</th>
                <th>Nombre del alumno</th>
                <th>Grado</th>
                <th>Nombre de encargado</th>
                <th>DPI</th>
                <th>Acción</th>


            </tr>
	</thead>
  <?php 
	if(!$_GET){
    header('Location: tablaCo.php?pagina=1');
  }
  //if ($_GET['pagina']>$paginas){
    //header('Location: datos.php?pagina=1');
  //}



  $iniciar = ($_GET['pagina']-1)*$articulo_x_pagina; 
  //echo $iniciar;


    $sql_formulario = "SELECT * FROM info WHERE accion = '1' ORDER BY id ASC LIMIT :iniciar,:ndatos";
    $sentencia_datos = $pdo->prepare($sql_formulario);
    $sentencia_datos->bindParam(':iniciar',$iniciar,PDO::PARAM_INT);
    $sentencia_datos->bindParam(':ndatos',$articulo_x_pagina,PDO::PARAM_INT);
    $sentencia_datos->execute();

    $resultado_formulario = $sentencia_datos->fetchAll();

	?>
	<?php foreach ($resultado_formulario as $dato):	?>
	<tbody>
		<tr>
		<td><?php echo $dato['carnet']; ?></td>
		<td><?php echo $dato['alumo']; ?></td>
		<td><?php echo $dato['grado']; ?></td>
		<td><?php echo $dato['encargado']; ?></td>
		<td><?php echo $dato['dpi']; ?></td>
        <td><a href="entre.php?en=<?=$dato['id']?>" onclick="return confirm('¿Seguro que asistio el alumno?');">Entregar</a></td>
        
	    </tr>
	</tbody>
    <?php endforeach ?>
	</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="tablaCo.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>

	<?php for($i=0; $i<$paginas;$i++):?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="tablaCo.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
	<?php endfor; ?>

    <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="tablaCo.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
  </ul>
</nav>
</div>
  </form>
<script src = "js/table.js"></script>
  </body>

</html>