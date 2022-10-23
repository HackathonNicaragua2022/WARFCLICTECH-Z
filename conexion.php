<?php
    $conn = new mysqli("localhost","root","82w4WOjl9#I3","turnapp");
    if ($conn->connect_errno)
    {
    	echo "No hay conexión (". $conn->connect_errno . ")", $conn->mysqli_connect_error();
    }
    else
    {
        echo "Conexion exitosa";
    }
?>