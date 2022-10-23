<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include("conexion.php");?>
	<div class="paginaentrada">
  		<div  class="form" >
    		<form action="iniciosesion.php" class="formularioentrada" method="post">
      			<input id="txt_usuario" name="txt_usuario" type="text" placeholder="Nombre de Usuario o Numero de INSS"/>
      			<input id="txt_pass" name="txt_pass" type="password" placeholder="Contraseña"/>
      			<button type="submit">Iniciar sesión</button>
      			<p class="message"><a href="#">Olvidaste tu contraseña?</a></p>
    		</form>
  		</div>
	</div>
</body>
</html>