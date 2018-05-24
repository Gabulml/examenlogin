<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor
 *
 * @author Mayra
 */
class Proveedor {
   
     private $idproveedor;
    private $tipoidproveedor;
    private $nombreproveedor;
    private $fecnacproveedor;
    private $ciudnacproveedor;
    private $tipoproveedor;
    private $direccionproveedor;
    private $telefonoproveedor;
    private $emailproveedor;
    private $estadoproveedor;
    
    function __construct($idproveedor, $tipoidproveedor, $nombreproveedor,$fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor,$emailproveedor,$estadoproveedor) {
        $this->idproveedor = $idproveedor;
        $this->tipoidproveedor = $tipoidproveedor;
        $this->nombreproveedor = $nombreproveedor;
        $this->fecnacproveedor = $fecnacproveedor;
        $this->ciudnacproveedor = $ciudnacproveedor;
        $this->tipoproveedor = $tipoproveedor;
        $this->direccionproveedor = $direccionproveedor;
        $this->telefonoproveedor = $telefonoproveedor;
        $this->emailproveedor = $emailproveedor;
        $this->estadoproveedor = $estadoproveedor;
    }
    
    function getIdproveedor() {
        return $this->idproveedor;
    }

    function getTipoidproveedor() {
        return $this->tipoidproveedor;
    }

    function getNombreproveedor() {
        return $this->nombreproveedor;
    }

    function getFecnacproveedor() {
        return $this->fecnacproveedor;
    }

    function getCiudnacproveedor() {
        return $this->ciudnacproveedor;
    }

    function getTipoproveedor() {
        return $this->tipoproveedor;
    }

    function getDireccionproveedor() {
        return $this->direccionproveedor;
    }

    function getTelefonoproveedor() {
        return $this->telefonoproveedor;
    }

    function getEmailproveedor() {
        return $this->emailproveedor;
    }

    function getEstadoproveedor() {
        return $this->estadoproveedor;
    }

    function setIdproveedor($idproveedor) {
        $this->idproveedor = $idproveedor;
    }

    function setTipoidproveedor($tipoidproveedor) {
        $this->tipoidproveedor = $tipoidproveedor;
    }

    function setNombreproveedor($nombreproveedor) {
        $this->nombreproveedor = $nombreproveedor;
    }

    function setFecnacproveedor($fecnacproveedor) {
        $this->fecnacproveedor = $fecnacproveedor;
    }

    function setCiudnacproveedor($ciudnacproveedor) {
        $this->ciudnacproveedor = $ciudnacproveedor;
    }

    function setTipoproveedor($tipoproveedor) {
        $this->tipoproveedor = $tipoproveedor;
    }

    function setDireccionproveedor($direccionproveedor) {
        $this->direccionproveedor = $direccionproveedor;
    }

    function setTelefonoproveedor($telefonoproveedor) {
        $this->telefonoproveedor = $telefonoproveedor;
    }

    function setEmailproveedor($emailproveedor) {
        $this->emailproveedor = $emailproveedor;
    }

    function setEstadoproveedor($estadoproveedor) {
        $this->estadoproveedor = $estadoproveedor;
    }


    
}