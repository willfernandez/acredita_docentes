<?php
ini_set('display_errors',0);
session_start();
if($_SESSION['autenticado']=='SI')
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Universidad José Carlos Mariátegui</title>
    <meta name="description" content="Sistema de Bienestar - Personal de la UJCM">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Equipo de acreditación UJCM">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="cssshadow/mystyle.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="cssshadow/bootstrap.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="cssshadow/bootstrap-responsive.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="cssshadow/bootstrap-responsive.min.css" type="text/css" media="screen"/>
       
        <script src="js/scripts/prefixfree.min.js"></script>
        <script src="js/scripts/jquery.js"></script>
        <script src="js/scripts/bootstrap-transition.js"></script>
        <script src="js/scripts/bootstrap-modal.js"></script>
	<script type="js/scripts/jquery.min.js"></script>
         <script src="js/scripts/bootstrap-tab.js"></script>
         <script src="js/scripts/bootstrap-dropdown.js"></script>
       <!--[if lt IE 9]>
<script type="text/javascript">
   document.createElement("nav");
   document.createElement("header");
   document.createElement("footer");
   document.createElement("section");
   document.createElement("article");
   document.createElement("aside");
       document.createElement("figure");
   document.createElement("hgroup");
</script>
<![endif]-->
    </head>
    <body>
       <div id="header">
	<div class="inner">
            <?php if($_SESSION['CODESCA']=='04'): ?>
            <span class="escuela"><img alt="logo" src='images/escuelas/SI2.png'/></span>
         <?php endif; ?>
		<div class="header-title">
			<h1>Universidad José Carlos Mariátegui</h1>
			<span>Oficina de Calidad, Acreditación y Autoevaluación Universitaria</span>
		</div>
	</div>
        </div>
        <div class="container" >
              <div class="marketing">
          
            <div class="span11">
                <section>
                        <div class="row">
                        <div class="span3">
                            <h5>Evaluación para el semestre: <?php echo $_SESSION['YYAKD'].'-'.$_SESSION['CODPER']  ?></h5>
                        </div>
                        </div>
                
                
                    <ul class="nav nav-tabs">
                            <li class="active">
                            <a href="#">Incio</a>
                            </li>
                            <li><a href="frmMisEncuestas.php"><strong>--> MIS ENCUESTAS</strong></a></li>
                             <li class="dropdown">
                                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="img/seguridad.png" alt="logo">
                                <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                       <a href="#">asdfs</a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </section>
                <section>
                    <article id="inicio">
                        <h4>Sistema de Evaluación al Docente</h4>
                        <p>
                            A través de estas encuestas Ud. podrá evaluar a los docentes del ciclo anterior 
                            con los cuales ha llevado algún curso.
                        </p>
                        
                        <h4>Consideraciones</h5>
                            <p>Antes de empezar Ud. debe tener en cuenta lo siguiente:
                                    <ul>
                                            <li>Para comenzar a participar en esta evaluación deberá hacerlo presionando la opción <span class="blue">"Mis encuestas"</span> situada en la parte superior</li> <br />
                                            <li>En la siguiente ventana se mostrará las asignaturas, docentes y el ciclo a la cual Ud. asistió, a cada curso se asignó una encuesta para la evaluación del catedrático.
                                            </li><br />
                                            <li>Una vez concluído el llenado de las encuestas para todos los cursos, aparecerá un botón para la impresión del comprobante, el cual deberá presentar al momento de matricularse junto con sus demás documentos académicos.</li>
                                    </ul>
                            </p>
                            <span id="right">
                                Aclarado el uso del sistema les deseamos buena suerte.!
                            </span>
                    </article>
                     <figure id="calidad">
                        <div id="ex3">
			<img src="images/calidad.jpg" width="70%" height="70%" />
			<div class="textoo">Oficina de Calidad, Autoevaluación y Acreditación Universitaria</div>
			</div>
                     </figure>
                </section>
            </div>
                    
           </div>        
        </div>
        <footer>
		<div class="inner">
		   © 2013 Universidad José Carlos Mariátegui <br />
		   Calle Ayacucho Nº 393. Moquegua - Perú Telf. 461110 Anexo 101 <br />
		   acreditacion.ujcm@gmail.com
		</div>
    </footer>
    </body>
    
</html>
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