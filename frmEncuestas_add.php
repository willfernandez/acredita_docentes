<?php
ini_set('display_errors',0);
session_start();
if($_SESSION['autenticadoU']=='SI')
{
?>


<?php include ('includes/document_head.php') ?>  
<?php include ('includes/menu.php') ?>  
    
<div class="container" style="margin-top: 60px;">
    <div class="row">
            <div class="page-header" >
                <h1>Encuestas</h1>
            </div>
                <input type="hidden" id="idEncuesta"/>
            <div class="span3" id="titles">
				<h3>Nueva Encuesta</h3>
				<p>Desde aquí Ud. puede crear una nueva encuesta.</p>
            </div>

            <div class="span9">
            		<div id="Nencuesta" class="well">
						<label>Título de la Encuesta</label>
						<input id="tituloE" class="span7 :required" type="text" maxlength="120"><br/>
                         <input type="button" class="btn btn-inverse" value="Guardar" onclick="GuardarEncuesta();"/>
					</div>
			</div>
    </div>

    <div class="modal hide fade" id="agregarPregunta">
            <div class="modal-header" >
            <a class="close" data-dismiss="modal">×</a>
            <h3>Encuesta</h3>
            <small style="font-size:11px">Agregar preguntas</small>
            </div>
            <div class="modal-body">
                <div id="reg-content" style="width:500px">
                    <div id="reg_box"  style="width:470px">
                        <fieldset class="well" style="padding:10px 12px">
                            <div id="idReg" style="visibility:hidden"> </div>
                            <div class="input select">
                                <label>Dimensión</label>
                                <div class="xinput">
                                <select id="dimension"  name="dimension" class=":required">
                                <option value="">Seleccione...</option>
                                <option value="1">Programación y Organización</option>
                                <option value="2">Habilidades Motivación</option>
                                <option value="3">Capacidad</option>
                                <option value="4">Evaluación</option>
                                </select>
                                </div>
                        	 </div>

                             <label for="PreguntaFormulacionPregunta">Formule la pregunta</label>
                             <textarea id="PreguntaFormulacionPregunta" class="span5 :required" cols="20" rows="1" style="border-color: orangered;"></textarea>
                             <label>Respuestas </label>
                             <strong>Opción 1:<strong>&nbsp;<input id="op1_1" type="text" value="Muy Deficiente" class="span2"/> &nbsp;&nbsp;<strong>Valor:</strong> &nbsp;<input id="op1_2" type="text" value="1" class="span1" /><br/>
                             <strong>Opción 2:<strong>&nbsp;<input id="op2_1" type="text" value="Deficiente" class="span2"/> &nbsp;&nbsp;<strong>Valor:</strong> &nbsp;<input id="op2_2" type="text" value="2" class="span1" /><br/>
                             <strong>Opción 3:<strong>&nbsp;<input id="op3_1" type="text" value="Regular" class="span2"/> &nbsp;&nbsp;<strong>Valor:</strong> &nbsp;<input id="op3_2" type="text" value="3" class="span1" /><br/>
                             <strong>Opción 4:<strong>&nbsp;<input id="op4_1" type="text" value="Bien" class="span2"/> &nbsp;&nbsp;<strong>Valor:</strong> &nbsp;<input id="op4_2" type="text" value="4" class="span1" /><br/>
                             <strong>Opción 5:<strong>&nbsp;<input id="op5_1" type="text" value="Muy Bien" class="span2"/> &nbsp;&nbsp;<strong>Valor:</strong> &nbsp;<input id="op5_2" type="text" value="5" class="span1" /><br/>
                   		 </fieldset>
                    
                    </div>
                    </div>
                
             
            </div>
             <div class="modal-footer">
                 <div class="action">
                    <button class="btn btn-success" data-dismiss="modal" onclick="guardarPregunta();" >Registrarse</button>
                    <a class="btn" data-dismiss="modal" href="#">Cerrar</a>
                 </div>
                
            </div>
        </div>
</div>
  <script type="text/javascript" src="js/frmEncuestas.js"></script>  
    <script type="text/javascript" src="js/scripts/jquery-min.js"></script>
  
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