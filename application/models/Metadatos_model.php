<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Metadatos_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function  getKeywords($vista)
    {
        $r = $this->db->query("select * from meta_datos where id in (select max(id) from meta_datos WHERE meta_datos.tipo = 'keywords' and meta_datos.vista = '".$vista."')");
        return $r->row_array();
    }
    
    public function  getDescription($vista)
    {
        $r = $this->db->query("select * from meta_datos where id in (select max(id) from meta_datos WHERE meta_datos.tipo = 'description' and meta_datos.vista = '".$vista."')");
        return $r->row_array();
    }
    
    public function  getTitle($vista)
    {
        $r = $this->db->query("select * from meta_datos where id in (select max(id) from meta_datos WHERE meta_datos.tipo = 'title' and meta_datos.vista = '".$vista."')");
        return $r->row_array();
    }
}
