<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idcita = (isset($_POST['idcita'])) ? $_POST['idcita'] : '';
$Hora_Inicio = (isset($_POST['Hora_Inicio'])) ? $_POST['Hora_Inicio'] : '';
$Hora_Fin = (isset($_POST['Hora_Fin'])) ? $_POST['Hora_Fin'] : '';
$iddoctor = (isset($_POST['iddoctor'])) ? $_POST['iddoctor'] : '';
$Fecha=date('Y-m-d');

switch($opcion){
    case 1:
        $consulta = "UPDATE cita_medica SET Hora_Inicio='$Hora_Inicio' WHERE ID_Turn='$idcita' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        $consulta = "SELECT cita_medica.ID_Turn,cita_medica.INSS,CONCAT(paciente.Nombre1,' ',paciente.Nombre2,' ',paciente.Apellido1,' ',paciente.Apellido2)AS fullname,cita_medica.N_turno_asignado FROM cita_medica INNER JOIN paciente ON cita_medica.INSS=paciente.INSS WHERE cita_medica.Fecha='$Fecha' AND cita_medica.finalizada=0 AND cita_medica.ID_Doctor='$iddoctor'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: 
        $consulta = "UPDATE cita_medica SET Hora_Fin='$Hora_Fin',finalizada=1 WHERE ID_Turn='$idcita' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();         
        
        $consulta = "SELECT cita_medica.ID_Turn,cita_medica.INSS,CONCAT(paciente.Nombre1,' ',paciente.Nombre2,' ',paciente.Apellido1,' ',paciente.Apellido2)AS fullname,cita_medica.N_turno_asignado FROM cita_medica INNER JOIN paciente ON cita_medica.INSS=paciente.INSS WHERE cita_medica.Fecha='$Fecha' AND cita_medica.finalizada=0 AND cita_medica.ID_Doctor='$iddoctor'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
    case 4:    
        $consulta = "SELECT cita_medica.ID_Turn,cita_medica.INSS,CONCAT(paciente.Nombre1,' ',paciente.Nombre2,' ',paciente.Apellido1,' ',paciente.Apellido2)AS fullname,cita_medica.N_turno_asignado FROM cita_medica INNER JOIN paciente ON cita_medica.INSS=paciente.INSS WHERE cita_medica.Fecha='$Fecha' AND cita_medica.finalizada=0 AND cita_medica.ID_Doctor='$iddoctor'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); 
$conexion = NULL;

?>