$(document).ready(function(){
    var idcita,opcion,iddoctor;
    opcion=4;
    iddoctor = $.trim($('#iddoctor').val()); 
    tablaCitas= $('#tablaCitas').DataTable({
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
            "url": "bd/crudcitasxatender.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion,iddoctor:iddoctor}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID_Turn"},
            {"data": "INSS"},
            {"data": "fullname"},
            {"data": "N_turno_asignado"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>assignment_ind</i></div></div>"}
            
        ]
      
    });

    var fila;  
    $("#btnIniciar").click(function(e){
        e.preventDefault(); 
        opcion = 1;
        idcita = $.trim($('#idcita').val());
        numero_inss = $.trim($('#numero_inss').val());   
        nombre_paciente = $.trim($('#nombre_paciente').val());   
        turno = $.trim($('#turno').val());

        var dt = new Date();
        var Hora_Inicio = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    	
        $.ajax({
            url: "bd/crudcitasxatender.php",
            type: "POST",
            datatype:"json",    
            data:  {idcita:idcita,Hora_Inicio:Hora_Inicio,opcion:opcion},    
            success: function(data) {
              tablaCitas.ajax.reload(null, false);
             }
          });	
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Consulta medica iniciada',
            showConfirmButton: false,
            timer: 1500
          })

        return false;
    });
   
    $("#btnTerminar").click(function(e){
        e.preventDefault(); 
        opcion = 2;
        idcita = $.trim($('#idcita').val());
        numero_inss = $.trim($('#numero_inss').val());   
        nombre_paciente = $.trim($('#nombre_paciente').val());   
        turno = $.trim($('#turno').val());

        var dt = new Date();
        var Hora_Fin = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    	
        $.ajax({
            url: "bd/crudcitasxatender.php",
            type: "POST",
            datatype:"json",    
            data:  {idcita:idcita,Hora_Fin:Hora_Fin,opcion:opcion},    
            success: function(data) {
              tablaCitas.ajax.reload(null, false);
             }
          });	
        $('#modalCRUD').modal('hide');
        return false;
        
    });

      
    $(document).on("click", ".btnEditar", function(){		        
        //opcion = 2;
        fila = $(this).closest("tr");	        
        
        idcita = parseInt($(this).closest('tr').find('td:eq(0)').text()) //capturo el ID		                 
        numero_inss = fila.find('td:eq(1)').text();
        nombre_paciente = fila.find('td:eq(2)').text();
        turno = fila.find('td:eq(3)').text();
  
        $("#idcita").val(idcita);
        $("#numero_inss").val(numero_inss);
        $("#nombre_paciente").val(nombre_paciente);
        $("#turno").val(turno);
 
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Consulta del Paciente");		
        $('#modalCRUD').modal('show');		   
    });
             
    });    