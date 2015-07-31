<?php
	require_once("models/config.php");
	class asignacion
	{
		private $tabla="asignaciones";
                private $_id;
                private $_CODSEDE;
                private $_CODESC;
                private $_CODFAC;
                private $_encuesta_id;
                private $_fecha_inicio;
                private $_fecha_fin;
                private $_YYCUR;
                private $_YYAKD;
                private $_CODPER;
		function __construct($id,$CODSEDE,$CODESC,$CODFAC,$encuesta_id,$fecha_inicio,$fecha_fin,$YYCUR,$YYAKD,$CODPER)
		{
			$this->_id=$id;
                        $this->_CODSEDE=$CODSEDE;
                        $this->_CODESC=$CODESC;
                        $this->_CODFAC=$CODFAC;
                        $this->_encuesta_id=$encuesta_id;
                        $this->_fecha_inicio=$fecha_inicio;
                        $this->_fecha_fin=$fecha_fin;
                        $this->_YYCUR=$YYCUR;
                        $this->_YYAKD=$YYAKD;
                        $this->_CODPER=$CODPER;
		}
                function guardar()
                {
                        $datos="0*$this->_CODSEDE*$this->_CODESC*$this->_CODFAC*$this->_encuesta_id*$this->_fecha_inicio*$this->_fecha_fin*$this->_YYCUR*$this->_YYAKD*$this->_CODPER";
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
		
		function listar($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
                {
                        $tablas="asignaciones*v_escuela*v_sede*encuestas";
                        $config=new config($tablas,$this->_id,$camposMostrar,$campo,$operador,$valor,$separador,"asig.id","ASC","asig*ve*vs*en",$inicio,$fin);
                        $config->enlazar();
                        $a=$config->conn->crearConsultaMultiple();
                        return $a;
                }

                                       
	}
?>