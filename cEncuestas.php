<?php
	$boton=$_REQUEST['boton'];
  if ($boton == 'nuevaE'){
    $tituloE = $_REQUEST['tituloE'];
    $idEncuesta = $_REQUEST['idEncuesta'];
  }
	switch($boton)
	{
    case 'nuevaE':
                        $fecha = fecha_hora();
                        $activo = '1';
                        require_once("models/encuesta.php");
                        $encuestas = new encuesta('', htmlentities("$tituloE", ENT_QUOTES,"UTF-8"), $fecha,$activo);
                        if($idEncuesta == '')
                        {
                          $idEncuesta = $encuestas->guardar();
                        }else{

                        }
                        echo $idEncuesta;
    break;
		case 'llenarEncuesta':
                        session_start();
			$CODCUR= $_REQUEST['CODCUR'];
                        $CODCURR= $_REQUEST['CODCURR'];
                        $NOMCUR= $_REQUEST['NOMCUR'];
                        $NOMDOCE= $_REQUEST['NOMDOCE'];
                        $CODDOCE= $_REQUEST['CODDOCE'];
                        $asignacion_id= $_REQUEST['asignacion_id'];
                        $CODALU= $_REQUEST['CODALU'];
                        
                        require_once("models/asignacion.php");
                        require_once("models/encuesta.php");
                        require_once("models/pregunta.php");
                        require_once("models/oprespuesta.php");
                        
                        $asignaciones= new asignacion('', '', '', '', '', '', '','','', '');
                        $encuestas = new encuesta('', '', '', '');
                        $preguntas = new pregunta('', '', '', '');
                        $oprespuestas = new oprespuesta('', '', '', '');
                        $a= $asignaciones->listarSimple('', 'id', '=', $asignacion_id, '', '', '');
                        $en= $encuestas->listarSimple('', 'id', '=', $a[0][4], '', '', '');
                        $pre= $preguntas->listarSimple('id*formulacion_pregunta', 'encuestas_id', '=', $en[0][0], '', '', '');
			$na=count($pre);
			if($na>0){
                            $c=0;
                            $html="<table class='table table-hover'><tbody><tr class='success'><th>Facultad</th><th>:</th><td>". $_SESSION['NOMFAC']."</td></tr>";
                                  $html.="<tr class='error'><th>Carrera</th><th>:</th><td>".$_SESSION['NOMESC']."</td></tr>";
                                  $html.="<tr class='warning'><th>Curso</th><th>:</th><td>".$NOMCUR."</td></tr>";
                                  $html.="<tr class='info'><th>Docente</th><th>:</th><td>".$NOMDOCE."</td></tr></tbody></table>";
                                  $html.="<input type='hidden' id='Curr' value='$CODCURR'/>";
                                  $html.="<input type='hidden' id='Cur' value='$CODCUR'/>";
                                  $html.="<input type='hidden' id='doc' value='$CODDOCE'/>";
                                  $html.="<input type='hidden' id='asigid' value='$asignacion_id'/>";
                                  $html.="<input type='hidden' id='codal' value='$CODALU'/>";
                             $preguntas="";
                            $html.="<table class='table table-hover table-bordered' >
                                <thead><tr><th>No</th><th>Enunciado</th><th></th></tr></thead><tbody>";
                             for($i=0;$i<$na;$i++)
                                {
                                 $c++;
                                 $html.="<tr><td>".$c."</td>";
                                 $html.="<td>".utf8_encode($pre[$i][1])."</td>";
                                 $opR= $oprespuestas->listarSimple('', 'preguntas_id', '=', $pre[$i][0], '', '', '');
                                 $pregunta_id=$pre[$i][0];
                                 $nopR=count($opR);
                                    $html.='<td><select class=":required" id="P'.$pregunta_id.'" name="opRespuesta">';
                                    $html.="<option value=''>Seleccione.. </option>";
                                        for($j=0;$j<$nopR;$j++){
                                                $html.="<option value='".$opR[$j][0]."'>".$opR[$j][2]."</option>";
                                        }
                                        $html.="</select></td></tr>";
                                        $preguntas.=$pregunta_id."*";
                                }  
                                $html.="<tr ><td colspan='3'><input type='hidden' id='preguntas' value='$preguntas'/> <input type='button'class='btn btn-danger' style='margin-left:40%'  value='Terminar Encuesta' id='btnGuardarEncuesta' onclick='GuardarEncuesta();'/>  </td></tbody></table>";
                                $html.=" <script src='js/frmMisEncuestas.js' type='text/javascript' ></script>";
                                echo $html;
                        }
			break;
                        
                        
                        case 'GuardarEncuesta':
                            
                             require_once("models/respuesta.php");
                            session_start();
                                $CODCUR= $_REQUEST['CODCUR'];
                                $CODCURR= $_REQUEST['CODCURR'];
                                $CODDOCE= $_REQUEST['CODDOCE'];
                                $asignacion_id= $_REQUEST['asignacion_id'];
                                $CODALU= $_REQUEST['CODALU'];
                                $codModalidad=$_SESSION['CODMODALIDAD'];
                                $opres=$_REQUEST['opres'];
                                $respuestas_preguntas = explode("*", $opres);
                                $nopres=count($respuestas_preguntas);
                                
                                if($nopres>0){
                                    for($i=0;$i<$nopres;$i++){
                                    $respuesta_pregunta =  explode("/", $respuestas_preguntas[$i]);
                                    $respuesta = new respuesta("", $respuesta_pregunta[0], $CODCURR, $CODCUR, $CODDOCE, $respuesta_pregunta[1], $asignacion_id, $CODALU,$codModalidad);
                                    $id = $respuesta->guardar();
                                    
                                    }
                                    echo $id;
                                }
                                
                                
                            break;
                        
                    }
                    
 function fecha_hora(){
    $gmt_peru = -5;
    $fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
    $fecha_hora = gmdate('Y-n-j H:i:s',$fecha_gmt);
    return $fecha_hora;
  } 
            ?>
