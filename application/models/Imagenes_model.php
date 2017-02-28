<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imagenes_model
 *
 * @author mario
 */
class Imagenes_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function actualizacion_imagenes($tabla_imagenes)
    {
        $this->db->query("delete from imagenes");
        
        for($i=0; $i<count($tabla_imagenes);$i++)
        {
            $this->db->insert("imagenes",Array("cod_producto"=>$tabla_imagenes[$i]["codigo"],"imagen"=>$tabla_imagenes[$i]["imagen"]));
        }
        
        return true;
    }
}
