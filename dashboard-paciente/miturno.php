<?php require_once "vistas/parte_superior.php"?>
<?php 


include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$Fecha=date('Y-m-d');
$INSS=$_SESSION["INSS"];


$consulta = "SELECT cita_medica.ID_Doctor,especialidad.Nombre_especialidad,CONCAT(doctor.Nombre1,' ',doctor.Apellido1) AS nombredoctor,N_turno_asignado FROM cita_medica INNER JOIN doctor ON cita_medica.ID_Doctor=doctor.ID_Doctor INNER JOIN especialidad ON cita_medica.ID_Especialidad=especialidad.ID_Especialidad WHERE cita_medica.Fecha='$Fecha' AND cita_medica.finalizada=0 AND INSS='$INSS'";
$resultado = $conexion->prepare($consulta);

$resultado->execute(); 
$iddoctor=$resultado->fetchColumn(0); 

$resultado->execute(); 
$especialidad=$resultado->fetchColumn(1); 

$resultado->execute(); 
$nombredoctor=$resultado->fetchColumn(2); 

$resultado->execute(); 
$turno=$resultado->fetchColumn(3); 
?>
<!--INICIO del cont principal-->
<div class="container">
        <input type="hidden" id="doctor" value="<?php echo $iddoctor; ?>">
        <input type="hidden" id="fecha" value="<?php echo $Fecha; ?>">
        <center>
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header bg-success"><h5>TIENES CITA CON EL DOCTOR <?php echo strtoupper($nombredoctor); ?></h5></div>
                <div class="card-body">
                <h5 class="card-title"><?php echo strtoupper($especialidad)." TURNO Nº".$turno ;?></h5>
                <p class="card-text">ACTUALMENTE SIENDO ATENDIDO EL TURNO</p>
                <p class="card-text" id="MyTurn"></p>
            </div>
        </div>
        </center>
</div>
<!--FIN del cont principal--> 
<?php require_once "vistas/parte_inferior.php"; ?>
<script type="text/javascript" src="miturno.js"></script>