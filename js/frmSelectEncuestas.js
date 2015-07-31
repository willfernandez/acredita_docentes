 $("a").click(function()
  {
      var aa=$(this)[0].id;
	var a=aa.split('*');
	var accion=a[0];
	if(accion=='llenarEncuesta')
	{
            var datos="CODCUR="+a[1]+"&CODCURR="+a[2]+"&NOMCUR="+a[3]+"&NOMDOCE="+a[4]+"&CODDOCE="+a[5]+"&asignacion_id="+a[6]+"&CODALU="+a[7]+"&boton=llenarEncuesta";
            //alert(datos)
            $.ajax({
                    type: "POST",
                    url: "cEncuestas.php",
                    data: datos,
                    success: function(html)
                    {	
                   //     alert(html)
                        $('#misencuestas').html(html);
                    }
                });
  }
  });