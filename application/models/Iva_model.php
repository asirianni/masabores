<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Iva_model
 *
 * @author mario
 */
class Iva_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getTiposIva()
    {
        $r = $this->db->query("select * from tipo_iva");
        return $r->result_array();
    }
    
    public function getTipoIva($codigo)
    {
        $r = $this->db->query("select * from tipo_iva where codigo = $codigo");
        $r = $r->row_array();
        return $r["iva"];
    }
}
