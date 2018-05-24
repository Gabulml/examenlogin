<?php
$inventario_URL = "https://wsinventario.herokuapp.com/product";
$inventario_json = file_get_contents($inventario_URL);
$inventario_array = json_decode($inventario_json, true);
var_dump($inventario_array["data"][3]["ID_PROD"]);
//print_r($inventario_array);
session_start();
require_once '../model/CrudModel.php';
$crudModel = new CrudModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>PRODUCTO</th>
                    <th>DESCRIPCION</th>
                    <th>IVA</th>
                    <th>COSTO COMPRA</th>
                    <th>PRECIO VENTA</th>
                    <th>ESTADO</th>
                    <th>STOCK</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i <= count($inventario_array) + 2; $i++) {
                    if ($inventario_array["data"][$i]["GRABA_IVA_PROD"] == "S") {


                        $iva = "true";
                    } else {
                        $iva = "false";
                    }
                    if ($inventario_array["data"][$i]["ESTADO_PROD"] == "A") {
                        $estado = "Activo";
                    } else {
                        $estado = "Inactivo";
                    }

                    $crudModel->insertarProducto($inventario_array["data"][$i]["ID_PROD"], $inventario_array["data"][$i]["NOMBRE_PROD"], $inventario_array["data"][$i]["COSTO_PROD"], $iva);
                    echo "<tr>";
                    echo "<td>" . $inventario_array["data"][$i]["ID_PROD"] . "</td>";
                    echo "<td>" . $inventario_array["data"][$i]["NOMBRE_PROD"] . "</td>";
                    echo "<td>" . $inventario_array["data"][$i]["DESCRIPCION_PROD"] . "</td>";
                    echo "<td>" . $iva . "</td>";
                    echo "<td>" . $inventario_array["data"][$i]["COSTO_PROD"] . "</td>";
                    echo "<td>" . $inventario_array["data"][$i]["PVP_PROD"] . "</td>";
                    echo "<td>" . $estado . "</td>";
                    echo "<td>" . $inventario_array["data"][$i]["STOCK_PROD"] . "</td>";
                    echo "</tr>";

                   
                }
                 header('Location: FacturasIngresar.php');
                ?>
            </tbody>
        </table>
    </body>
</html>
