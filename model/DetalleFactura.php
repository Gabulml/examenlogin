<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleFcactura
 *
 * @author GABY
 */
class DetalleFactura {
    
    private $iddetalle;
    private $idproducto;
    private $idfactura;
    private $cantidadproducto;
    private $unidades;
    private $descuento;
    private $cantdescuento;
    private $NombreProducto;
    private $precio;
    private $porcentajeIva=0.12;
    private $Subtotal;
    function getSubtotal() {
        return $this->Subtotal;
    }

    function setSubtotal($Subtotal) {
        $this->Subtotal = $Subtotal;
    }

        function getPorcentajeIva() {
        return $this->porcentajeIva;
    }

    function setPorcentajeIva($porcentajeIva) {
        $this->porcentajeIva = $porcentajeIva;
    }

        function getNombreProductosss() {
        
        return $this->NombreProducto;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setNombreProducto($NombreProducto) {
        $this->NombreProducto = $NombreProducto;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    
    function getIddetalle() {
        return $this->iddetalle;
    }

    function    getIdproductoss() {
        return $this->idproducto;
    }
    

    function getIdfactura() {
        return $this->idfactura;
    }

    function getCantidadproducto() {
        return $this->cantidadproducto;
    }

    function getUnidades() {
        return $this->unidades;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getCantdescuento() {
        return $this->cantdescuento;
    }

    function setIddetalle($iddetalle) {
        $this->iddetalle = $iddetalle;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setIdfactura($idfactura) {
        $this->idfactura = $idfactura;
    }

    function setCantidadproducto($cantidadproducto) {
        $this->cantidadproducto = $cantidadproducto;
    }

    function setUnidades($unidades) {
        $this->unidades = $unidades;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setCantdescuento($cantdescuento) {
        $this->cantdescuento = $cantdescuento;
    }



}
