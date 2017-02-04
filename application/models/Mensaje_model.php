<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensaje_model
 *
 * @author mario
 */
class Mensaje_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function agregarMensaje($nombre,$correo,$telefono,$mensaje)
    {
        $datos = Array(
            "nombre"=>$nombre,
            "correo"=>$correo,
            "telefono"=>$telefono,
            "mensaje"=>$mensaje,
            "fecha"=>Date("Y-m-d"),
        );
        
        return $this->db->insert("mensajes",$datos);
    }
}
