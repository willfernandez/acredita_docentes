<?php
	require_once("models/config.php");
	class oprespuesta
	{
		private $tabla="oprespuestas";
                private $_id;
                private $_preguntas_id;
                private $_nombre_opcion;
                private $_valor;
		function __construct($id,$idPre,$nomO,$valor)
		{
			$this->_id=$id;
                        $this->_preguntas_id=$idPre;
                        $this->_nombre_opcion=$nomO;
                        $this->_valor=$valor;
		}
        function guardar()
		{
			$datos="0*$this->_preguntas_id*$this->_nombre_opcion*$this->_valor";
			$config=new config($this->tabla,$datos,"","","","","","","","","","");
			$config->enlazar();
			$id=$config->conn->guardar();
			return $id;
		}           
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{
			$config=new config($this->tabla,$this->_id,$camposMostrar,$campo,$operador,$valor,$separador,"id","ASC","",$inicio,$fin);
			$config->enlazar();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
		
		
	}
?>