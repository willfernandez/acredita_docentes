<?php
    require_once("models/escuela.php");
    $idFAc=$_REQUEST['idFAc'];
    $escuela = new escuela("","","");
    $a=$escuela->listarSimple("","CODFAC","=",$idFAc,"","","");
    $html="<div class='xinput'>
            <label>Carrera</label>
            <select required='1' id='escuela_id' name='escuela' onchange='cargarCiclos();'>
           <option value=''>Seleccione.. </option>";
    $na=count($a);
    for($i=0;$i<$na;$i++){
        $html.="<option value='".$a[$i][0]."'>".$a[$i][2]."</option>";
    }
    $html.="</select></div><br/>";
    echo $html;
?>
