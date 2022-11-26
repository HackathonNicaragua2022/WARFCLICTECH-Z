<?php require_once "vistas/parte_superior.php"?>
<!--INICIO del cont principal-->
<div class="container">
   <center><h2>GESTIÓN DE PACIENTES</h2></center>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">library_add</i>
                    </button>
                </div>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaPacientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                           <thead class="text-center">
                                <tr>
                                    <th>Nº INSS</th>
                                    <th>PRIMER NOMBRE</th>
                                    <th>SEGUNDO NOMBRE</th>
                                    <th>PRIMER APELLIDO</th>
                                    <th>SEGUNDO APELLIDO</th>
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
                    <form id="formPacientes"> 
                    <div class="modal-body">
                    <div class="row"> <!-- Aqui inicia la Fila -->                   
                        <div class="col-md-12">   
                            <div class="form-group">
                                <label for="inss" class="col-form-label">Nº INSS</label>
                                <input type="text" class="form-control" id="inss">
                            </div>
                        </div>

                        <div class="col-md-6">   
                            <div class="form-group">
                                <label for="primernombre" class="col-form-label">Primer Nombre</label>
                                <input type="text" class="form-control" id="primernombre">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="segundonombre" class="col-form-label">Segundo Nombre</label>
                                <input type="text" class="form-control" id="segundonombre">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primerapellido" class="col-form-label">Primer Apellido</label>
                                <input type="text" class="form-control" id="primerapellido">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="segundoapellido" class="col-form-label">Segundo Apellido</label>
                                <input type="text" class="form-control" id="segundoapellido">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usuario" class="col-form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="col-form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>

                        </div><!-- Aqui termina la Fila -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
</div>
<!--FIN del cont principal--> 

<?php require_once "vistas/parte_inferior.php"; ?>
<script type="text/javascript" src="main_paciente.js"></script>