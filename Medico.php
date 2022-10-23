<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include("conexion.php");?>
	<div class="paginaentrada">
  		<div  class="form" >
    		<h1 >Atencion De Pacientes</h1> 
   
             <h1> Nombre del Paciente: </h1>
        <button class="btn-1"> Inicio de Consulta </button>
        <caption>  </caption>
        <button class="btn-2">Fin de Consulta</button>
        <?php 
                $horayfecha = time();
                echo date("d-m-Y (H:i:s)", $horayfecha);           
            ?>
</body> 
</html>