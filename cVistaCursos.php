<?php
	$boton=$_REQUEST['boton'];
	switch($boton)
	{
		case 'ListarCursos':
                        session_start();
			$codAlu= $_REQUEST['codAlu'];
                        $codPer= $_REQUEST['codPer'];
                        $codAca= $_REQUEST['codAca'];
                        $codmodalidad= $_SESSION['CODMODALIDAD'];
                        $NFICHA=$_SESSION['NFICHA'];
			require_once("models/vistaCurso.php");
                        require_once("models/asignacion.php");
                        require_once("models/respuesta.php");
                        
                        $codEscuela=$_SESSION['CODESCA'];
                        $codFacultad=$_SESSION['CODFACA'];
                        $codPeriodo=$_SESSION['CODPER'];
                        
                        $codAño=$_SESSION['YYAKD'];
                        $codSede=$_SESSION['CODSEDE'];
                        $campos="CODESC*CODFAC*CODPER*YYAKD*CODSEDE";
                        $operadors="=*=*=*=*=";
                        $valors="$codEscuela*$codFacultad*$codPeriodo*$codAño*$codSede";
                        $separadors="AND*AND*AND*AND";
                        $asignaciones= new asignacion('', '', '', '', '', '', '','','', '');
                        $respuestas = new respuesta('', '', '', '', '', '', '', '','');
                        
                       
			$vistaCursos= new vistaCurso('','','', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                        $a = $vistaCursos->listarSimple('', "YYAKD*CODPER*NFICHA*CODMODALIDAD", "=*=*=*=", "$codAca*$codPer*$NFICHA*$codmodalidad", "AND*AND*AND", '', '');
			$na=count($a);
                        $contador=0;
			if($na>0){
                            $html="<div class='datosC'><label ><strong class='blue'>Carrera Prof:</strong> ". utf8_encode($_SESSION['NOMESC'])."</label>
                                    <label><strong class='blue'>Facultad:</strong>".utf8_encode($_SESSION['NOMFAC'])."</label></div>";
                          
                             $html.="<table class='table table-hover'>
                                <thead><tr><th>No</th><th>Asignatura</th><th>Ciclo</th><th>Docente</th><th>Acci&oacute;n</th><th>Observación</th></tr></thead><tbody>";
                               $c=0;
                               $cursos= '';
                                for($i=0;$i<$na;$i++)
                                {
                                    $asig= $asignaciones->listarSimple('', $campos."*YYCUR", $operadors."*=", $valors."*".$a[$i][9], $separadors."*AND",'','');
                                    $nasig=count($asig);
                                    $data=$a[$i][6]."*".$a[$i][7]."*".$a[$i][8]."*".$a[$i][11]." ".$a[$i][12]."*".$a[$i][10]."*".$asig[0][0]."*".$codAlu;
                                         // CODCUR        CODCURR   * NOMCUR               * NOMDOCE             CODDOCE     *   asignacion_id * codAlu
                                    if($na-1==$i){
                                            $cursos.=$a[$i][8];
                                    }else{
                                        $cursos.=$a[$i][8]."*";
                                    }
                                    $_SESSION['cursos']=$cursos;
                                    $res= $respuestas->listarSimple('id', 'CODCURR*CODCUR*CODDOCE*asignacione_id*CODALU','=*=*=*=*=',$a[$i][7].'*'.$a[$i][6].'*'.$a[$i][10].'*'.$asig[0][0].'*'.$codAlu, "AND*AND*AND*AND", '', '');
                                    $nres=count($res);
                                    $c++;
                                    $html.="<tr>
                                            <td>".$c."</td>
                                            <td>".utf8_encode($a[$i][8])."</td>
                                            <td>".$a[$i][9]."</td>
                                            <td>".utf8_encode($a[$i][11])." ".utf8_encode($a[$i][12])."</td>";
                                           if($nasig>0 && $nres<1){
                                                    $html.="<td><a class='btn btn-success' href='#' id='llenarEncuesta*$data'>Evaluar</a>  </td>";
                                           }
                                           else{
                                               if($nres>0){
                                                       $html.="<td>
                                                        <button class='btn btn-danger' type='button'  disabled='disabled''>Evaluada</button>
                                                        </td>";
                                                       $contador++;
                                                        $html.="<td><i class='icon-ok'></i>  </td>  ";
                                               }else{
                                                   $contador++;
                                                    $html.="<td>
                                                        <button class='btn btn-success' type='button'  disabled='disabled''>Evaluar</button>
                                                        </td>";
                                                    $html.="<td><div class='alert alert-error'>
                                                            <button class='close' data-dismiss='alert' type='button'>×</button>
                                                            <strong>No</strong>
                                                            hay evaluación para este curso; 
                                                            </div>  </td>  ";
                                               }
                                           }
                                           $html.="</tr>";
                                           
                                           
                                           
                                }
                                if($contador==$na){
                                $html.="<tr><td colspan='6'><a style='margin-left:40%' class='btn btn-warning' href='prueba.php'>IMPRIMIR COMPROBANTE</a>  </td></tr>";    
                                }
                                $html.="</tbody></table><script src='js/frmSelectEncuestas.js'></script>";
                                echo $html;
                        }
			break;
                    }
                    
                    
            ?>
