function iniciarSesionD()
{	
        var fichaMatricula=$('#fichaMatricula').val();
	var codigo=$('#codigo').val();
	$.ajax({
   	        type: "POST",
        	url: "csesion.php",
		data:"ficha="+fichaMatricula+"&codigo="+codigo+"&boton=iniciar",
    	    success: function(html)
			{
                            if(html=='0'){
                                var div = "<div align='center' class='alert alert-error'> Los datos ingresados son incorrectos!!!</div>"
                                $('#alert').html(div);
                            }else{
				 location.href="frmBienvenida.php";
                            }
                        }
		   });
}