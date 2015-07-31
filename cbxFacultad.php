<?php
    require_once("models/facultad.php");
    $facultad = new facultad("","");
    $a=$facultad->listarSimple("","","","","","","");
    $html="<div class='xinput'>
            <select required='1' id='facultad_id' name='facultad' onchange='cargarCarreras(this.value);'>
           <option value=''>Seleccione.. </option>";
    $na=count($a);
    for($i=0;$i<$na;$i++){
        $html.="<option value='".$a[$i][0]."'>".$a[$i][1]."</option>";
    }
    $html.="</select></div><br/>";
    echo $html;
?>
