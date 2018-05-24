<?php

/**
 * Método que contiene los datos de los campos de la tabla login
 *
 * @author Saúl Cisneros
 */
class Login {
    private $idusuario;//clave foránea de la tabla login que viene de la tabla usuario
    private $idlogin;//clave primaria de la tabla login
    private $passwordlogin;//password de la tabla login
    
    function __construct($idusuario, $idlogin, $passwordlogin) {//constructor de la clase login
        $this->idusuario = $idusuario;
        $this->idlogin = $idlogin;
        $this->passwordlogin = $passwordlogin;
    }

    function getIdusuario() {//método para obtener el id del usuario del login
        return $this->idusuario;
    }

    function getIdlogin() {//método para obtener el id del login 
        return $this->idlogin;
    }

    function getPasswordlogin() {//método para obtener el password del login
        return $this->passwordlogin;
    }

    function setIdusuario($idusuario) {//método para editar el id del usuario del login
        $this->idusuario = $idusuario;
    }

    function setIdlogin($idlogin) {//método para editar el id del login
        $this->idlogin = $idlogin;
    }

    function setPasswordlogin($passwordlogin) {//método para editar el password login
        $this->passwordlogin = $passwordlogin;
    }

}
