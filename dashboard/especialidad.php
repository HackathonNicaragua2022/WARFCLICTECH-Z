<?php require_once "vistas/parte_superior.php"?>
<!--INICIO del cont principal-->
<div class="container">
   <center><h2>GESTIÓN DE ESPECIALIDADES</h2></center>
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
                        <table id="tablaEspecialidades" class="table table-striped table-bordered table-condensed" style="width:100%">
                           <thead class="text-center">
                                <tr>
                                    <th>ID-ESPECIALIDAD</th>
                                    <th>NOMBRE ESPECIALIDAD</th>
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
                    <form id="formEspecialidades"> 
                    <div class="modal-body">
                        

                        <div class="col-md-12">   
                            <div class="form-group">
                                <label for="id_especialidad" class="col-form-label">ID-Especialidad</label>
                                <input type="text" class="form-control" id="id_especialidad">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_especialidad" class="col-form-label">Especialidad</label>
                                <input type="text" class="form-control" id="nombre_especialidad">
                            </div>
                        </div>


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
<script type="text/javascript" src="main_especialidad.js"></script>