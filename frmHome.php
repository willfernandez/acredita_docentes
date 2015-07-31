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
        <div class="span9">
            <div class="page-header">
                <h1>Bienvenido</h1>
            </div>
        </div>
    </div>
</div>
    
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