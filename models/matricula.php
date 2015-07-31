<?php
	require_once("models/config.php");
	class matricula
	{
		private $tabla="v_matriculados";
                
		function __construct()
		{
			
		}
                
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{//Lista por titulo
			$config=new config($this->tabla,'',$camposMostrar,$campo,$operador,$valor,$separador,"","ASC","",$inicio,$fin);
			$config->enlazar();
		//	$a=$config->conn->crearConsultaSeleccionEncuestas();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
		
		
	}
?>