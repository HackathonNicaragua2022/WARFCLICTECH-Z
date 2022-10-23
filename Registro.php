<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<!-- <?php include("conexion.php");?> -->
	<div class="paginaentrada">
  		<div  class="form" >
    		<form action = "registrar.php" method = "post" class = "formulario">
                <h2 class = "titulo">REGISTRARSE</h2>
                <div class = "padre">
                    <div class = "nombre">
                        <input type = "text" name = "nombre" placeholder = "Nombre Completo" />
                    </div>
                    <div class = "inns">
                        <input type = "text" name = "inns" placeholder = "Nº INSS">
                    </div>
                    <div class = "contraseña">
                        <input type = "password" name = "contraseña" placeholder = "Contraseña">
                    </div>
                    <div class = "confirmar">
                        <input type = "password" name = "confirmar" placeholder = "Confirmar Contraseña">
                    </div>
                    <div class = "btn-registro">
                    <input class = "boton" type = "submit" value = "Registrar" name = "registro">
                    </div>
                </div>



            </form>
             <!-- <h1> Nombre del Paciente: </h1>
        <button class="btn-1"> Inicio de Consulta </button>
        <caption>  </caption>
        <button class="btn-2">Fin de Consulta</button>
        <?php 
                $horayfecha = time();
                echo date("d-m-Y (H:i:s)", $horayfecha);           
            ?> -->
</body> 
</html>

