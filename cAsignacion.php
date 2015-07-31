<?php
	$boton=$_REQUEST['boton'];
  if ($boton == 'GuardarAsig'){
    $encuesta_id = $_REQUEST['encuesta_id'];
    $YYAKD = $_REQUEST['YYAKD'];
    $CODPER = $_REQUEST['CODPER'];
    $fechaI = $_REQUEST['fechaI'];
    $fechaF = $_REQUEST['fechaF'];
    $sede_id = $_REQUEST['sede_id'];
    $facultad_id = $_REQUEST['facultad_id'];
    $escuela_id = $_REQUEST['escuela_id'];
    $ciclo_id = $_REQUEST['ciclo_id'];
  }
    require_once("models/asignacion.php");
	switch($boton)
	{
    case 'GuardarAsig':
                        $asignacion = new asignacion('',$sede_id,$escuela_id,$facultad_id,$encuesta_id,$fechaI,$fechaF,$ciclo_id,$YYAKD,$CODPER);
                        $idAsig = $asignacion->guardar();
                        echo $idAsig;
    break;

    case 'listarAsig':

                        $asignacion = new asignacion('','', '','','','','','','','');
                        $a = $asignacion->listar("asig.`id`*en.`titulo_encuesta`*vs.`SEDE`*ve.`NOMESC`*asig.`YYCUR`*asig.`YYAKD`*asig.`CODPER`","asig.`CODSEDE`*asig.`CODESC`*asig.`CODFAC`*asig.`encuestas_id`","=*=*=*=","vs.`CODSEDE`*ve.`CODESC`*ve.`CODFAC`*en.`id`","AND*AND*AND",'','');
                        $na = count($a);
                        $html="<table style='margin-top: 24px;' align='center' class='table table-striped dataTable' id='tasig'>
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Encuesta</th>
                                    <th>Periodo</th>
                                    <th>Sede</th>
                                    <th>Carrera</th>
                                    <th>Ciclo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>";
                        for($i=0;$i<$na;$i++){

                        $html.="<tr><td>".$a[$i][0]."</td>";
                        $html.="<td>".$a[$i][1]."</td>";
                        $html.="<td>".$a[$i][5]."-".$a[$i][6]."</td>";
                        $html.="<td>".$a[$i][2]."</td>";
                        $html.="<td>".$a[$i][3]."</td>";
                        $html.="<td>".$a[$i][4]."</td>";
                        $html.="<td><a href='#myModal' data-toggle='modal' class='view' title='Ver'   id='Detalle' ></a> <a class='delete' title='borrar' id='Ficha' > </a> </td></tr>";
                        }
                        $html.="</tbody></table>";
                        echo $html;

    break;

}
                                                                                                                                                   

?>

