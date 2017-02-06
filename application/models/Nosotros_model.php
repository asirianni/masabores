<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nosotros_model
 *
 * @author mario
 */
class Nosotros_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getNosotros()
    {
        $r = $this->db->query("select * from nosotros where codigo = 1");
        return $r->row_array();
    }
}
