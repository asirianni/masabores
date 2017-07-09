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
        $r = $this->db->query("select zonas_cobertura.*,localidades.localidad as descripcion, dias_semanas.descripcion as desc_dia from zonas_cobertura INNER JOIN localidades on localidades.codigo = zonas_cobertura.zona INNER JOIN dias_semanas on dias_semanas.dia = zonas_cobertura.cod_dia order by cod_dia");
        return $r->result_array();
    }
    
    public function getZonasCoberturasCheckoutPedido()
    {
        $r = $this->db->query("select zonas_cobertura.*,localidades.localidad as descripcion, dias_semanas.descripcion as desc_dia from zonas_cobertura INNER JOIN localidades on localidades.codigo = zonas_cobertura.zona INNER JOIN dias_semanas on dias_semanas.dia = zonas_cobertura.cod_dia group by zona order by cod_dia");
        return $r->result_array();
    }
    
    public function getZonaCoberturaCheckoutPedido($id)
    {
        $r = $this->db->query("select zonas_cobertura.*,localidades.localidad as descripcion, dias_semanas.descripcion as desc_dia,masabores_entrega.descripcion as codigo_entrega from zonas_cobertura INNER JOIN localidades on localidades.codigo = zonas_cobertura.zona INNER JOIN dias_semanas on dias_semanas.dia = zonas_cobertura.cod_dia INNER JOIN masabores_entrega on masabores_entrega.codigo = zonas_cobertura.cod_masabores_entrega where zonas_cobertura.id = $id");
        return $r->row_array();
    }
}
