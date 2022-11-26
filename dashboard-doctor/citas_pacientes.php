<?php require_once "vistas/parte_superior.php"?>
<!--INICIO del cont principal-->
<div class="container">
   <center><h2>GESTIÓN DE CITAS MEDICAS PENDIENTES </h2> <?PHP echo date('Y-m-d'); ?> </center>
   <?PHP echo date_default_timezone_get(); ?>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <!-- 
                    <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">library_add</i>
                    </button> -->

                </div>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaCitas" class="table table-striped table-bordered table-condensed" style="width:100%">
                           <thead class="text-center">
                                <tr>
                                    <th>ID-CITA</th>
                                    <th>Nº INSS</th>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>Nº TURNO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario Modal-->
        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formCitas"> 
                    <div class="modal-body">
                        

                        <div class="col-md-12">   
                            <div class="form-group">
                                <label for="idcita" class="col-form-label">ID-CITA</label>
                                <input type="text" class="form-control" id="idcita" readonly>
                                <input type="hidden" class="form-control" id="iddoctor"  value="<?PHP echo $_SESSION["IDDOCTOR"]; ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">   
                            <div class="form-group">
                                <label for="numero_inss" class="col-form-label">Nº INSS</label>
                                <input type="text" class="form-control" id="numero_inss" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_paciente" class="col-form-label">NOMBRE DEL PACIENTE</label>
                                <input type="text" class="form-control" id="nombre_paciente" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="turno" class="col-form-label">Nº TURNO</label>
                                <input type="text" class="form-control" id="turno" readonly>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnIniciar" class="btn btn-primary">Iniciar Consulta</button>
                            <button type="submit" id="btnTerminar" class="btn btn-success">Finalizar Consulta</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
</div>
<!--FIN del cont principal--> 

<?php require_once "vistas/parte_inferior.php"; ?>
<script type="text/javascript" src="citas_pacientes.js"></script>