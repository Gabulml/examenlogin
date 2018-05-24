<?php

require_once '../model/Database.php';
require_once '../model/ProveedoresCredito.php';

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
    "NOMBRE PROVEEDOR ", "CREDITO","N. FACTURA","SALDOS"
);

$pdf = new PDF();
$pdf->AddPage();

for ($i = 0; $i < count($lista); $i++) {
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(45, 30, $lista[$i], 1, 0, 'C');
}
$pdf->Ln(10);
$pdo = Database::connect();
        $sql = "select nombreproveedor, tipoproveedor, idfactura, valorfactura from proveedor p left join facturas f on p.idproveedor=f.idproveedor";
        $resultado = $pdo->query($sql);
$listado = array();
foreach ($resultado as $res) {
    $nombreproveedor = $res['nombreproveedor'];
    $tipoproveedor = $res['tipoproveedor'];
    $idfactura = $res['idfactura'];
    $valorfactura = $res['valorfactura'];
if($tipoproveedor==1){
        $tipoproveedor="SI";        
    }
//    else{
//        $tipoidproveedor="NO";        
//    }
    //Aquí escribimos lo que deseamos mostrar...    
    $pdf->Cell(45, 30, $nombreproveedor, 1, 0, 'C');
    $pdf->Cell(45, 30, $tipoproveedor, 1, 0, 'C');
     $pdf->Cell(45, 30, $idfactura, 1, 0, 'C');
      $pdf->Cell(45, 30, $valorfactura, 1, 0, 'C');
    $pdf->Ln(10);
}
Database::disconnect();
//$pdf->AddPage();
$pdf->Output();
?>

