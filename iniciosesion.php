<?php
    include("conexion.php");
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $usuario=mysqli_real_escape_string($conn,$_POST["txt_usuario"]);
        $pass=mysqli_real_escape_string($conn,$_POST["txt_pass"]);

        $sql = "SELECT * from usuario where Id_usuario = '$usuario' and pass = '$pass'";
        $resultado = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        /*$active = $row['active'];*/
        $count = mysqli_num_rows($resultado);
        if ($count == 1) {
            session_register("$usuario");
            $_SESSION['login_user'] = $usuario;
            echo "Bienvenido";
        }    
      else {
         Echo "Usuario o contraseña no existen";
      }
    }  
?>