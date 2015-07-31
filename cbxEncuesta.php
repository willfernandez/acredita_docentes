<?php
    require_once("models/encuesta.php");
    $encuesta = new encuesta("","","","");
    $a=$encuesta->listarSimple("id*titulo_encuesta","","","","","","");
    $html="<div class='xinput'>
            <select required='1' id='encuesta_id' name='encuesta''>
           <option value=''>Seleccione.. </option>";
    $na=count($a);
    for($i=0;$i<$na;$i++){
        $html.="<option value='".$a[$i][0]."'>".$a[$i][1]."</option>";
    }
    $html.="</select></div><br/>";
    echo $html;
?>
