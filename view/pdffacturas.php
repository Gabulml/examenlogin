<?php

require_once '../model/Database.php';
require_once '../model/Facturas.php';
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
    "NUM.FAC", "PROVEEDOR", "USUARIO", "VALOR.FAC", "FECHA.FAC", "IVA.FAC"
);

$pdf = new PDF();
$pdf->AddPage('P', 'Letter');

for ($i = 0; $i < count($lista); $i++) {
    $pdf->SetFont('Times', '', 10.5);
    $pdf->Cell(30, 30, $lista[$i], 1, 0, 'C');
}
$pdf->Ln(10);
$pdo = Database::connect();
$sql = "select * from facturas order by idfactura desc";
$resultado = $pdo->query($sql);
//transformamos los registros en objetos:
$listado = array();
foreach ($resultado as $res) {
    $factura = new Facturas($res['idfactura'], $res['idproveedor'], $res['idusuario'], $res['valorfactura'], $res['fechafactura'], $res['ivafactura']);

    $idfactura = $res['idfactura'];
    $idproveedor = $res['idproveedor'];
    $idusuario = $res['idusuario'];
    $valorfactura = $res['valorfactura'];
    $fechafactura = $res['fechafactura'];
    $ivafactura = $res['ivafactura'];
//Aquí escribimos lo que deseamos mostrar...
    $pdf->Cell(30, 30, $idfactura, 1, 0, 'C');
    $pdf->Cell(30, 30, $idproveedor, 1, 0, 'C');
    $pdf->Cell(30, 30, $idusuario, 1, 0, 'C');
    $pdf->Cell(30, 30, $valorfactura, 1, 0, 'C');
    $pdf->Cell(30, 30, $fechafactura, 1, 0, 'C');
    $pdf->Cell(30, 30, $ivafactura, 1, 0, 'C');
    $pdf->Ln(10);
}
Database::disconnect();
$pdf->Output();
?>




