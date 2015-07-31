function VerReporte(){
    var annio=$('#annio').val();
   var periodo=$('#periodo').val();
   var ciclo=$('#ciclo').val();
   var facu=$('#codfacu').val();
   var esc=$('#codesc').val();
   var datos="annio="+annio+"&periodo="+periodo+"&ciclo="+ciclo+"&facu="+facu+"&esc="+esc+"&boton=verCursos";

$.ajax({
        type:"POST",
        url: "cReportes.php",
        data: datos,
       success: function(html){
         //  alert(html)
           $('#vcarreras').html(html);
            $('#document').dataTable( {
					"sPaginationType": "bootstrap",
					"sDom": "<'row'<'span5'l><'span6'f>r>t<'row'<'span8'i><'span9'p>>"
            } );
       }
    });
}

function verReporteCursosCiclos(){
   
    var annio=$('#annio').val();
   var periodo=$('#periodo').val();
   var ciclo=$('#ciclo').val();
   var facu=$('#codfacu').val();
   var esc=$('#codesc').val();
   var datos="annio="+annio+"&periodo="+periodo+"&ciclo="+ciclo+"&facu="+facu+"&esc="+esc+"&boton=verReporteCursosCiclos";
   //alert(datos)

$.ajax({
        type:"POST",
        url: "cReportes.php",
        data: datos,
       success: function(html){
         //  alert(html)
           $('#vcarreras').html(html);
            $('#document').dataTable( {
					"sPaginationType": "bootstrap",
					"sDom": "<'row'<'span5'l><'span6'f>r>t<'row'<'span8'i><'span9'p>>"
            } );
       }
    });
}
