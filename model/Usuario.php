<?php

/**
 * Método que contiene los datos de los campos de la tabla usuario
 *
 * @author Dayana Vila
 */
class Usuario {

    private $idusuario; //clave primaria tabla usuario
    private $tipoidusuario; // tipo de identificador de usuario (cédula, pasaporte, ruc)
    private $rolusuario; //rol del usuario administrador, cajero
    private $nombreusuario; //nombre del usuario
    private $fecnacusuario; //fecha de nacimiento del usuario
    private $ciunacusuario; //ciudad de nacimiento del usuario
    private $direccionusuario; //dirección del domicilio del usuario
    private $telefonousuario; //telefono del usuario
    private $emailusuario; //email del usuario
    private $estadousuario; //estado del usuario

    function __construct($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario) {
        $this->idusuario = $idusuario;
        $this->tipoidusuario = $tipoidusuario;
        $this->rolusuario = $rolusuario;
        $this->nombreusuario = $nombreusuario;
        $this->fecnacusuario = $fecnacusuario;
        $this->ciunacusuario = $ciunacusuario;
        $this->direccionusuario = $direccionusuario;
        $this->telefonousuario = $telefonousuario;
        $this->emailusuario = $emailusuario;
        $this->estadousuario = $estadousuario;
    }

    function getIdusuario() {//método para obtener el id del usuario
        return $this->idusuario;
    }

    function getTipoidusuario() {//método para obtener el tipo del id del usuario
        return $this->tipoidusuario;
    }

    function getRolusuario() {//método para obtener el rol del usuario
        return $this->rolusuario;
    }

    function getNombreusuario() {//método para obtener el nombre del usuario
        return $this->nombreusuario;
    }

    function getFecnacusuario() {//método para obtener la fecha de nacimiento del usuario
        return $this->fecnacusuario;
    }

    function getDireccionusuario() {//método para obtener la dirección del usuario
        return $this->direccionusuario;
    }

    function getTelefonousuario() {//método para obtener el teléfono del usuario
        return $this->telefonousuario;
    }

    function getEmailusuario() {//método para obtener el email del usuario
        return $this->emailusuario;
    }

    function getEstadousuario() {//método para obtener el estado del usuario
        return $this->estadousuario;
    }

    function setIdusuario($idusuario) {//método para editar el id del usuario
        $this->idusuario = $idusuario;
    }

    function setTipoidusuario($tipoidusuario) {//método para editar el tipo del usuario
        $this->tipoidusuario = $tipoidusuario;
    }

    function setRolusuario($rolusuario) {//método para editar el rol del usuario
        $this->rolusuario = $rolusuario;
    }

    function setNombreusuario($nombreusuario) {//método para editar el nombre del usuario
        $this->nombreusuario = $nombreusuario;
    }

    function setFecnacusuario($fecnacusuario) {//método para editar la fecha de nacimiento del usuario
        $this->fecnacusuario = $fecnacusuario;
    }

    function setDireccionusuario($direccionusuario) {//método para editar la dirección del usuario
        $this->direccionusuario = $direccionusuario;
    }

    function setTelefonousuario($telefonousuario) {//método para editar el teléfono del usuario
        $this->telefonousuario = $telefonousuario;
    }

    function setEmailusuario($emailusuario) {//método para editar el email del usuario
        $this->emailusuario = $emailusuario;
    }

    function setEstadousuario($estadousuario) {//método para editar el estado del usuario
        $this->estadousuario = $estadousuario;
    }

    function getCiunacusuario() {
        return $this->ciunacusuario;
    }

    function setCiunacusuario($ciunacusuario) {
        $this->ciunacusuario = $ciunacusuario;
    }

}
