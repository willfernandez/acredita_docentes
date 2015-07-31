$(document).on("ready", inicio);


function inicio(){
	$.ajax({
	        type:"POST",
	        url: "cAsignacion.php",
	        data: "boton=listarAsig",
	       success: function(html){
              if(html != ''){
                $('#Lasignacion').html(html);
                 $('#tasig').dataTable( {
                  "sPaginationType": "bootstrap",
                  "sDom": "<'row'<'span5'l><'span6'f>r>t<'row'<'span8'i><'span9'p>>"
                } );
              }else{
                alert("ERROR EN GUARDAR")
              }
            } 
       });
}