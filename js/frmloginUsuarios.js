function iniciarSesionA()
{	
   
        var usuario=$('#usuarios').val();
	var clave=$('#claves').val();
	$.ajax({
   	        type: "POST",
        	url: "csesionUsur.php",
		data:"usuario="+usuario+"&clave="+clave+"&boton=iniciar",
    	    success: function(html)
			{
                            if(html==0){
                                var div = "<div align='center' class='alert-message danger'> Los datos ingresados son incorrectos!!!</div>"
                                $('#alert').html(div);
                            }else{
                                location.href="frmHome.php" ;
                            }
                        }
		   });
}