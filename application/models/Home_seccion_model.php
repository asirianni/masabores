<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home_seccion_model
 *
 * @author mario
 */
class Home_seccion_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getHomeSecciones()
    {
        $r = $this->db->query("select * from home_seccion");
        return $r->result_array();
    }
}
