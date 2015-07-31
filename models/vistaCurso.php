<?php
	require_once("models/config.php");
	class vistaCurso
	{
		private $tabla="evaluacion_docente";
                private $NFICHA;
                private $YYAKD;
                private $CODPER;
                private $CODALU;
		private $NomAlu;
                private $ApeAlu;
                private $CODCUR;
                private $CODCURR;
                private $NOMCUR;
                private $YYCUR;
                private $CODDOCE;
                private $NOMDOC;
                private $APEDOC;
                private $CODFAC;
                private $CODESP;
                private $CODMODALIDAD;
                private $CODESC;
                
		function __construct($NFICHA,$YYAKD,$CODPER,$CODALU,$NomAlu,$ApeAlu,$CODCUR,$CODCURR,$NOMCUR,$YYCUR,$CODDOCE,$NOMDOC,$APEDOC,$CODFAC,$CODESP,
                                    $CODMODALIDAD,$CODESC)
		{
			
		}
                
		function listarSimple($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{//Lista por titulo
			$config=new config($this->tabla,'',$camposMostrar,$campo,$operador,$valor,$separador,"YYCUR","ASC","",$inicio,$fin);
			$config->enlazar();
		//	$a=$config->conn->crearConsultaSeleccionEncuestas();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
                
                function listarSimpleR($camposMostrar,$campo,$operador,$valor,$separador,$inicio,$fin)
		{//Lista por titulo
			$config=new config($this->tabla,'',$camposMostrar,$campo,$operador,$valor,$separador,"CODMODALIDAD","asc","",$inicio,$fin);
			$config->enlazar();
		//	$a=$config->conn->crearConsultaSeleccionEncuestas();
                        $a=$config->conn->crearConsultaSeleccion();
			return $a;
		}
                
                
		
		
	}
?>