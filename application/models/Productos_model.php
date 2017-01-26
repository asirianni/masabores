<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Productos_model
 *
 * @author mario
 */

class Productos_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getProductos()
    {
        $r = $this->db->query("select * from producto");
        return $r->result_array();
    }
}
