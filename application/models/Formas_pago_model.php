<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slider_marcas
 *
 * @author mario
 */
class Formas_pago_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getListado()
    {
        $r = $this->db->query("select * from forma_pago");
        return $r->result_array();
    }
    public function getFormaPago($id)
    {
        $r = $this->db->query("select * from forma_pago where id=$id");
        return $r->row_array();
    }
}