<?php
	$boton=$_REQUEST['boton'];
  if ($boton == 'GuardarOpciones'){
    $opciones = $_REQUEST['opciones'];
    $idPregunta = $_REQUEST['idPregunta'];
  }
    require_once("models/oprespuesta.php");
	switch($boton)
	{
    case 'GuardarOpciones':
                $opr = explode("/", $opciones);
                $nopr= count($opr);
                for($i=0;$i<$nopr;$i++){
                    $oprnv = explode("*", $opr[$i]);
                    $oprespuesta = new oprespuesta('',$idPregunta,$oprnv[0],$oprnv[1]);
                    $idOp=$oprespuesta->guardar();
                }
                        echo $idOp;
                        break;

}

?>