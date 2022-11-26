<?php require_once "vistas/parte_superior.php"?>
<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT ID_Especialidad,Nombre_especialidad FROM especialidad";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$consulta2 = "SELECT ID_Doctor,CONCAT(Nombre1,' ',Nombre2,' ',Apellido1,' ',Apellido2)AS nombrecompleto FROM doctor";
$resultado2 = $conexion->prepare($consulta2);
$resultado2->execute();
$data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);

?>

<!--INICIO del cont principal-->
        <div class="container">
            <form id="formCita" method="get">
                <div class="form-group row">
                    <label for="numero_inss" class="col-sm-2 col-form-label">Nº INSS</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="numero_inss" placeholder="Nº INSS" value="<?php echo htmlspecialchars($_SESSION['INSS']);?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nombre_paciente" class="col-sm-2 col-form-label">Nombres y Apellidos</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre_paciente" placeholder="Nombre del Paciente" value="<?php echo htmlspecialchars($_SESSION['s_usuario']);?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="especialidad" class="col-sm-2 col-form-label">Especialidad</label>
                    <div class="col-sm-10">
                        <select class="combobox form-control" id="especialidad" name="especialidad">
                            <?php foreach($data as $dat) { ?>
                            <option value="<?php echo $dat['ID_Especialidad'] ?>"><?php echo $dat['Nombre_especialidad'] ?></option>
                            <?php } ?>
                        </select>                    
                    </div>
                </div>



                <div class="form-group row">
                    <label for="doctor" class="col-sm-2 col-form-label">Doctor</label>
                    <div class="col-sm-10">
                        <select class="combobox form-control" id="doctor" name="doctor">
                            <?php foreach($data2 as $dat) { ?>
                                <option value="<?php echo $dat['ID_Doctor'] ?>"><?php echo $dat['nombrecompleto'] ?></option>
                            <?php } ?>
                        </select>                    
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="fecha" min="1990-01-01" max="2100-12-31" required pattern="\d{4}-\d{2}-\d{2}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="turno" class="col-sm-2 col-form-label">Su turno</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="turno" placeholder="" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm" id="btnAgendarCita">Agendar Cita</button>
                        <button type="submit" class="btn btn-secondary btn-sm" id="btnConsultarCita">Consultar Cita</button>
                    </div>


                </div>

            </form>
        </div>
<!--FIN del cont principal--> 

<?php require_once "vistas/parte_inferior.php"; ?>

<script type="text/javascript" src="agendar_cita.js"></script>
