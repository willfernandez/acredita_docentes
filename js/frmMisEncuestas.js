$(document).on("ready", inicio);

function inicio(){
      var codAlu=$('#CODALU').val();
      var codPer=$('#CODPER').val();
      var codAca=$('#CODYY').val();
      
    $.ajax({
        type:"POST",
        url: "cVistaCursos.php",
        data: "boton=ListarCursos&codAlu="+codAlu+"&codPer="+codPer+"&codAca="+codAca,
       success: function(html){
        //   alert(html)
           $('#misencuestas').html(html);
       }
    })
}

function GuardarEncuesta(){
  var preguntas=$('#preguntas').val();
  var a=preguntas.split('*');
  var b=a.length;
  var opres=""
  var j=1;
  for(var i=0;i<b-1;i++){
      if($("#P"+a[i]).val()==''){
          alert('FALTA RESPONDER LA PREGUNTA '+j);
          return false;
      }
       if(b-2>i){
       opres+=$("#P"+a[i]).val()+"/"+a[i]+"*";
       }
       else{
         opres+=$("#P"+a[i]).val()+"/"+a[i];
       }
       j++;
   } 
   var CODCURR=$('#Curr').val();
   var CODCUR=$('#Cur').val();
   var CODDOCE=$('#doc').val();
   var asignacion_id=$('#asigid').val();
   var CODALU=$('#codal').val();
   
   var datos="opres="+opres+"&CODCURR="+CODCURR+"&CODCUR="+CODCUR+"&CODDOCE="+CODDOCE+"&asignacion_id="+asignacion_id+"&CODALU="+CODALU+"&boton=GuardarEncuesta";
   //alert(datos)
   $.ajax({
        type:"POST",
        url: "cEncuestas.php",
        data: datos,
       success: function(html){
        //   alert(html)
           if(html>0)
            {
                    alert("Datos registrados correctamente...");
                    inicio();
            }
            else
                    alert("No se pudo registrar los datos...!");
       }
    })
}
