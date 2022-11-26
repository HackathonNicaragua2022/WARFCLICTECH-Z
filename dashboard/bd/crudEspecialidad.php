<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_especialidad = (isset($_POST['id_especialidad'])) ? $_POST['id_especialidad'] : '';
$nombre_especialidad = (isset($_POST['nombre_especialidad'])) ? $_POST['nombre_especialidad'] : ''; 
 
switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO especialidad(Nombre_especialidad) VALUES('$nombre_especialidad')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT ID_Especialidad,Nombre_especialidad FROM especialidad ORDER BY ID_Especialidad DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: //modificación
        $consulta = "UPDATE especialidad SET Nombre_especialidad='$nombre_especialidad' WHERE ID_Especialidad='$id_especialidad' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT ID_Especialidad,Nombre_especialidad FROM especialidad ORDER BY ID_Especialidad DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3://baja
        $consulta = "DELETE FROM especialidad WHERE ID_Especialidad='$id_especialidad' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;     
        
    case 4:    
        $consulta = "SELECT * FROM especialidad";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

?>