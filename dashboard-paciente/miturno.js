$(document).ready(function(){
$(function() {
    startRefresh();
});

function startRefresh() {
    var doctor=$("#doctor").val();
    var fecha=$("#fecha").val();
    setTimeout(startRefresh,1000);
    $.get('bd/crudcitas.php?opcion=5&doctor='+doctor+'&fecha='+fecha, function(data) {
        $('#MyTurn').html(data.replace(/['"]+/g,''));    
    });
 }
 
});  