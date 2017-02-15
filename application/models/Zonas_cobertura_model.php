<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zonas_cobertura_model
 *
 * @author mario
 */
class Zonas_cobertura_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getZonasCoberturas()
    {
        $r = $this->db->query("select * from zonas_cobertura");
        return $r->result_array();
    }
}
