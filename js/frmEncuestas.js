function GuardarEncuesta()
{
	var tituloE = $("#tituloE").val();
  if(tituloE=='')
  {
    document.getElementById('tituloE').className = 'span7 :required vanadium-invalid';
    return false;
  }
	var idEncuesta = $("#idEncuesta").val();
	var datos = "tituloE="+tituloE+"&idEncuesta="+idEncuesta+"&boton=nuevaE";

    $.ajax({
        type:"POST",
        url: "cEncuestas.php",
        data: datos,
       success: function(html){
              if(html != ''){
                $('#idEncuesta').val(html);
                preguntas(tituloE);
              }else{
                alert("ERROR EN GUARDAR")
              }

            } 
       });
}

function preguntas(tituloE)
{
    $('#titles').hide('slow')
  form='<h3>Agregando Preguntas</h3>';
  form+='<p>Desde aquí Ud. puede agregar preguntas a la presente encuesta</p>';
  form+='<p><span class="label label-info">Encuesta</span>'+tituloE+'</p>';
  form+='<p><a class="btn btn-primary" href="#agregarPregunta" data-toggle="modal">Agregar Pregunta</a></p>';
  $('#titles').html(form);
  $('#titles').show('slow');
  $('#Nencuesta').hide('slow');
}

function guardarPregunta(){
   var idEncuesta = $('#idEncuesta').val();
   var dimension = $('#dimension').val();
  if(dimension=='')
  {
    alert("falta seleccionar la dimensión")
    return false;
  }
   var formP = $('#PreguntaFormulacionPregunta').val();
   if(formP=='')
  {
    document.getElementById('PreguntaFormulacionPregunta').className = ':required vanadium-invalid';
    alert("falta la pregunta")
    return false;
  }
   var datos = "idEncuesta="+idEncuesta+"&dimension="+dimension+"&formP="+formP+"&boton=GuardarP"
   $.ajax({
        type:"POST",
        url: "cPregunta.php",
        data: datos,
       success: function(html){
              if(html != ''){
                guardarOpciones(html);
                listarPreguntas(idEncuesta);
                 $('#Nencuesta').show('slow');
              }else{
                alert('error')
              }

            } 
       });
}
function listarPreguntas(idEncuesta){

  var datos = "idEncuesta="+idEncuesta+"&boton=Listar";
  $.ajax({
        type:"POST",
        url: "cPregunta.php",
        data: datos,
       success: function(html){
              $('#Nencuesta').html(html);
            } 
       });
}

function guardarOpciones(idPregunta){
  var opcion1_nombre = $("#op1_1").val();
  var opcion1_valor = $("#op1_2").val();
  var opr1=opcion1_nombre+'*'+opcion1_valor;

  var opcion2_nombre = $("#op2_1").val();
  var opcion2_valor = $("#op2_2").val();
  var opr2=opcion2_nombre+'*'+opcion2_valor;

  var opcion3_nombre = $("#op3_1").val();
  var opcion3_valor = $("#op3_2").val();
  var opr3=opcion3_nombre+'*'+opcion3_valor;

  var opcion4_nombre = $("#op4_1").val();
  var opcion4_valor = $("#op4_2").val();
  var opr4=opcion4_nombre+'*'+opcion4_valor;

  var opcion5_nombre = $("#op5_1").val();
  var opcion5_valor = $("#op5_2").val();
  var opr5=opcion5_nombre+'*'+opcion5_valor;

var opciones = opr1+"/"+opr2+"/"+opr3+"/"+opr4+"/"+opr5;
  var datos = "opciones="+opciones+"&idPregunta="+idPregunta+"&boton=GuardarOpciones";
  $.ajax({
        type:"POST",
        url: "cOpRespuestas.php",
        data: datos,
       success: function(html){
              if(html != ''){
                alert("pregunta guardada")
              }else{
                alert('error')
              }

            } 
       });
}