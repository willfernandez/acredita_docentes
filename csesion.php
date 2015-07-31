<?php
	$boton=$_REQUEST['boton'];
	switch($boton)
	{
		case 'iniciar':
			$ficha=$_REQUEST['ficha'];
			$codigo=$_REQUEST['codigo'];
			require_once("models/matricula.php");
                        
                       
			$matriculados = new matricula();
                        
			//SELECT * FROM usuario WHERE dni='' AND clave=''
                       $a = $matriculados->listarSimple('', "NFICHA*CODALU", "=*=", "$ficha*$codigo", "AND", '', '');
                    //    $a = $alumno->listarSimple('', "dni*codigo", "=*=", "$dni*$codigo", "AND", '', '');
			$na=count($a);
			if($na>0)
			{	
					session_start();
                                      
                    $_SESSION['autenticado']='SI';
					$_SESSION['NomAlu']=$a[0][0];
					$_SESSION['ApeALu']=$a[0][1];
					$_SESSION['CODALU']=$a[0][2];
                    $_SESSION['CODESCA']=$a[0][4];
                    $_SESSION['CODFACA']=$a[0][5];
					$_SESSION['CODPER']=$a[0][6];
					$_SESSION['CICLO']=$a[0][7];
					$_SESSION['YYAKD'] =$a[0][8];
                    $_SESSION['CODSEDE'] =$a[0][9];
					$_SESSION['NFICHA']=$a[0][11];
                    $_SESSION['NOMESC']=$a[0][13];
                    $_SESSION['ESC']=$a[0][13];
                    $_SESSION['CODMODALIDAD']=$a[0][14];
                    $_SESSION['NOMFAC']=$a[0][15];
                    $_SESSION['SEDE']=$a[0][16];
			}
			else
			{
				echo '0';//header("Location:frmLogin.php");
			}
			break;
	}
        
        function convertirtildes($dato) {
        $dato = str_replace ('Á', '&Aacute;', $dato);
        $dato = str_replace ('É', '&Eacute;', $dato);
        $dato = str_replace ('Í', '&Iacute;', $dato);
        $dato = str_replace ('Ó', '&Oacute;', $dato);
        $dato = str_replace ('Ú', '&Uacute;', $dato);
        $dato = str_replace ('Ñ', '&Ntilde;', $dato);
        return $dato;
        }
?>
