$(document).ready(function(){
    var id_especialidad,opcion;
    opcion=4;
    tablaEspecialidades= $('#tablaEspecialidades').DataTable({
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
            "url": "bd/crudEspecialidad.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID_Especialidad"},
            {"data": "Nombre_especialidad"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
            
        ]
        
    });

    var fila; 
    $('#formEspecialidades').submit(function(e){                         
        e.preventDefault(); 
        id_especialidad = $.trim($('#id_especialidad').val());
        nombre_especialidad= $.trim($('#nombre_especialidad').val());   

            $.ajax({
              url: "bd/crudEspecialidad.php",
              type: "POST",
              datatype:"json",    
              data:  {id_especialidad:id_especialidad,nombre_especialidad:nombre_especialidad,opcion:opcion},    
              success: function(data) {
                tablaEspecialidades.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
        
   
    $("#btnNuevo").click(function(){
        opcion = 1;           
        id_especialidad=null;
        $("#formEspecialidades").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Agregar Especialidad");
        $('#modalCRUD').modal('show');	    
    });
    
         
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;
        fila = $(this).closest("tr");	        
        
        id_especialidad = ($(this).closest('tr').find('td:eq(0)').text()) //capturo el ID		                 
        nombre_especialidad= fila.find('td:eq(1)').text();


        $("#id_especialidad").val(id_especialidad);
        $("#nombre_especialidad").val(nombre_especialidad);


        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Especialidad");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id_especialidad = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;      
        var respuesta = confirm("¿Está seguro de borrar el registro "+id_especialidad+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crudEspecialidad.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id_especialidad:id_especialidad},    
              success: function() {
                  tablaEspecialidades.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    