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
class Slider_marcas extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getSliderMarcas()
    {
        $r = $this->db->query("select * from slider_marcas where mostrar = 'si'");
        return $r->result_array();
    }
}
