<?php
	$boton=$_REQUEST['boton'];
	switch($boton)
	{
		case 'verCursos':
			$annio= $_REQUEST['annio'];
                        $periodo= $_REQUEST['periodo'];
                        $ciclo= $_REQUEST['ciclo'];
                        $facu= $_REQUEST['facu'];
                        $esc= $_REQUEST['esc'];
                        
                        require_once("models/vistaCurso.php");
                        require_once("models/respuesta.php");
                        
                        $cursos= new vistaCurso('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                        $respuestas= new respuesta('', '','','','','','', '','');
                        $camposMostrar='DISTINCT(NOMCUR)*NOMDOC*APEDOC*YYCUR*CODCURR*CODCUR*CODDOCE*CODMODALIDAD*NOMMODALIDAD*YYCURR';
                        $campo="YYAKD*CODPER*CODFAC*CODESC*YYCUR";
                        $operador="=*=*=*=*=";
                        $valor="$annio*$periodo*$facu*$esc*$ciclo";
                        $separador="AND*AND*AND*AND";
                       $c=$cursos->listarSimpleR($camposMostrar, $campo, $operador, $valor, $separador, '', '');
			$na=count($c);
			if($na>0){
                            
                            /*
                             * WHERE asig.`CODESC`='04' 
                         * AND asig.CODFAC='01' 
                         * AND asig.YYAKD='2011' 
                         * AND asig.CODPER='2'
                         * AND asig.YYCUR='08' 
                           AND re.CODCURR='0096'
                         * AND re.CODCUR='03084'
                         * AND re.CODDOCE='FA0001' 
                         * AND pre.`dimensiones_id`='1'
                             */
                            $cont=0;
                            $html="<table class='table table-hover table-bordered  table-striped' id='document' >
                                <thead><tr><th>No</th><th>Curso</th><th>Docente</th><th>Ciclo</th><th>Modalidad</th><th>Plan</th><th><a href='#' rel='tooltip' data-placement='top' title='Alumnos que han evaluado al docente'>Total</a></li></th><th></th></tr></thead><tbody>";
                             for($i=0;$i<$na;$i++)
                                {
                                 /*
                                  * SELECT COUNT(DISTINCT(CODALU))
                                    FROM respuestas 
                                    WHERE re.CODCURR ='0096' AND re.CODCUR='03086' AND re.CODDOCE='CW0001 and re.CODMODALIDAD='01'
                                  */
                                 $re=$respuestas->listarVerCursos('COUNT(DISTINCT(CODALU))', 're.asignacione_id*re.CODCURR*re.CODCUR*re.CODDOCE*re.CODMODALIDAD*asig.YYCUR*asig.YYAKD*asig.CODPER', '=*=*=*=*=*=*=*=', "asig.id*".$c[$i][4].'*'. $c[$i][5].'*'.$c[$i][6].'*'.$c[$i][7]."*".$ciclo."*".$annio."*".$periodo, 'AND*AND*AND*AND*AND*AND*AND','','');
                                 $cont++;
                                 $datos="$esc*$facu*$annio*$periodo*$ciclo*".$c[$i][4]."*".$c[$i][5].'*'.$c[$i][6].'*'.$c[$i][7];
                                 
                                 $encabezado=$c[$i][0]."*".$c[$i][1]." ".$c[$i][2]."*".$c[$i][3]."*".$c[$i][8]."*".$c[$i][9];
                                 $html.="<tr><td>".$cont."</td>";
                                 $html.="<td>".utf8_encode($c[$i][0])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][1])." ".utf8_encode($c[$i][2])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][3])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][8])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][9])."</td>";
                                 $html.="<td>".$re[0][0]."</td>";
                                 $html.="<td>";
                                    if($re[0][0]==0)
                                    {
                                        $html.="<a href='#' ><img alt='reportes' src='img/chart_bar_off.png'> </a>"; 
                                    }else{
                                        $html.="<a href='#' id='reporte*$datos*$encabezado'  ><img alt='reportes' src='img/chart_bar.png'> </a>"; 
                                    }
                                $html.="</td></tr>";
                                }  
                                $html.="</tbody></table>";
                                $html.=" <script src='js/frmReporteSelect.js' type='text/javascript' ></script>";
                                echo $html;
                        }
		break;
                
                case 'verReporteCursosCiclos':
			$annio= $_REQUEST['annio'];
                        $periodo= $_REQUEST['periodo'];
                        $ciclo= $_REQUEST['ciclo'];
                        $facu= $_REQUEST['facu'];
                        $esc= $_REQUEST['esc'];
                        
                        require_once("models/vistaCurso.php");
                        require_once("models/respuesta.php");
                        
                        $cursos= new vistaCurso('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                        $respuestas= new respuesta('', '','','','','','', '','');
                        $camposMostrar='DISTINCT(NOMCUR)*NOMDOC*APEDOC*YYCUR*CODCURR*CODCUR*CODDOCE*CODMODALIDAD*NOMMODALIDAD*YYCURR';
                        $campo="YYAKD*CODPER*CODFAC*CODESC*YYCUR";
                        $operador="=*=*=*=*=";
                        $valor="$annio*$periodo*$facu*$esc*$ciclo";
                        $separador="AND*AND*AND*AND";
                       $c=$cursos->listarSimpleR($camposMostrar, $campo, $operador, $valor, $separador, '', '');
			$na=count($c);
			if($na>0){
                            
                            /*
                             * WHERE asig.`CODESC`='04' 
                         * AND asig.CODFAC='01' 
                         * AND asig.YYAKD='2011' 
                         * AND asig.CODPER='2'
                         * AND asig.YYCUR='08' 
                           AND re.CODCURR='0096'
                         * AND re.CODCUR='03084'
                         * AND re.CODDOCE='FA0001' 
                         * AND pre.`dimensiones_id`='1'
                             */
                            $cont=0;
                            $html="<table class='table table-hover table-bordered  table-striped' id='document' style='width: 1286px;'>
                                <thead><tr><th rowspan='2'>No</th><th rowspan='2'>Curso</th><th rowspan='2'>Docente</th><th rowspan='2'>Ciclo</th><th rowspan='2'>Modalidad</th><th rowspan='2'>Plan</th>
                                <th colspan='2'>Programación Y Organización</th><th colspan='2'>Habilidades y Motivación</th><th colspan='2'>Capacidad Académmica</th><th colspan='2'>Evaluación</th><th colspan='2'>TOTAL</th></th></tr>
                                <tr><th>Calificación</th><th>SubTotal</th><th>Calificación</th><th>SubTotal</th><th>Calificación</th><th>SubTotal</th><th>Calificación</th><th>SubTotal</th><th>Calificación</th><th>Total</th></tr></thead><tbody>";
                             for($i=0;$i<$na;$i++)
                                {
                                 /*
                                  * SELECT COUNT(DISTINCT(CODALU))
                                    FROM respuestas 
                                    WHERE CODCURR ='0096' AND CODCUR='03086' AND CODDOCE='CW0001 and CODMODALIDAD='01'
                                  */
                                 $re=$respuestas->listarSimple('COUNT(DISTINCT(CODALU))', 'CODCURR*CODCUR*CODDOCE*CODMODALIDAD', '=*=*=*=', $c[$i][4].'*'. $c[$i][5].'*'.$c[$i][6].'*'.$c[$i][7], 'AND*AND*AND*AND','','');
                                 $cont++;
                                 $datos="$esc*$facu*$annio*$periodo*$ciclo*".$c[$i][4]."*".$c[$i][5].'*'.$c[$i][6].'*'.$c[$i][7];
                                 $encabezado=$c[$i][0]."*".$c[$i][1]." ".$c[$i][2]."*".$c[$i][3]."*".$c[$i][8]."*".$c[$i][9];
                                 
                                 $promedios=traerPromedios($datos);
                                 $promediosD = explode("*", $promedios);
                                 
                                 $html.="<tr><td>".$re[0][0]."</td>";
                                 $html.="<td>".utf8_encode($c[$i][0])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][1])." ".utf8_encode($c[$i][2])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][3])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][8])."</td>";
                                 $html.="<td>".utf8_encode($c[$i][9])."</td>";
                                 
                                 $calificacion=calificarDocente($promediosD[0].'*1');
                                 $html.="<td>$calificacion</td>";
                                 $html.="<td>$promediosD[0]</td>";
                                 
                                 $calificacion=calificarDocente($promediosD[1].'*2');
                                 $html.="<td>$calificacion</td>";
                                 $html.="<td>$promediosD[1]</td>";
                                 
                                 $calificacion=calificarDocente($promediosD[2].'*3');
                                 $html.="<td>$calificacion</td>";
                                 $html.="<td>$promediosD[2]</td>";
                                 
                                 $calificacion=calificarDocente($promediosD[3].'*4');
                                 $html.="<td>$calificacion</td>";
                                 $html.="<td>$promediosD[3]</td>";
                                 
                                 $calificacion=calificarDocente($promediosD[4].'*5');
                                 $html.="<td>$calificacion</td>";
                                 $html.="<td>$promediosD[4]</td>";
                                $html.="</tr>";
                                }  
                                $html.="</tbody></table>";
                                echo $html;
                        }
		break;
                        
                case 'ReporteDocente':
                        require_once("models/respuesta.php");
                        require_once("models/pregunta.php");
                        require_once("models/asignacion.php");
                        require_once("models/oprespuesta.php");
                        //var datos="esc="+a[1]+"&facu="+a[2]+"&annio="+a[3]+"&periodo="+a[4]+"&ciclo="+a[5]+"&codcurr="+a[6]+"&codcur="+a[7]
                        //+"&coddoce="+a[8]+"&codmodalidad="+a[9]+"&boton=ReporteDocente";
                        $esc=$_REQUEST['esc'];
                        $facu=$_REQUEST['facu'];
                        $annio=$_REQUEST['annio'];
                        $periodo=$_REQUEST['periodo'];
                        $ciclo=$_REQUEST['ciclo'];
                        $codcurr=$_REQUEST['codcurr'];
                        $codcur=$_REQUEST['codcur'];
                        $coddoce=$_REQUEST['coddoce'];
                        $codmodalidad=$_REQUEST['codmodalidad'];
                        
                        //encabezado
                        $curso=$_REQUEST['curso'];
                        $docente=$_REQUEST['docente'];
                        $ciclo=$_REQUEST['ciclo'];
                        $modalidad=$_REQUEST['modalidad'];
                        $plan=$_REQUEST['plan'];
                        $nomesc=$_REQUEST['nomesc'];
                        
                        $respuestas= new respuesta('', '', '','','','','','','');
                        $campo="re.`asignacione_id`*re.`pregunta_id`
                            *opres.`id`
                            *asig.`CODESC`*asig.CODFAC*asig.YYAKD*asig.CODPER*asig.YYCUR*
                            re.CODCURR*re.CODCUR*re.CODDOCE*re.`CODMODALIDAD`*pre.`dimensiones_id`";
                        
                        $operador="=*=*=*=*=*=*=*=*=*=*=*=*=";
                        $valor="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*1";
                        $separador="AND*AND*AND*AND*AND*AND*AND*AND*AND*AND*AND*AND";
                        $resD1 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor, $separador,'','');
                        $valor2="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*2";
                        $resD2 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor2, $separador,'','');
                        $valor3="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*3";
                        $resD3 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor3, $separador,'','');
                        $valor4="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*4";
                        $resD4 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor4, $separador,'','');
                        
                        /*
                         * SELECT re.`id`,pre.`id`,pre.`formulacion_pregunta`,re.`CODALU`,re.`CODDOCE`,re.`oprespuesta_id`, opres.`valor` 
                            FROM respuestas AS re INNER JOIN asignaciones AS asig 
                         *  ON re.`asignacione_id`= asig.`id` 
                            INNER JOIN preguntas AS pre 
                         * ON re.`pregunta_id`= pre.`id` 
                            INNER JOIN oprespuestas AS opres 
                         * ON opres.`id`=re.`oprespuesta_id`
                         * 
                         * 
                            WHERE asig.`CODESC`='04' 
                         * AND asig.CODFAC='01' 
                         * AND asig.YYAKD='2011' 
                         * AND asig.CODPER='2'
                         * AND asig.YYCUR='08' 
                           AND re.CODCURR='0096'
                         * AND re.CODCUR='03084'
                         * AND re.CODDOCE='FA0001' 
                         * AND re.`CODMODALIDAD`='01'
                         * AND pre.`dimensiones_id`='1'
                         */
                        
                        $TresD1=count($resD1);
                        $al=$TresD1/4;
                        $i1=0;
                        $i2=4;
                        $i3=0;
                        $i4=8;
                                $html="<table class='table table-hover table-bordered'>";
                                $html.="<tr><th>Carrera Profesional:</th><td>$nomesc</td><th>Ciclo:</th><td>$ciclo</td>
                                <th>Curso:</th><td>$curso</td><th>Docente:</th><td>$docente</td><th>Modalidad:</th><td>$modalidad</td>
                                <th>Plan:</th><td>$plan</td></tr></table>";
                                $html.="<table class='table table-hover table-bordered ' id='document' >
                                <thead><tr><th></th><th colspan='4'>Programación y Organización</th><th>Subtotal</th><th colspan='4'>Habilidades y Motivación</th><th>SubTotal</th>
                                <th colspan='8'>Capacidad Académica</th><th>SubTotal</th><th colspan='4'>Evaluación</th><th>SubTotal</th><th>TOTAL</th></tr>";
                                $html.="<tr><th>Codigo</th><th>2</th><th>4</th><th>9</th><th>19</th><th></th><th>6</th><th>11</th><th>13</th><th>15</th><th></th>
                                        <th>1</th><th>3</th><th>7</th><th>8</th><th>12</th><th>17</th><th>18</th><th>20</th><th></th><th>5</th><th>10</th><th>14</th>
                                        <th>16</th><th></th><th></th></tr></thead><tbody>";
                             $conta='1';
                                for($i=0;$i<$al;$i++){
                                 $html.="<tr><td>$conta</td>";
                                     $dim=1;
                                     $total[$i][$dim]=0;
                                     for($j=$i1;$j<$i2;$j++){
                                         $html.="<td>".$resD1[$j][0]."</td>";
                                         $total[$i][$dim]=$total[$i][$dim]+$resD1[$j][0];
                                    }
                                    $html.="<td>".$total[$i][$dim]."</td>";
                                    $dim++;
                                    $total[$i][$dim]=0;
                                     for($j=$i1;$j<$i2;$j++){
                                         $html.="<td>".$resD2[$j][0]."</td>";
                                         $total[$i][$dim]=$total[$i][$dim]+$resD2[$j][0];
                                    }
                                    $html.="<td>".$total[$i][$dim]."</td>";
                                    
                                     $dim++;
                                    $total[$i][$dim]=0;
                                    for($k=$i3;$k<$i4;$k++){
                                         $html.="<td>".$resD3[$k][0]."</td>";
                                         $total[$i][$dim]=$total[$i][$dim]+$resD3[$k][0];
                                    }
                                    $html.="<td>".$total[$i][$dim]."</td>";
                                    
                                    
                                    $dim++;
                                    $total[$i][$dim]=0;
                                     for($j=$i1;$j<$i2;$j++){
                                         $html.="<td>".$resD4[$j][0]."</td>";
                                         $total[$i][$dim]=$total[$i][$dim]+$resD4[$j][0];
                                    }
                                    $html.="<td>".$total[$i][$dim]."</td>";
                                    $Ttotal[$i]=0;
                                    for($m=1;$m<=$dim;$m++){
                                        $Ttotal[$i]=$Ttotal[$i]+$total[$i][$m];
                                    }
                                    $html.="<td>".$Ttotal[$i]."</td>";
                                    
                                     $html.="</tr>";
                                     $i1=$i1+4;
                                     $i2=$i2+4;
                                     $i3=$i3+8;
                                     $i4=$i4+8;
                                     $conta++;
                                }
                                $html.="<tr><td>TOTAL</td>";
                                for($n=1;$n<=4;$n++){
                                    $suma=0;
                                    $prom=0;
                                    for($p=0;$p<$al;$p++){
                                        $suma=$total[$p][$n]+$suma;
                                        $prom=$suma/$al;
                                    }
                                    if($n==3){
                                        $html.="<td colspan='9'>$prom</td>";
                                    }else{
                                    $html.="<td colspan='5'>$prom</td>";
                                    }
                                }
                                $sumaprom=0;
                                $Pprom=0;
                                for($p=0;$p<$al;$p++){
                                        $sumaprom=$Ttotal[$p]+$sumaprom;
                                        $Pprom=$sumaprom/$al;
                                    }
                                
                                $html.="<td>$Pprom</td>";
                                
                                
                                
                               $html.="</tr>";
                                $html.="</tbody></table>";
                                echo $html;
                break;
                        
            }
            function calificarDocente($promedio){
                 $datos = explode("*", $promedio);
                switch($datos[1])
                {
                    case 3:
                        if($datos[0]>=8 && $datos[0]<14.4){
                            $calificacion="Deficiente";
                            return $calificacion;
                        }
                        if($datos[0]>=14.4 && $datos[0]<20.8){
                            $calificacion="Regular";
                            return $calificacion;
                        }
                        if($datos[0]>=20.8 && $datos[0]<27.2){
                            $calificacion="Suficiente";
                            return $calificacion;
                        }
                        if($datos[0]>=27.2 && $datos[0]<33.6){
                            $calificacion="Bueno";
                            return $calificacion;
                        }
                        if($datos[0]>=33.6 && $datos[0]<=40){
                            $calificacion="Excelente";
                            return $calificacion;
                        }
                    break;
                
                
                    case 1: case 2: case 4:
                        
                         if($datos[0]>=4 && $datos[0]<7.2){
                            $calificacion="Deficiente";
                            return $calificacion;
                        }
                        if($datos[0]>=7.2 && $datos[0]<10.4){
                            $calificacion="Regular";
                            return $calificacion;
                        }
                        if($datos[0]>=10.4 && $datos[0]<13.6){
                            $calificacion="Suficiente";
                            return $calificacion;
                        }
                        if($datos[0]>=13.6 && $datos[0]<16.8){
                            $calificacion="Bueno";
                            return $calificacion;
                        }
                        if($datos[0]>=16.8 && $datos[0]<=20){
                            $calificacion="Excelente";
                            return $calificacion;
                        }
                        
                    break;
                
                    case 5:
                        if($datos[0]>=20 && $datos[0]<36){
                            $calificacion="Deficiente";
                            return $calificacion;
                        }
                        if($datos[0]>=36 && $datos[0]<52){
                            $calificacion="Regular";
                            return $calificacion;
                        }
                        if($datos[0]>=52 && $datos[0]<68){
                            $calificacion="Suficiente";
                            return $calificacion;
                        }
                        if($datos[0]>=68 && $datos[0]<84){
                            $calificacion="Bueno";
                            return $calificacion;
                        }
                        if($datos[0]>=84 && $datos[0]<=100){
                            $calificacion="Excelente";
                            return $calificacion;
                        }
                    break;
                        
                        
                }
                
            }
            
            function traerPromedios($data){
                require_once("models/respuesta.php");
                require_once("models/pregunta.php");
                require_once("models/asignacion.php");
                require_once("models/oprespuesta.php");
                //var datos="esc="+a[1]+"&facu="+a[2]+"&annio="+a[3]+"&periodo="+a[4]+"&ciclo="+a[5]+"&codcurr="+a[6]+"&codcur="+a[7]
                //+"&coddoce="+a[8]+"&codmodalidad="+a[9]+"&boton=ReporteDocente";
                $datos = explode("*", $data);
               // print_r($datos);
                $esc=$datos[0];
                $facu=$datos[1];
                $annio=$datos[2];
                $periodo=$datos[3];
                $ciclo=$datos[4];
                $codcurr=$datos[5];
                $codcur=$datos[6];
                $coddoce=$datos[7];
                $codmodalidad=$datos[8];
                
                 $respuestas= new respuesta('', '', '','','','','','','');
                        $campo="re.`asignacione_id`*re.`pregunta_id`
                            *opres.`id`
                            *asig.`CODESC`*asig.CODFAC*asig.YYAKD*asig.CODPER*asig.YYCUR*
                            re.CODCURR*re.CODCUR*re.CODDOCE*re.`CODMODALIDAD`*pre.`dimensiones_id`";
                        
                        $operador="=*=*=*=*=*=*=*=*=*=*=*=*=";
                        $valor="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*1";
                        $separador="AND*AND*AND*AND*AND*AND*AND*AND*AND*AND*AND*AND";
                        $resD1 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor, $separador,'','');
                        $valor2="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*2";
                        $resD2 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor2, $separador,'','');
                        $valor3="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*3";
                        $resD3 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor3, $separador,'','');
                        $valor4="asig.`id`*pre.`id`*re.`oprespuesta_id`*$esc*$facu*$annio*$periodo*$ciclo*$codcurr*$codcur*$coddoce*$codmodalidad*4";
                        $resD4 = $respuestas->listar('opres.`valor`', $campo, $operador, $valor4, $separador,'','');
                        
                        $TresD1=count($resD1);
                        $al=$TresD1/4;
                        $i1=0;
                        $i2=4;
                        $i3=0;
                        $i4=8;
                        
                        $conta='1';
                                for($i=0;$i<$al;$i++){
                                    //TOTAL DIMENSION 1
                                     $dim=1;
                                     $total[$i][$dim]=0;
                                     for($j=$i1;$j<$i2;$j++){
                                         $total[$i][$dim]=$total[$i][$dim]+$resD1[$j][0];
                                    }

                                    //TOTAL DIMENSION 2
                                    $dim++;
                                    $total[$i][$dim]=0;
                                     for($j=$i1;$j<$i2;$j++){
                                         $total[$i][$dim]=$total[$i][$dim]+$resD2[$j][0];
                                    }
                                    
                                    //TOTAL DIMENSION 3
                                     $dim++;
                                    $total[$i][$dim]=0;
                                    for($k=$i3;$k<$i4;$k++){
                                         $total[$i][$dim]=$total[$i][$dim]+$resD3[$k][0];
                                    }
                                    
                                    //TOTAL DIMENSION 4
                                    $dim++;
                                    $total[$i][$dim]=0;
                                     for($j=$i1;$j<$i2;$j++){
                                         $total[$i][$dim]=$total[$i][$dim]+$resD4[$j][0];
                                    }
                                    
                                    //TOTAL POR ALUMNO
                                    $Ttotal[$i]=0;
                                    
                                    for($m=1;$m<=$dim;$m++){
                                        $Ttotal[$i]=$Ttotal[$i]+$total[$i][$m];
                                    }
                                    
                                    
                                    
                                     $i1=$i1+4;
                                     $i2=$i2+4;
                                     $i3=$i3+8;
                                     $i4=$i4+8;
                                     $conta++;
                                }
                                
                                 for($n=1;$n<=4;$n++){
                                    $suma=0;
                                    $prom[$n]=0;
                                    for($p=0;$p<$al;$p++){
                                        $suma=$total[$p][$n]+$suma;
                                        $prom[$n]=$suma/$al;
                                    }
                                    
                                }
                                $sumaprom=0;
                                $Pprom=0;
                                for($p=0;$p<$al;$p++){
                                        $sumaprom=$Ttotal[$p]+$sumaprom;
                                        $Pprom=$sumaprom/$al;
                                    }
                                    
                               $promedios = $prom[1]."*".$prom[2]."*".$prom[3]."*".$prom[4]."*".$Pprom;
                             //  print_r($promedios)."</br>";
                                return $promedios;
                               
            }
            
?>

