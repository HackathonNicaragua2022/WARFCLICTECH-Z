<html>
	<title>TurnApp - Inicio de Sesión</title>
<link rel="shortcut icon" href="/favicon.ico" />
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="paginaentrada">
  		<div  class="form" >
    		<form action="iniciosesion.php" class="formularioentrada" method="post">
				<h2>Inicio de Sesión</h2>
      			<input id="txt_usuario" name="txt_usuario" type="text" placeholder="Nombre de Usuario o Numero de INSS"/>
      			<input id="txt_pass" name="txt_pass" type="password" placeholder="Contraseña"/>
				<Button><a href="http:\\localhost\turnapp\paciente.php">Iniciar Sesión</a></button>
      			<!--<button type="submit">Iniciar sesión</button>-->
      			<p class="message"><a href="http:\\localhost\turnapp\recuperacion.php">Olvidaste tu contraseña?</a></p>
				  <p class="message"><a href="http:\\localhost\turnapp\registro.php">Registrarse</a></p>
    		</form>
  		</div>
	</div>
</body>
</html>