<?php
	require_once("models/config.php");
	class escuela
	{
		private $tabla="v_escuela";
                private $_CODESC;
                private $_CODFAC;
                private $_NOMESC;
		function __construct($CODESC,$CODFAC,$NOMESC)
		{
			$this->_CODESC=$CODESC;
            $this->_CODFAC=$CODFAC;
            $this->_NOMESC=$NOMESC;
		}
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{
			$config=new config($this->tabla,$this->_CODESC,$camposMostrar,$campo,$operador,$valor,$separador,"CODESC","ASC","",$inicio,$fin);
			$config->enlazar();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
		
		
	}
?>