<?php
	$boton=$_REQUEST['boton'];
  if ($boton == 'GuardarP'){
    $idEncuesta = $_REQUEST['idEncuesta'];
    $dimension = $_REQUEST['dimension'];
    $formulacion= $_REQUEST['formP'];
  }
  if($boton == 'Listar'){
     $idEncuesta = $_REQUEST['idEncuesta'];
  }
    require_once("models/pregunta.php");
	switch($boton)
	{
    case 'GuardarP':
                        $pregunta = new pregunta('',$dimension,$idEncuesta,htmlentities("$formulacion", ENT_QUOTES,"UTF-8") );
                        $idEncuesta = $pregunta->guardar();
                        echo $idEncuesta;
    break;

    case 'Listar':
                        $pregunta = new pregunta('','','','');
                        $a  = $pregunta->listarSimple('id*formulacion_pregunta*dimensiones_id','encuestas_id','=',$idEncuesta,'','','');
                        $na = count($a);
                        if( $na > 0){
                                $html="<table class='table table-hover table-bordered  table-striped' id='cListado' >";
                                $html.="<thead><tr><th>N°</th><th>Pregunta</th><th>Acciones</th></tr></thead><tbody>";
                                $c=0;
                                for($i=0;$i<$na;$i++){
                                    $c++;
                                    $html.="<tr><td>".$c."</td>";
                                    $html.="<td>".$a[$i][1]."</td>";
                                    $html.="<td>".$a[$i][2]."</td></tr>";
                                }
                                $html.="</tbody></table>";
                                echo $html;
                        }
    break;

}

?>