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
        $r = $this->db->query("select zonas_cobertura.*, dias_semanas.descripcion as desc_dia from zonas_cobertura INNER JOIN dias_semanas on dias_semanas.dia = zonas_cobertura.cod_dia order by cod_dia");
        return $r->result_array();
    }
}
