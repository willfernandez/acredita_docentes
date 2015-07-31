<?php
	require_once("models/config.php");
	class facultad
	{
		private $tabla="v_facultad";
                private $_CODFAC;
                private $_NOMFAC;
		function __construct($CODFAC,$NOMFAC)
		{
            $this->_CODFAC=$CODFAC;
            $this->_NOMFAC=$NOMFAC;
		}
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{
			$config=new config($this->tabla,$this->_CODFAC,$camposMostrar,$campo,$operador,$valor,$separador,"CODFAC","ASC","",$inicio,$fin);
			$config->enlazar();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
		
		
	}
?>