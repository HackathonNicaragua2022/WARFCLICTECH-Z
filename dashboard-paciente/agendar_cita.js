var CompararSiHayCita;
$('#formDoctores').submit(function(e){   
    e.preventDefault(); 
});


//Para que se recarge en combo con los doctores de especialidad seleccionada
$("#especialidad").change(function(){
    var x = $("#especialidad").val();
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","bd/crudcitas.php?opcion=1&elemento="+x,false);
    xmlhttp.send(null);
    $("#doctor").html(xmlhttp.responseText);
    return false
});


//Aqui Guardamos la cita una vez que seleccionamos la fecha
$("#btnAgendarCita").click(function(){ 
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();   
    var fechaActual = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

    var tmpespecialidad=$("#especialidad").val();
    var especialidad=tmpespecialidad.replace(/(\r\n|\n|\r)/gm, "")
    var doctor=$("#doctor").val();
    var fecha=$("#fecha").val();
    var inss=$("#numero_inss").val(); 
    var texto,tmp,tmpN;

    //Validamos que tenga la fecha seleccionada
    if(fecha<fechaActual){
        Swal.fire({
            type:'error',
            title:'Selecciona una fecha correcta',
        });
    }else{
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","bd/crudcitas.php?opcion=2&especialidad="+especialidad+"&doctor="+doctor+"&fecha="+fecha,false);
        xmlhttp.send(null);
        texto=xmlhttp.responseText;
        tmp=parseInt($.trim(texto.replace(/['"]+/g, '')))+1;

        //Verificamos si hay 20 pacientes
        if(tmp>20){
            Swal.fire({
                type:'error',
                title:'Numero de pacientes limite para esa fecha',
            });
        
        //sino hay 20 pacientes entonces guardamos
        }else{
            //Sacamos que turno nos toca el dia de la cita con el medico           
     
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","bd/crudcitas.php?opcion=4&fecha="+fecha+"&numero_inss="+inss,false);
            xmlhttp.send(null);                           
            texto=xmlhttp.responseText;
            tmpN=$.trim(texto.replace(/['"]+/g, ''))
            CompararSiHayCita=tmpN;

            if(CompararSiHayCita>0){
                Swal.fire({
                    type:'error',
                    title:'Ya tienes una cita para esta fecha',
                });
            }else{
                
                xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","bd/crudcitas.php?opcion=3&especialidad="+especialidad+"&doctor="+doctor+"&fecha="+fecha+"&numero_inss="+inss+"&turno="+tmp,false);
                xmlhttp.send(null);
                texto=xmlhttp.responseText;
                
                Swal.fire(
                    'Buen trabajo!',
                    'La cita fue generada correctamente con la especialidad de '+$('select[name="especialidad"] option:selected').text()+' para el dia '+fecha+' y su turno es el Nº'+tmp,
                    'success'
                  )
            }  
            
            
        }
    }
    return false;
});


//Aqui Consultamos que lugar podriamos tener en la cita
$("#btnConsultarCita").click(function(){    
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();   
        var fechaActual = d.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;

        var especialidad=$("#especialidad").val();
        var inss=$("#numero_inss").val(); 
        var doctor=$("#doctor").val();
        var fecha=$("#fecha").val();
        var texto,tmp;

        if(fecha<fechaActual){
            Swal.fire({
                type:'error',
                title:'Selecciona una fecha correcta',
            });
        }else{

            xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","bd/crudcitas.php?opcion=4&fecha="+fecha+"&numero_inss="+inss,false);
            xmlhttp.send(null);                           
            texto=xmlhttp.responseText;
            tmpN=$.trim(texto.replace(/['"]+/g, ''))
            CompararSiHayCita=tmpN;
        ;
            if(CompararSiHayCita>0){
                Swal.fire({
                    type:'error',
                    title:'Ya tienes una cita para esta fecha',
                });
            }else{
                xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","bd/crudcitas.php?opcion=2&especialidad="+especialidad+"&doctor="+doctor+"&fecha="+fecha,false);
                xmlhttp.send(null);
                texto=xmlhttp.responseText;
                tmp=$.trim(texto.replace(/['"]+/g, ''))
                $("#turno").val(parseInt(tmp)+1);
                var MiTurno=$("#turno").val(); 
                Swal.fire(
                    'Consulta Exitosa!',
                    'Tu turno para la cita es: '+MiTurno,
                    'success'
                  )
            }
        }
    return false;
});

//Funcion para verificar si el paciente ya realizó la cita para ese mismo dia
