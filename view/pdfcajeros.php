<?php

require_once '../model/Database.php';
require_once '../model/Cajero.php';

require('../fpdf/fpdf.php');

class PDF extends FPDF {

    //Cabecera de página
    function Header() {

        $this->Image('../img/logoup.png');
        $this->Ln(10);
    }

    //Pie de página
    function Footer() {
//Posición: a 1,5 cm del final
        $this->SetY(-15);
//Arial italic 8
        $this->SetFont('Arial', 'I', 8);
//Número de página
        $this->Cell(0, 10, 'PAGINA  ' . $this->PageNo(), 0, 0, 'C');
    }

}

$lista = array(
    "NOMBRE CAJERO", "ESTADO CAJERO"
);

$pdf = new PDF();
$pdf->AddPage();

for ($i = 0; $i < count($lista); $i++) {
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(37, 30, $lista[$i], 1, 0, 'C');
}
$pdf->Ln(10);
$pdo = Database::connect();
$sql = "select nombreusuario, estadousuario from usuario where rolusuario='C'";
$resultado = $pdo->query($sql);
$listado = array();
foreach ($resultado as $res) {
    $nombreusuario = $res['nombreusuario'];
    $estadousuario = $res['estadousuario'];
    if($estadousuario==1){
        $estadousuario="ACTIVO";        
    }
    else{
        $estadousuario="INACTIVO";        
    }
    //Aquí escribimos lo que deseamos mostrar...    
    $pdf->Cell(37, 30, $nombreusuario, 1, 0, 'C');
    $pdf->Cell(37, 30, $estadousuario, 1, 0, 'C');
    $pdf->Ln(10);
}
Database::disconnect();
//$pdf->AddPage();
$pdf->Output();
?>
