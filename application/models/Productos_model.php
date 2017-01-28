<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Productos_model
 *
 * @author mario
 */
class Productos_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getProductos()
    {
        $r = $this->db->query("select * from productos");
        return $r->result_array();
    }
    
    public function getPrecioProductoSegunLista($numero_lista)
    {
        $r = $this->db->query("select precio_$numero_lista from productos where codigo = 1 ");
        $r= $r->row_array();
        return (int)$r["precio_$numero_lista"];
    }
    
    public function buscarProductosPorCampo($texto,$campo,$lista_precio)
    {
        $r = $this->db->query("SELECT productos.codigo, productos.descripcion, productos.precio_$lista_precio as precio from productos where $campo Like '%$texto%'");
        return $r->result_array();
    }
    
}