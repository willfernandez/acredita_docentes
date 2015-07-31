<?php
ini_set('display_errors',0);
session_start();
if($_SESSION['autenticadoU']=='SI')
{
?>


<?php include ('includes/document_head.php') ?>  
<?php include ('includes/menu.php') ?>  
    
    
<div class="container" style="margin-top: 60px;width:auto;">
        <div style="width: auto; margin-left: 20px">
               <div class="page-header">
                    <h1><?php echo $_REQUEST['nom']; ?><small>  Reportes</small></h1> 
                    <input type="hidden" id="nomesc" value="<?php echo$_REQUEST['nom']; ?>" />
                    <input type="hidden" id="codfacu" value="<?php echo $_REQUEST['facu']; ?>" />
                    <input type="hidden" id="codesc" value="<?php echo $_REQUEST['esc']; ?>" />
               </div>
                <div class="row">
                    <div class="span3">
                         <label>Seleccione Año Académico</label>
                            <select id="annio" name="annio" >
                                    <option value="" selected>Seleccione</option>
                                    <option value="2011" >2011</option>
                                    <option value="2012" >2012</option>
                            </select>
                    </div>
                    <div class="span3">  
                        <label>Seleccione Periodo</label>
                        <select id="periodo" name="periodo" >
                                <option value="" selected>Seleccione</option>
                                <option value="1" >01</option>
                                <option value="2">02</option>
                        </select>
                    </div>
                     <div class="span2">
                            <label>Seleccione su Ciclo</label>
                            <select id="ciclo" name="ciclo">
                                    <option value="" selected>Seleccione</option>
                                    <option value="01" >I</option>
                                    <option value="02" >II</option>
                                    <option value="03" >III</option>
                                    <option value="04" >IV</option>
                                    <option value="05" >V</option>
                                    <option value="06" >VI</option>
                                    <option value="07" >VII</option>
                                    <option value="08" >VIII</option>
                                    <option value="09" >IX</option>
                                    <option value="10" >X</option>
                                    <option value="11" >XI</option>
                                    <option value="12" >XII</option>
                            </select>
                        </div>
                    <div class="span2" style="margin-top: 20px">
                        <a class="btn btn-success" type="button" onclick="VerReporte()">Ver Reportes Individual</a>
                    </div>
                     <div class="span2" style="margin-top: 20px">
                        <a class="btn btn-danger" type="button" onclick="verReporteCursosCiclos()">Ver Reportes<br/> General</a>
                    </div>
                </div>
            
            <div class="row">
                <div style="width: auto; margin-left: 20px;margin-top: 20px;">
                    <div id="vcarreras">
                        
                    </div>
                </div>
            </div>
        </div>
</div>
    <script src="js/frmReportes.js"></script>
<?php include ('includes/document_footer.php') ?>        

<?php
}
else{
    echo "Ud. no est&aacute; autorizado para ver esta p&aacute;gina...";
        
?>

<html>
<head>
<meta http-equiv="Refresh" content="4;url=frmAdmin.php">
</head>

</html>

<?php 
}
?>