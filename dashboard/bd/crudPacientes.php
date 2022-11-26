<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$inss = (isset($_POST['inss'])) ? $_POST['inss'] : '';
$primernombre = (isset($_POST['primernombre'])) ? $_POST['primernombre'] : ''; 
$segundonombre = (isset($_POST['segundonombre'])) ? $_POST['segundonombre'] : ''; 
$primerapellido = (isset($_POST['primerapellido'])) ? $_POST['primerapellido'] : ''; 
$segundoapellido = (isset($_POST['segundoapellido'])) ? $_POST['segundoapellido'] : ''; 
switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO paciente(INSS,Nombre1,Nombre2,Apellido1,Apellido2) VALUES('$inss','$primernombre','$segundonombre','$primerapellido','$segundoapellido')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT INSS,Nombre1,Nombre2,Apellido1,Apellido2 FROM paciente ORDER BY INSS DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: //modificación
        $consulta = "UPDATE paciente SET Nombre1='$primernombre',Nombre2='$segundonombre',Apellido1='$primerapellido',Apellido2='$segundoapellido' WHERE INSS='$inss' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT INSS,Nombre1,Nombre2,Apellido1,Apellido2 FROM paciente ORDER BY INSS DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3://baja
        $consulta = "DELETE FROM paciente WHERE INSS='$inss' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;     
        
    case 4:    
        $consulta = "SELECT * FROM paciente";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

?>