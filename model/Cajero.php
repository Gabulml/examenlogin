<?php

/**
 * Método que contiene los datos de los campos de la tabla reporte
 *
 * @author Saúl Cisneros
 */
class Cajero {

    private $nombreusuario; //clave foránea de la tabla login que viene de la tabla usuario
    private $estadousuario; //clave primaria de la tabla login

    function __construct($nombreusuario, $estadousuario) {
        $this->nombreusuario = $nombreusuario;
        $this->estadousuario = $estadousuario;
    }

    function getNombreusuario() {
        return $this->nombreusuario;
    }

    function getEstadousuario() {
        return $this->estadousuario;
    }

    function setNombreusuario($nombreusuario) {
        $this->nombreusuario = $nombreusuario;
    }

    function setEstadousuario($estadousuario) {
        $this->estadousuario = $estadousuario;
    }

}
