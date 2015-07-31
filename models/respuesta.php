<?php
	require_once("models/config.php");
	class respuesta
	{
		private $tabla="respuestas";
                private $_id;
                private $_oprespuesta_id;
                private $_CODCURR;
                private $_CODCUR;
                private $_CODDOCE;
                private $_pregunta_id;
                private $_asignacione_id;
                private $_CODALU;
                private $_CODMODALIDAD;
                function __construct($id,$opres,$codcrr,$codcur,$coddoc,$preg,$asig,$codal,$codmod)
		{
			$this->_id=$id;
                        $this->_oprespuesta_id=$opres;
                        $this->_CODCURR=$codcrr;
                        $this->_CODCUR=$codcur;
                        $this->_CODDOCE=$coddoc;
                        $this->_pregunta_id=$preg;
                        $this->_asignacione_id=$asig;
                        $this->_CODALU=$codal;
                        $this->_CODMODALIDAD=$codmod;
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
			$datos="0*$this->_oprespuesta_id*$this->_CODCURR*$this->_CODCUR*$this->_CODDOCE*$this->_pregunta_id*$this->_asignacione_id*$this->_CODALU*$this->_CODMODALIDAD";
			$config=new config($this->tabla,$datos,"","","","","","","","","","");
			$config->enlazar();
			$id=$config->conn->guardar();
			return $id;
		}
                function listar($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{
			$tablas="asignaciones*preguntas*oprespuestas*".$this->tabla;
			$config=new config($tablas,$this->_id,$camposMostrar,
                                $campo,$operador,$valor,$separador,'re.CODALU','ASC',
                                "asig*pre*opres*re",$inicio,$fin);
                        /*
                         * SELECT re.`id`,pre.`id`,pre.`formulacion_pregunta`,re.`CODALU`,re.`CODDOCE`,re.`oprespuesta_id`, opres.`valor` 
                            FROM respuestas AS re INNER JOIN asignaciones AS asig ON re.`asignacione_id`= asig.`id` 
                            INNER JOIN preguntas AS pre ON re.`pregunta_id`= pre.`id` 
                            INNER JOIN oprespuestas AS opres ON opres.`id`=re.`oprespuesta_id`
                            WHERE asig.`CODESC`='04' AND asig.CODFAC='01' AND asig.YYAKD='2011' AND asig.CODPER='2' AND asig.YYCUR='08' 
                            AND re.CODCURR='0096' AND re.CODCUR='03084' AND re.CODDOCE='FA0001' AND pre.`dimensiones_id`='1'
                         */
			$config->enlazar();
			$a=$config->conn->crearConsultaMultiple();
			return $a;
		}
                
                 function listarVerCursos($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{
			$tablas="asignaciones*".$this->tabla;
			$config=new config($tablas,$this->_id,$camposMostrar,
                                $campo,$operador,$valor,$separador,'','',
                                "asig*re",$inicio,$fin);
                        /*
                         * SELECT re.`id`,pre.`id`,pre.`formulacion_pregunta`,re.`CODALU`,re.`CODDOCE`,re.`oprespuesta_id`, opres.`valor` 
                            FROM respuestas AS re INNER JOIN asignaciones AS asig ON re.`asignacione_id`= asig.`id` 
                            INNER JOIN preguntas AS pre ON re.`pregunta_id`= pre.`id` 
                            INNER JOIN oprespuestas AS opres ON opres.`id`=re.`oprespuesta_id`
                            WHERE asig.`CODESC`='04' AND asig.CODFAC='01' AND asig.YYAKD='2011' AND asig.CODPER='2' AND asig.YYCUR='08' 
                            AND re.CODCURR='0096' AND re.CODCUR='03084' AND re.CODDOCE='FA0001' AND pre.`dimensiones_id`='1'
                         */
			$config->enlazar();
			$a=$config->conn->crearConsultaMultiple();
			return $a;
		}
		
		
	}
?>