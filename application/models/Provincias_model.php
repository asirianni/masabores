<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provincias_model
 *
 * @author mario
 */
class Provincias_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getProvincias()
    {
        $r = $this->db->query("select * from provincias order by provincia");
        return $r->result_array();
    }
    
    public function getLocalidadesDeProvincia($provincia)
    {
        $r = $this->db->query("select * from localidades where id_provincia = $provincia ");
        return $r->result_array();
    }
}
