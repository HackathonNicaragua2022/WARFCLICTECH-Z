<?php
    $conn = new mysqli("localhost","root","","turnapp");
    if ($conn->connect_errno){
    	echo "No hay conexión (". $conn->connect_errno . ")", $conn->mysqli_connect_error();
    }
    else{
        echo "Conexion exitosa"
    }
?>