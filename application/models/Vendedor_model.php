<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendedor_model
 *
 * @author mario
 */
class Vendedor_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getVendedores()
    {
        $r = $this->db->query("select * from empleados where tipo_usuario = 2");
        return $r->result_array();
    }
}
