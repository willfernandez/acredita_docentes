<?php
	require_once("models/config.php");
	class encuesta
	{
		private $tabla="encuestas";
                private $_id;
                private $_titulo_encuesta;
                private $_fecha_creacion;
                private $_activo;
		function __construct($id,$titulo,$fecha,$activo)
		{
			$this->_id=$id;
                        $this->_titulo_encuesta=$titulo;
                        $this->_fecha_creacion=$fecha;
                        $this->_activo=$activo;
		}
                
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{//Lista por titulo
			$config=new config($this->tabla,$this->_id,$camposMostrar,$campo,$operador,$valor,$separador,"id","ASC","",$inicio,$fin);
			$config->enlazar();
		//	$a=$config->conn->crearConsultaSeleccionEncuestas();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
        function guardar()
		{
			$datos="0*$this->_titulo_encuesta*$this->_fecha_creacion*$this->_activo";
			$config=new config($this->tabla,$datos,"","","","","","","","","","");
			$config->enlazar();
			$id=$config->conn->guardar();
			return $id;
		}
		
		
	}
?>