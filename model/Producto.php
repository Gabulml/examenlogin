<?php

/**
 * Método que contiene los datos de los campos de la tabla producto
 *
 * @author Jhonatan Dominguez
 */
class Producto {
    private $idproducto;//clave primaria de la tabla productos
    private $nombreproducto;//nombre del producto
    private $ivaproducto;//campo para saber si grava o no grava iva
    private $pvpproducto;//precio de venta publica sugerida del producto
    private $valorIva=0.12;//precio de venta publica sugerida del producto
    function getValorIva() {
        return $this->valorIva;
    }

    function setValorIva($valorIva) {
        $this->valorIva = $valorIva;
    }

        function __construct($idproducto, $nombreproducto, $ivaproducto, $pvpproducto) {//constuctor clase producto
        $this->idproducto = $idproducto;
        $this->nombreproducto = $nombreproducto;
        $this->ivaproducto = $ivaproducto;
        $this->pvpproducto = $pvpproducto;
    }

    function getIdproducto() {//método para obtener el id producto
        return $this->idproducto;
    }

    function getNombreproducto() {//método para obtener el nombre del producto
        return $this->nombreproducto;
    }

    function getIvaproducto() {//método para obtener si grava o  no iva el producto
        return $this->ivaproducto;
    }

    function getPvpproducto() {//método para saber el precio de venta pública del producto
        return $this->pvpproducto;
    }

    function setIdproducto($idproducto) {//método para editar el id del producto
        $this->idproducto = $idproducto;
    }

    function setNombreproducto($nombreproducto) {//método para editar el nombre del producto
        $this->nombreproducto = $nombreproducto;
    }

    function setIvaproducto($ivaproducto) {//método para editar si grava o no iva el producto
        $this->ivaproducto = $ivaproducto;
    }

    function setPvpproducto($pvpproducto) {//método para editar el precio de venta pública del producto
        $this->pvpproducto = $pvpproducto;
    }
}
