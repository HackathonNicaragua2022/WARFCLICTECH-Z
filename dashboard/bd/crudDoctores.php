<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$iddoctor = (isset($_POST['iddoctor'])) ? $_POST['iddoctor'] : '';
$primernombre = (isset($_POST['primernombre'])) ? $_POST['primernombre'] : ''; 
$segundonombre = (isset($_POST['segundonombre'])) ? $_POST['segundonombre'] : ''; 
$primerapellido = (isset($_POST['primerapellido'])) ? $_POST['primerapellido'] : ''; 
$segundoapellido = (isset($_POST['segundoapellido'])) ? $_POST['segundoapellido'] : ''; 
$idespecialidad = (isset($_POST['idespecialidad'])) ? $_POST['idespecialidad'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO doctor(ID_Doctor,Nombre1,Nombre2,Apellido1,Apellido2,ID_Especialidad) VALUES('$iddoctor','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$idespecialidad')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT doctor.ID_Doctor,doctor.Nombre1,doctor.Nombre2,doctor.Apellido1,doctor.Apellido2,especialidad.Nombre_especialidad FROM doctor INNER JOIN especialidad ON doctor.ID_Especialidad=especialidad.ID_Especialidad ORDER BY doctor.ID_Doctor";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: //modificación
        $consulta = "UPDATE doctor SET Nombre1='$primernombre',Nombre2='$segundonombre',Apellido1='$primerapellido',Apellido2='$segundoapellido',ID_Especialidad='$idespecialidad' WHERE ID_Doctor='$iddoctor' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT doctor.ID_Doctor,doctor.Nombre1,doctor.Nombre2,doctor.Apellido1,doctor.Apellido2,especialidad.Nombre_especialidad FROM doctor INNER JOIN especialidad ON doctor.ID_Especialidad=especialidad.ID_Especialidad ORDER BY doctor.ID_Doctor";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3://baja
        $consulta = "DELETE FROM doctor WHERE ID_Doctor='$iddoctor' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        

        $consulta = "SELECT doctor.ID_Doctor,doctor.Nombre1,doctor.Nombre2,doctor.Apellido1,doctor.Apellido2,especialidad.Nombre_especialidad FROM doctor INNER JOIN especialidad ON doctor.ID_Especialidad=especialidad.ID_Especialidad ORDER BY doctor.ID_Doctor";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
        //Carga de registros en el datatable
    case 4:    
        $consulta = "SELECT doctor.ID_Doctor,doctor.Nombre1,doctor.Nombre2,doctor.Apellido1,doctor.Apellido2,especialidad.Nombre_especialidad FROM doctor INNER JOIN especialidad ON doctor.ID_Especialidad=especialidad.ID_Especialidad ORDER BY doctor.ID_Doctor";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    //Verificamos si existe el registro
    case 5:
        $consulta = "SELECT COUNT(*) FROM doctor WHERE ID_Doctor='$iddoctor' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

?>