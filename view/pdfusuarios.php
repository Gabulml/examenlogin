<?php

require_once '../model/Database.php';
require_once '../model/Usuario.php';
require('../fpdf/fpdf.php');

class PDF extends FPDF {

    //Cabecera de página
    function Header() {

        $this->Image('../img/logoho.png');
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
    "ID USUARIO", "TIPO ID", "ROL", "NOMBRE", "FECHA NAC.", "CIUDAD NAC.", "DIRECCION", "TELF", "EMAIL","ESTADO"
);

$pdf = new PDF();
$pdf->AddPage('L','Legal');

for ($i = 0; $i < count($lista); $i++) {
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(35, 30, $lista[$i], 1, 0, 'C');
}
$pdf->Ln( 10);
$pdo = Database::connect();
$sql = "select * from usuario order by nombreusuario";
$resultado = $pdo->query($sql);
//transformamos los registros en objetos:
$listado = array();
foreach ($resultado as $res) {
    $usuario = new Usuario($res['idusuario'], $res['tipoidusuario'], $res['rolusuario'], $res['nombreusuario'],
                    $res['fecnacusuario'],$res['ciunacusuario'], $res['direccionusuario'], $res['telefonousuario'], 
                    $res['emailusuario'], $res['estadousuario']);

    $idusuario = $res['idusuario'];
    $tipoidusuario = $res['tipoidusuario'];
    $rolusuario = $res['rolusuario'];
    $nombreusuario = $res['nombreusuario'];
    $fecnacusuario = $res['fecnacusuario'];
    $ciunacusuario = $res['ciunacusuario'];
    $direccionusuario = $res['direccionusuario'];
    $telefonousuario = $res['telefonousuario'];
    $emailusuario = $res['emailusuario'];
    $estadousuario = $res['estadousuario'];
    
    if($rolusuario=='C'){
        $rolusuario="CAJERO";        
    }
    else{
        $rolusuario="ADMINISTRADOR"; 
    }
    if($estadousuario==1){
        $estadousuario="ACTIVO";        
    }
    else{
        $estadousuario="INACTIVO"; 
    }
//Aquí escribimos lo que deseamos mostrar...
    $pdf->Cell(35, 30, $idusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $tipoidusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $rolusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $nombreusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $fecnacusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $ciunacusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $direccionusuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $telefonousuario, 1, 0, 'C');
    $pdf->Cell(35, 30, $emailusuario, 1, 0, 'C');
     $pdf->Cell(35, 30, $estadousuario, 1, 0, 'C');
    $pdf->Ln( 10);
}
Database::disconnect();
$pdf->Output();
?>



