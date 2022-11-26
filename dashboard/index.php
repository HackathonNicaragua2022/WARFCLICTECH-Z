<?php require_once "vistas/parte_superior.php"?>

<!-- Inicio del contenido principal-->
<div class="container-fluid">
    <!--    <h1>CONTENIDO PRINCIPAL</h1> -->
            <center>
                <h1>BIENVENIDO ADMIN. <?php echo strtoupper($_SESSION["s_usuario"]);?></h1>
            </center>
    <div class="row justify-content-md-center">

                    <div class="col-md-5 col-md-2 mb-2" style="display: <?php echo $_SESSION['traslados'];?>;">
                        <a class="collapse-item" href="paciente.php" style="text-decoration:none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               <h5>GESTIÓN DE PACIENTES</h5></div> 
                                            </div>
                                             <div class="col-auto">
                                                <i class="fa fa-users fa-4x text-danger"></i>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                        <div class="col-md-5 col-md-2 mb-2" style="display: <?php //echo $_SESSION['devoluciones'];?>;">
                        <a  class="collapse-item" href="doctor.php" style="text-decoration:none">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <h5>GESTIÓN DE MEDICOS</h5></div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user-md fa-4x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                        <div class="col-md-5 col-md-2 mb-2" style="display: <?php //echo $_SESSION['facturacion'];?>;">
                        <a class="collapse-item" href="especialidad.php" style="text-decoration:none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               <h5>GESTIÓN DE ESPECIALIDADES</h5></div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-stethoscope fa-4x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-md-5 col-md-2 mb-2" style="display: <?php //echo $_SESSION['glosario'];?>;">
                        <a  href="#" style="text-decoration:none">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <h5>GESTIÓN DE USUARIOS</h5></div>
                                             </div>
                                              <div class="col-auto">
                                                <i class="fa fa-user-secret fa-4x text-danger"></i>
                                              </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                        <div class="col-md-5 col-md-2 mb-2" style="display: <?php //echo $_SESSION['clientes'];?>;">
                        <a  href="#" style="text-decoration:none">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <h5>GESTIÓN DE CITAS MEDICAS</h5></div>
                                             </div>
                                              <div class="col-auto">
                                                <i class="fa fa-medkit fa-4x text-danger"></i>
                                              </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                        <div class="col-md-5 col-md-2 mb-2" style="display: <?php //echo $_SESSION['producto'];?>;">
                        <a  href="#" style="text-decoration:none">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <h5>GESTIÓN DE TIPOS DE USUARIOS</h5></div>
                                             </div>
                                              <div class="col-auto">
                                               
                                                <i class="fa fa-address-book fa-4x text-danger"></i>
                                              </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                    </div>    

</div>                      
  

  
<!-- Fin del contenido principal-->
<!-- <script> Swal.fire('Good job!','You clicked the button!','success')</script> -->

<?php require_once "vistas/parte_inferior.php"?>