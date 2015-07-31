 $("a").click(function()
  {
      var aa=$(this)[0].id;
      var a=aa.split('*');
      var accion=a[0];
       var nomesc=$('#nomesc').val();
     if(accion=='reporte')
	{
            
            var datos="esc="+a[1]+"&facu="+a[2]+"&annio="+a[3]+"&periodo="+a[4]+"&ciclo="+a[5]+"&codcurr="+a[6]+"&codcur="+a[7]+"&coddoce="+a[8]+"&codmodalidad="+a[9]+"&curso="+a[10]+"&docente="+a[11]+"&ciclo="+a[12]+"&modalidad="+a[13]+"&plan="+a[14]+"&nomesc="+nomesc+"&boton=ReporteDocente";
            //$datos="$esc*$facu*$annio*$periodo*$ciclo*".$c[$i][4]."*".$c[$i][5].'*'.$c[$i][6].'*'.$c[$i][7];
            //$re=$respuestas->listarSimple('COUNT(DISTINCT(CODALU))', 'CODCURR*CODCUR*CODDOCE*CODMODALIDAD', '=*=*=*=', $c[$i][4].'*'. $c[$i][5].'*'.$c[$i][6].'*'.$c[$i][7], 'AND*AND*AND*AND','','');
            $.ajax({
                    type: "POST",
                    url: "cReportes.php",
                    data: datos,
                    success: function(html)
                    {	
                //     alert(html)
                        $('#vcarreras').html(html);
                    }
                }); 
        }
  });