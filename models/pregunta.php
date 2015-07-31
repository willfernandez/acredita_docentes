<?php
	require_once("models/config.php");
	class pregunta
	{
		private $tabla="preguntas";
                private $_id;
                private $_dimensiones_id;
                private $_encuestas_id;
                private $_formulacion_pregunta;
		function __construct($id,$dimension,$idE,$formulacion)
		{
			$this->_id=$id;
                        $this->_dimensiones_id=$dimension;
                        $this->_encuestas_id=$idE;
                        $this->_formulacion_pregunta=$formulacion;
		}
        function guardar()
		{
			$datos="0*$this->_dimensiones_id*$this->_encuestas_id*$this->_formulacion_pregunta";
			$config=new config($this->tabla,$datos,"","","","","","","","","","");
			$config->enlazar();
			$id=$config->conn->guardar();
			return $id;
		}     
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{//Lista por titulo
			$config=new config($this->tabla,$this->_id,$camposMostrar,$campo,$operador,$valor,$separador,"id","ASC","",$inicio,$fin);
			$config->enlazar();
		//	$a=$config->conn->crearConsultaSeleccionEncuestas();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
		
		
	}
?>