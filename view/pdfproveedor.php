<?php

require_once '../model/Database.php';
require_once '../model/Proveedor.php';
require('../fpdf/fpdf.php');

class PDF extends FPDF {

    //Cabecera de página
    function Header() {

        $this->Image('../img/logoho.png');
//        $this->SetFont('Arial', 'B', 12);
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
    "ID", "TIPO_ID", "NOMBRE", "FECHA", "CIUDAD", "TIPO", "DIRECCION", "TELEFONO", "EMAIL","ESTADO"
);

$pdf = new PDF();
$pdf->AddPage('L','A3');

for ($i = 0; $i < count($lista); $i++) {
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(37, 30, $lista[$i], 1, 0, 'C');
}
$pdf->Ln( 10);
$pdo = Database::connect();
$sql = "select * from proveedor order by nombreproveedor";
$resultado = $pdo->query($sql);
//transformamos los registros en objetos:
$listado = array();
foreach ($resultado as $res) {
   
    $idproveedor = $res['idproveedor'];
    $tipoidproveedor = $res['tipoidproveedor'];
    $nombreproveedor = $res['nombreproveedor'];
    $fecnacproveedor = $res['fecnacproveedor'];
    $ciudnacproveedor = $res['ciudnacproveedor'];
    $tipoproveedor = $res['tipoproveedor'];
    $direccionproveedor = $res['direccionproveedor'];
    $telefonoproveedor = $res['telefonoproveedor'];
    $emailproveedor = $res['emailproveedor'];
    $estadoproveedor = $res['estadoproveedor'];
    
     if($tipoproveedor==1){
        $tipoproveedor="SI";        
    }
    else{
        $tipoproveedor="NO";        
    }
    if($estadoproveedor==1){
        $estadoproveedor="ACTIVO";        
    }
    else{
        $estadoproveedor="INACTIVO";        
    }
//Aquí escribimos lo que deseamos mostrar...
    $pdf->Cell(37, 30, $idproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $tipoidproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $nombreproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $fecnacproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $ciudnacproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $tipoproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $direccionproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $telefonoproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $emailproveedor, 1, 0, 'C');
    $pdf->Cell(37, 30, $estadoproveedor, 1, 0, 'C');
    $pdf->Ln( 10);
}
Database::disconnect();
//$pdf->AddPage();
$pdf->Output();
?>



