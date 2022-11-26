$(document).ready(function(){
    var iddoctor,opcion;
    opcion=4;
    tablaDoctores= $('#tablaDoctores').DataTable({
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
            "url": "bd/crudDoctores.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID_Doctor"},
            {"data": "Nombre1"},
            {"data": "Nombre2"},
            {"data": "Apellido1"},
            {"data": "Apellido2"},
            {"data": "Nombre_especialidad"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
            
        ]
        
    });

    var fila; 
    $('#formDoctores').submit(function(e){                         
        e.preventDefault(); 
        if(opcion=1) {
            iddoctor = $.trim($('#iddoctor').val());
            $("#iddoctor" ).prop( "disabled", false);
            primernombre = $.trim($('#primernombre').val());   
            segundonombre = $.trim($('#segundonombre').val());   
            primerapellido = $.trim($('#primerapellido').val());
            segundoapellido = $.trim($('#segundoapellido').val()); 
            idespecialidad=$.trim($('#idespecialidad').val()); 
                $.ajax({
                  url: "bd/crudDoctores.php",
                  type: "POST",
                  datatype:"json",    
                  data:  {iddoctor:iddoctor,primernombre:primernombre,segundonombre:segundonombre,primerapellido:primerapellido,segundoapellido:segundoapellido,idespecialidad:idespecialidad,opcion:opcion},    
                  success: function(data) {
                    tablaDoctores.ajax.reload(null, false);
                   }
                });
        }else{
            iddoctor = $.trim($('#iddoctor').val());
            $("#iddoctor" ).prop( "disabled", true);
            primernombre = $.trim($('#primernombre').val());   
            segundonombre = $.trim($('#segundonombre').val());   
            primerapellido = $.trim($('#primerapellido').val());
            segundoapellido = $.trim($('#segundoapellido').val()); 
            idespecialidad=$.trim($('#idespecialidad').val()); 
                $.ajax({
                  url: "bd/crudDoctores.php",
                  type: "POST",
                  datatype:"json",    
                  data:  {iddoctor:iddoctor,primernombre:primernombre,segundonombre:segundonombre,primerapellido:primerapellido,segundoapellido:segundoapellido,idespecialidad:idespecialidad,opcion:opcion},    
                  success: function(data) {
                    tablaDoctores.ajax.reload(null, false);
                   }
                });
        }


            
        
        $('#modalCRUD').modal('hide');											     			
    });
            
        
   
    $("#btnNuevo").click(function(){
        opcion = 1;           
        iddoctor=null;
        $("#formDoctores").trigger("reset");
        $("#iddoctor").prop( "disabled", false);
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Agregar Doctor");
        $('#modalCRUD').modal('show');	    
    });
    
         
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;
        fila = $(this).closest("tr");	        
        
        iddoctor = parseInt($(this).closest('tr').find('td:eq(0)').text()) //capturo el ID		            
        
        primernombre = fila.find('td:eq(1)').text();
        segundonombre = fila.find('td:eq(2)').text();
        primerapellido = fila.find('td:eq(3)').text();
        segundoapellido = fila.find('td:eq(4)').text();

        $("#iddoctor").prop( "disabled", true );

        $("#iddoctor").val(iddoctor);
        $("#primernombre").val(primernombre);
        $("#segundonombre").val(segundonombre);
        $("#primerapellido").val(primerapellido);
        $("#segundoapellido").val(segundoapellido);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Doctor");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        iddoctor = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;      
        var respuesta = confirm("¿Está seguro de borrar el registro "+iddoctor+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crudDoctores.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, iddoctor:iddoctor},    
              success: function() {
                  tablaDoctores.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    