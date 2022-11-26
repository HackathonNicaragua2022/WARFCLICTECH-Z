<?php require_once "vistas/parte_superior.php"?>

<!-- Inicio del contenido principal-->
<div class="container-fluid">

    <!--   <h1>CONTENIDO PRINCIPAL</h1> -->
    <center>
        <h1>BIENVENIDO DR(A). <?php echo strtoupper($_SESSION["s_usuario"]);?></h1>
    </center>
              
    <div class="row justify-content-md-center">
                        <div class="col-md-4 col-md-2 mb-2" style="display: <?php //echo $_SESSION['clientes'];?>;">
                        <a  href="citas_pacientes.php" style="text-decoration:none">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="h6 text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <h5>PACIENTES PARA HOY</h5></div>
                                             </div>
                                              <div class="col-auto">
                                                <i class="fa fa-medkit fa-4x text-danger"></i>
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