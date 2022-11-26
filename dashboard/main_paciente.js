$(document).ready(function(){
    var inss,opcion;
    opcion=4;
    tablaPacientes= $('#tablaPacientes').DataTable({
        "language":{
            "lengthMenu"  :"Mostrar _MENU_ Registros",
            "zeroRecords" :"No se encontraron resultados",
            "info"        :"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty"   :"Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered":"(Filtrando de un total de _MAX_ registros)",
            "sSearch"     :"Buscar",
            "oPaginate"   :{
                    "sFirst":"Primero",
                    "sLast" :"último",
                    "sNext" :"Siguiente",
                    "sPrevious" :"Anterior",
            },
            "sProcessing" :"Procesando"
    },
        "ajax":{            
            "url": "bd/crudPacientes.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "INSS"},
            {"data": "Nombre1"},
            {"data": "Nombre2"},
            {"data": "Apellido1"},
            {"data": "Apellido2"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
            
        ]
        
    });

    var fila; 
    $('#formPacientes').submit(function(e){                         
        e.preventDefault(); 
        inss = $.trim($('#inss').val());
        primernombre = $.trim($('#primernombre').val());   
        segundonombre = $.trim($('#segundonombre').val());   
        primerapellido = $.trim($('#primerapellido').val());
        segundoapellido = $.trim($('#segundoapellido').val()); 
            $.ajax({
              url: "bd/crudPacientes.php",
              type: "POST",
              datatype:"json",    
              data:  {inss:inss,primernombre:primernombre,segundonombre:segundonombre,primerapellido:primerapellido,segundoapellido:segundoapellido,opcion:opcion},    
              success: function(data) {
                tablaPacientes.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
        
   
    $("#btnNuevo").click(function(){
        opcion = 1;           
        inss=null;
        $("#formPacientes").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Agregar Paciente");
        $('#modalCRUD').modal('show');	    
    });
    
         
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;
        fila = $(this).closest("tr");	        
        
        inss = ($(this).closest('tr').find('td:eq(0)').text()) //capturo el ID		                 
        primernombre = fila.find('td:eq(1)').text();
        segundonombre = fila.find('td:eq(2)').text();
        primerapellido = fila.find('td:eq(3)').text();
        segundoapellido = fila.find('td:eq(4)').text();

        $("#inss").val(inss);
        $("#primernombre").val(primernombre);
        $("#segundonombre").val(segundonombre);
        $("#primerapellido").val(primerapellido);
        $("#segundoapellido").val(segundoapellido);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Paciente");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        inss = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;      
        var respuesta = confirm("¿Está seguro de borrar el registro "+inss+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crudPacientes.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, inss:inss},    
              success: function() {
                  tablaPacientes.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    