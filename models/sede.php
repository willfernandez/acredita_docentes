<?php
	require_once("models/config.php");
	class sede
	{
		private $tabla="v_sede";
                private $_codsede;
                private $_sede;
		function __construct($codsede,$sede)
		{
			$this->_codsede=$codsede;
            $this->_sede=$sede;
		}
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{
			$config=new config($this->tabla,$this->_codsede,$camposMostrar,$campo,$operador,$valor,$separador,"codsede","ASC","",$inicio,$fin);
			$config->enlazar();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
		
		
	}
?>