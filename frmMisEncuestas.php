<?php
ini_set('display_errors',0);
session_start();
if($_SESSION['autenticado']=='SI')
{
?>
<!DOCTYPE html>
<html lang="es">
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
	 <img alt="logo" src='images/logo2.png'/>
		<div class="header-title">
			<h1>Universidad José Carlos Mariátegui</h1>
			<span>Oficina de Calidad, Acreditación y Autoevaluación Universitaria</span>
		</div>
	</div>
        </div>
        <div class="container">
            <div class="marketing">
                
                    <div class="row">
                        <div class="span2">
                            <h5>Evaluación para el semestre: <?php echo $_SESSION['YYAKD'].'-'.$_SESSION['CODPER']  ?></h5>
                        </div>
                        </div>
                    <input id="CODALU" type="hidden" value="<?php echo $_SESSION['CODALU']?>">
                    <input id="CODPER" type="hidden" value="<?php echo $_SESSION['CODPER']?>">
                    <input id="CODYY" type="hidden" value="<?php echo $_SESSION['YYAKD']?>">
                    <nav>
                    <div class='span9 offset1'>
                            <ul class="nav nav-tabs">
                                    <li>
                                    <a href="frmBienvenida.php">Incio</a>
                                    </li>
                                    <li class="active"><a href="frmMisEncuestas.php"><strong>--> MIS ENCUESTAS</strong></a></li>
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
                        </div>
                 </nav>
                <section>
                    <article> 
                        <div class='span8 offset1'>
                                <div id="misencuestas">
                                <img src="images/loading.gif" style="margin-left:40%; margin-top: 5%"/>
                                </div>
                            </div>
                    </article>
                </section>     
           </div>        
        </div>
        <footer>
		<div class="inner">
		   © 2013 Universidad José Carlos Mariátegui <br />
		   Calle Ayacucho Nº 393. Moquegua - Perú Telf. 461110 Anexo 101 <br />
		   acreditacion.ujcm@gmail.com
		</div>
    </footer>
        <script src="js/frmMisEncuestas.js" type="text/javascript" ></script>
    </body>
    
</html>

<?php
}
else{
	echo "Ud. no est&aacute; autorizado para ver esta p&aacute;gina...";
        
?>

<html>
<head>
<meta http-equiv="Refresh" content="2;url=frmLogin.php">
</head>

</html>

<?php 
}
?>