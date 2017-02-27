<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Locales_model
 *
 * @author mario
 */
class Locales_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getLocales()
    {
        $r = $this->db->query("select locales.*, localidades.localidad as desc_localidad from locales INNER JOIN localidades on locales.loc = localidades.codigo");
        return $r->result_array();
    }
}
