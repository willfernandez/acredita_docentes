$(document).on("ready", cargarCombos);

function cargarCombos(){
	cargarEncuestas();
	cargarSedes()
	cargarFacultads();
}
function cargarSedes(){
		$.ajax({
	        type:"POST",
	        url: "cbxSede.php",
	       success: function(html){
              if(html != ''){
                $('#cSede').html(html);
              }else{
                alert("ERROR EN GUARDAR")
              }
            } 
       });
}
function cargarFacultads(){
		$.ajax({
	        type:"POST",
	        url: "cbxFacultad.php",
	       success: function(html){
              if(html != ''){
                $('#cFacultad').html(html);
              }else{
                alert("ERROR EN GUARDAR")
              }
            } 
       });
}
function cargarCarreras(idFAc){
	$.ajax({
	        type:"POST",
	        url: "cbxEscuela.php",
	        data: "idFAc="+idFAc,
	       success: function(html){
              if(html != ''){
                $('#cEscuela').html(html);
              }else{
                alert("ERROR EN GUARDAR")
              }
            } 
       });

}
function cargarCiclos(){
		 $('#cCiclo').html('');
 form='<div class="input select">';
 form+='<label for="AsignacioneCicloId">Ciclo</label>';
 form+='<select id="AsignacioneCicloId" class="span4" required="1" name="data[Asignacione][ciclo_id]">';
 form+='<option value="">Seleccione</option>';
 form+='<option value="01">I ciclo</option>';
 form+='<option value="02">II ciclo</option>';
 form+='<option value="03">III ciclo</option>';
 form+='<option value="04">IV ciclo</option>';
 form+='<option value="05">V ciclo</option>';
 form+='<option value="06">VI ciclo</option><option value="07">VII ciclo</option><option value="08">VIII ciclo</option><option value="09">IX ciclo</option><option value="10">X ciclo</option>';
 facultad_id = $("#facultad_id").val();
 escuela_id=$('#escuela_id').val();
 if(facultad_id=='02' && escuela_id=='02'){
 form+='<option value="11">XI ciclo</option>';
 form+='<option value="12">XII ciclo</option></select></div>';
 }
 if(facultad_id=='03' && escuela_id=='03'){
 form+='<option value="11">XI ciclo</option>';
 form+='<option value="12">XII ciclo</option></select></div>';
 }

 $('#cCiclo').html(form);
}
function cargarEncuestas(){
	 $.ajax({
        type:"POST",
        url: "cbxEncuesta.php",
       success: function(html){
              if(html != ''){
                $('#cEncuesta').html(html);
              }else{
                alert("ERROR EN GUARDAR")
              }
            } 
       });
}

function guardarAsignacion(){
  var encuesta_id = $("#encuesta_id").val();
  if(encuesta_id=='')
  {
    alert("Seleccione una encuesta")
    document.getElementById('encuesta_id').className = ':required vanadium-invalid';
    return false;
  }

  var YYAKD = $('#YYAKD').val();
  if(YYAKD=='')
  {
    alert("Seleccione un año")
    document.getElementById('YYAKD').className = ':required vanadium-invalid';
    return false;
  }

  var CODPER = $('#CODPER').val();
  if(CODPER=='')
  {
    alert("Seleccione un periodo")
    document.getElementById('CODPER').className = ':required vanadium-invalid';
    return false;
  }

   var fechaI = $('#fechaI').val();
  if(fechaI=='')
  {
    alert("Seleccione una fecha de inicio")
    document.getElementById('fechaI').className = ':required vanadium-invalid';
    return false;
  }

  var fechaF = $('#fechaF').val();
  if(fechaF=='')
  {
    alert("Seleccione una fecha de fin")
    document.getElementById('fechaF').className = ':required vanadium-invalid';
    return false;
  }

var sede_id = $('#sede_id').val();
  if(sede_id=='')
  {
    alert("Seleccione una sede")
    document.getElementById('sede_id').className = ':required vanadium-invalid';
    return false;
  }
  
var facultad_id = $('#facultad_id').val();
  if(facultad_id=='')
  {
    alert("Seleccione una facultad")
    document.getElementById('facultad_id').className = ':required vanadium-invalid';
    return false;
  }
  var escuela_id = $('#escuela_id').val();
  if(escuela_id=='')
  {
    alert("Seleccione una carrera")
    document.getElementById('escuela_id').className = ':required vanadium-invalid';
    return false;
  }

  var ciclo_id = $('#AsignacioneCicloId').val();
  if(ciclo_id=='')
  {
    alert("Seleccione un ciclo")
    document.getElementById('AsignacioneCicloId').className = ':required vanadium-invalid';
    return false;
  }

  var datos = "encuesta_id="+encuesta_id+"&YYAKD="+YYAKD+"&CODPER="+CODPER+"&fechaI="+fechaI+"&fechaF="+fechaF+"&sede_id="+sede_id+"&facultad_id="+facultad_id+"&escuela_id="+escuela_id+"&ciclo_id="+ciclo_id+"&boton=GuardarAsig";
  $.ajax({
        type:"POST",
        url: "cAsignacion.php",
        data : datos,
       success: function(html){
              if(html != ''){
                alert("Datos Guardados")
                alert("Si ud. desea podrá reutilizar el formulario con los datos de la operacion anterior")
                alert("Para salir de click en el boton TERMINAR")
              }else{
                alert("ERROR EN GUARDAR")
              }
            } 
       });
}