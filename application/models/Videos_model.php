<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Videos_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function get_videos()
    {
    	$r = $this->db->query("SELECT * from videos");
    	return $r->result_array();
    }

    public function get_videos_visibles()
    {
        $r = $this->db->query("SELECT * from videos where mostrar = 'si'");
        return $r->result_array();
    }

    public function get_video($id)
    {
        $r = $this->db->query("SELECT * from videos where id = ?",array($id));
        return $r->row_array();
    }

    public function agregar($titulo,$link,$mostrar)
    {
        $datos = array(
            "titulo"=>$titulo,
            "link"=>$link,
            "mostrar"=>$mostrar
        );

        return $this->db->insert("videos",$datos);
    }

    public function editar($id,$titulo,$link,$mostrar)
    {
        $datos = array(
            "titulo"=>$titulo,
            "link"=>$link,
            "mostrar"=>$mostrar
        );

        $this->db->where("id",$id);
        return $this->db->update("videos",$datos);
    }

    public function eliminar($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete("videos");
    }
}