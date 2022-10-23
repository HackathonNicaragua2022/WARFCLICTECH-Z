<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include("conexion.php");?>
	<div class="paginaentrada">
  		<div  class="form">
      			<input id="txt_usuario" name="txt_usuario" type="text" placeholder="Numero de INSS del paciente"/>
                  <label for="standard-select">Salas / Especialidades</label>
                  <br>
                    <div class="select">
                        <select id="standard-select">
                        <option value="Option 1">Medicina General 1</option>
                        <option value="Option 2">Medicina General 2</option>
                        <option value="Option 3">Medicina General 3</option>
                        <option value="Option 4">Medicina General 4</option>
                        <option value="Option 5">Ginecologia</option>
                        <option value="Option 6">Medicina Interna 1</option>
                        <option value="Option 7">Medicina Interna 2</option>
                        <option value="Option 7">Urología</option>
                        </select>
                    </div>
      			<button type="submit">Aprobar Cita (Turno)</button>
      			<!--<p class="message"><a href="#">Olvidaste tu contraseña?</a></p>-->
    		</form>
            <caption name = "numeroturno">El numero de turno que corresponde</caption>
            <caption name= "numero">$Numeroturno</caption>
            <br>
            <?php 
                $horayfecha = time();
                echo date("d-m-Y (H:i:s)", $horayfecha);           
            ?>
  		</div>
	</div>
</body>
</html>