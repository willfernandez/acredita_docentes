<?php
ini_set('display_errors',0);
session_start();
if($_SESSION['autenticadoU']=='SI')
{
?>


<?php include ('includes/document_head.php') ?>  
<?php include ('includes/menu.php') ?>  
      <script type="text/javascript">
    $(function() {
        $('#fechaI').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-0:+3'});
        $('#fechaF').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-0:+3'});
    });
  </script>
<div class="container" style="margin-top: 60px;">
    <div class="row">
            <div class="page-header" >
                <h1>Asignaciones</h1>
            </div>
                <input type="hidden" id="idEncuesta"/>
            <div class="span3" id="titles">
				<h3>Nueva Asignación</h3>
                <p>Asigne la encuesta llenando el siguiente formulario.</p>
                <a class="btn btn-danger" href="frmHome.php">Terminar</a>
            </div>

            <div class="span9">
            		<div id="Nencuesta" class="well">
						<label>Encuesta</label>
						<div id="cEncuesta"></div>
                        <label>Semestre Académico</label>
                        <div class="xinput">
                            
                        <select id="YYAKD"  name="YYAKD" required='1'>
                            <option value="">Seleccione...</option>
                            <option value="2012">2012</option>
                        </select>
                        --
                        <select id="CODPER"  name="CODPER" required='1' >
                            <option value="">Seleccione...</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                        </select>
                        <label>Fecha Inicio - Fecha Fin para la encuesta</label>
                        <input type="text" id="fechaI" /> Hasta <input type="text" id="fechaF" />
                        <label>Sede</label>
                        <div id="cSede"></div>
                        <label>Facultad</label>
                        <div id="cFacultad"></div>
                       
                        <div id="cEscuela"></div>
                       <div id="cCiclo"></div>

                        <button class="btn btn-primary" onclick="guardarAsignacion();">Asignar</button>
					</div>
			</div>
    </div>
</div>
    <script type="text/javascript" src="js/scripts/jquery-min.js"></script>
  
<?php include ('includes/document_footer.php') ?>        
  <script type="text/javascript" src="js/frmAsignaciones_add.js"></script>  
<script type="text/javascript" src="js/scripts/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/scripts/jquery-ui-1.8.6.min.js"></script>
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