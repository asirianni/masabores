<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paises_model
 *
 * @author mario
 */
class Paises_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getPaises()
    {
        $r = $this->db->query("select * from pais");
        return $r->result_array();
    }
}
