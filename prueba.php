<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
   //Cabecera de p�gina
   function Header()
   {

   }

function Footer()
{

// Posici�n: a 1,5 cm del final
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// N�mero de p�gina
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }

	   function dibujar(){

		   $this->SetFillColor(255,255,255);
		   
		    $this->SetDrawColor(128,0,0);
		    $this->SetLineWidth(.3);
		    $this->SetFont('','B');
    	   $this->Cell(190,130,'',1,0,'C',true);
		   $this->Image('img/logo_login.png',10,13,30);

       $this->Image('images/qr_img.png',155,55,40,40);
       
    	   $this->Image('cssshadow/img/compo.png',9,10,192,130);
	   }
}

//Creaci�n del objeto de la clase heredada
session_start();
$codigo =  $_SESSION['CODALU'];
$nombres = convertirtildes($_SESSION['NomAlu']);
$apellidos = convertirtildes($_SESSION['ApeALu']);
$carreras= $_SESSION['ESC'];
$carrera = convertirtildes($carreras);
$facultades = $_SESSION['NOMFAC'];
$facultad = convertirtildes($facultades);
$ciclo = $_SESSION['CICLO'];
$semestre = $_SESSION['YYAKD'];
$semestre.="-".$_SESSION['CODPER'];

$cursos =  $_SESSION['cursos'];
$cm=explode("*",$cursos);
$total=count($cm);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->dibujar();
$pdf->SetTextColor(0);

$pdf->SetXY(60,14);
$pdf->Write(3,'UNIVERSIDAD JOS� CARLOS MARI�TEGUI');
$pdf->SetXY(80,19);
$pdf->SetFont('Arial','',8);
$pdf->Write(1,'VICE RECTORADO ACAD�MICO');
$pdf->SetTextColor(29,42,91);
$pdf->SetXY(55,38);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'CONSTANCIA DE EVALUACI�N AL DOCENTE');
$pdf->SetXY(155,32);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'SEMESTRE '.$semestre);

$pdf->SetTextColor(29,42,91);
$pdf->SetXY(25,47);
$pdf->SetFont('Arial','B',11);
$pdf->Write(1,'C�DIGO');
//
$pdf->SetFont('Arial','B',5);
$pdf->SetXY(170,133);
$pdf->Write(1,'By: ACREDITACI�N');

$pdf->SetXY(50,47);
$pdf->SetFont('Arial','B',11);
$pdf->Write(1,':');

$pdf->SetXY(55,47);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,$codigo);

$pdf->SetTextColor(29,42,91);
$pdf->SetXY(25,53);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'NOMBRES');

$pdf->SetXY(50,53);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,':');
$pdf->SetXY(55,53);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,$nombres);

$pdf->SetTextColor(29,42,91);
$pdf->SetXY(25,59);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'APELLIDOS');

$pdf->SetXY(50,59);
$pdf->SetFont('Arial','B',0);
$pdf->Write(1,':');

$pdf->SetXY(55,59);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,$apellidos);


$pdf->SetTextColor(29,42,91);
$pdf->SetXY(25,65);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'FACULTAD');

$pdf->SetXY(50,65);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,':');

$pdf->SetXY(55,65);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,$facultad);

$pdf->SetTextColor(29,42,91);
$pdf->SetXY(25,71);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'CARRERA');

$pdf->SetXY(50,71);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,':');

$pdf->SetXY(55,71);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,$carrera);


$pdf->SetTextColor(29,42,91);
$pdf->SetXY(108,47);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'CICLO');

$pdf->SetXY(130,47);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,':');

$pdf->SetXY(135,47);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,$ciclo);

$pdf->SetTextColor(29,42,91);
$pdf->SetXY(25,77);
$pdf->SetFont('Arial','B',10);
$pdf->Write(1,'CURSOS');

$pdf->SetXY(50,77);
$pdf->SetFont('Arial','I',11);
$pdf->Write(1,':');

$espacio=77;

for($i=0;$i<$total;$i++){
  $pdf->SetXY(55,$espacio);
  $pdf->Write(3,$cm[$i]);
  $espacio = $espacio+5;
}

function convertirtildes($dato) {
        $dato = str_replace ('&aacute;','�', $dato);
        $dato = str_replace ('&eacute;','�', $dato);
        $dato = str_replace ('&iacute;','�', $dato);
        $dato = str_replace ('&oacute;','�', $dato);
        $dato = str_replace ('&uacute;','�', $dato);
        $dato = str_replace ('&ntilde;','�', $dato);
        $dato = str_replace ('&Aacute;','�', $dato);
        $dato = str_replace ('&Eacute;','�', $dato);
        $dato = str_replace ('&Iacute;','�', $dato);
        $dato = str_replace ('&Oacute;','�', $dato);
        $dato = str_replace ('&Uacute;','�', $dato);
        $dato = str_replace ('&Ntilde;','�', $dato);
        return $dato;
        }
$pdf->Output('Comprobante_OBU.pdf','D');


?>
