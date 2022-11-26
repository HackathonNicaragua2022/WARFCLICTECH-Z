<?php
   
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    // Recepción de los datos enviados mediante POST desde el JS
    $opcion = (isset($_GET['opcion'])) ? $_GET['opcion'] : '';
    $elemento = (isset($_GET['elemento'])) ? $_GET['elemento'] : '';

    $especialidad = (isset($_GET['especialidad'])) ? $_GET['especialidad'] : '';
    $doctor = (isset($_GET['doctor'])) ? $_GET['doctor'] : '';
    $fecha = (isset($_GET['fecha'])) ? $_GET['fecha'] : '';
    $numero_inss = (isset($_GET['numero_inss'])) ? $_GET['numero_inss'] : '';
    $turno = (isset($_GET['turno'])) ? $_GET['turno'] : '';

    switch($opcion){
        case 1: 
            $consulta = "SELECT ID_Doctor,CONCAT(Nombre1,' ',Nombre2,' ',Apellido1,' ',Apellido2)AS nombrecompleto FROM doctor WHERE ID_Especialidad='$elemento' ORDER BY ID_Doctor ASC";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $dat) { 
?>
                <option value="<?php echo $dat['ID_Doctor'] ?>"><?php echo $dat['nombrecompleto']?></option>
                
<?php
             } 
            break;
        case 2:
            $consulta = "SELECT COUNT(*) FROM cita_medica WHERE ID_Especialidad='$especialidad' AND ID_Doctor='$doctor' AND Fecha='$fecha'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            //$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            $data=implode(", ",$resultado->fetchAll(PDO::FETCH_COLUMN, 0));
            break;
         case 3:
            $consulta = "INSERT INTO cita_medica(Fecha,INSS,N_turno_asignado,ID_Doctor,ID_Especialidad) VALUES('$fecha','$numero_inss','$turno','$doctor','$especialidad')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 4:
            $consulta = "SELECT COUNT(*) FROM cita_medica WHERE INSS='$numero_inss' AND Fecha='$fecha'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            //$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            $data=implode(", ",$resultado->fetchAll(PDO::FETCH_COLUMN, 0));
            break;
        case 5:
            $consulta = "SELECT N_turno_asignado FROM cita_medica WHERE ID_Doctor='$doctor' AND Fecha='$fecha' AND finalizada=0 ORDER BY N_turno_asignado LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=implode(", ",$resultado->fetchAll(PDO::FETCH_COLUMN, 0));
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
    $conexion = NULL;
    
  
?>