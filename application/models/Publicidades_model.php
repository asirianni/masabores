<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Publicidades_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function get_publicidades()
    {
    	$r = $this->db->query("SELECT publicidades.*, empleados.usuario as empleados_usuario FROM publicidades LEFT JOIN empleados on empleados.dni = publicidades.id_usuario");
    	return $r->result_array();
    }

    public function get_publicidades_de_usuario($id_usuario)
    {
        $r = $this->db->query("SELECT * FROM publicidades where id_usuario = $id_usuario and mostrar = 'si'");
        return $r->result_array();
    }

    public function set_visitas_publicidad($id,$visitas)
    {
        $this->db->where("id",$id);
        return $this->db->update("publicidades",array("visitas"=>$visitas));
    }

    public function get_cantidad_publicidades()
    {
        $r = $this->db->query("SELECT count(id) as cantidad FROM publicidades");
        $r= $r->row_array();
        return (int)$r["cantidad"];
    }

    // NUEVOS METODOS

    public function get_publicidades_inicio_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 1  and ubicaciones_publicidades.id_rubro = 0 and ubicaciones_publicidades.id_subrubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_inicio_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 2  and ubicaciones_publicidades.id_rubro = 0 and ubicaciones_publicidades.id_subrubro = 0)  and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_inicio_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 3  and ubicaciones_publicidades.id_rubro = 0 and ubicaciones_publicidades.id_subrubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_busqueda_vertical_derecho($id_rubro = 0,$id_subrubro=0)
    {
        // SE HACEN LAS CONSULTAS SEPARADAS PARA PODER FILTRAR POR RUBRO
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 4 and (ubicaciones_publicidades.id_rubro = 0 or ubicaciones_publicidades.id_rubro = ".$id_rubro.") and ( ubicaciones_publicidades.id_subrubro = 0 or ubicaciones_publicidades.id_subrubro = ".$id_subrubro.")) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638 ");

        return $r->result_array();
    }

    public function get_publicidades_busqueda_horizontal($id_rubro = 0,$id_subrubro=0)
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 5 and (ubicaciones_publicidades.id_rubro = 0 or ubicaciones_publicidades.id_rubro = ".$id_rubro.") and ( ubicaciones_publicidades.id_subrubro = 0 or ubicaciones_publicidades.id_subrubro = ".$id_subrubro.")) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90 ");
        return $r->result_array();
    }

    public function get_publicidades_anuncio_vertical_derecho($id_rubro = 0,$id_subrubro=0)
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 6 and (ubicaciones_publicidades.id_rubro = 0 or ubicaciones_publicidades.id_rubro = ".$id_rubro.") and ( ubicaciones_publicidades.id_subrubro = 0 or ubicaciones_publicidades.id_subrubro = ".$id_subrubro.")) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638 ");
         return $r->result_array();
    }

    public function get_publicidades_anuncio_horizontal($id_rubro = 0,$id_subrubro=0)
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 7 and (ubicaciones_publicidades.id_rubro = 0 or ubicaciones_publicidades.id_rubro = ".$id_rubro.") and ( ubicaciones_publicidades.id_subrubro = 0 or ubicaciones_publicidades.id_subrubro = ".$id_subrubro.")) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90 ");
        return $r->result_array();
    }

    public function get_ultima_publicidad()
    {
        $r = $this->db->query("SELECT * FROM publicidades where id in (select max(id) from publicidades)");
        return $r->row_array();
    }

    public function agregar_publicidad($descripcion,$imagen,$width,$height,$mostrar,$url)
    {
    	$datos = Array(
    		"descripcion" =>$descripcion,
            "imagen" =>$imagen,
            "width" =>$width,
            "height" =>$height,
            "mostrar" =>$mostrar,
            "url"=>$url,
            "visitas"=>0,
    	);

    	$agregada = $this->db->insert("publicidades",$datos);

        if($agregada)
        {
            $agregada= $this->get_ultima_publicidad();
        }

        return $agregada;
    }

    public function editar_publicidad($id,$descripcion,$imagen,$width,$height,$mostrar,$url)
    {
        $row_actual = $this->get_publicidad($id);

        $datos = Array(
            "descripcion" =>$descripcion,
            "width" =>$width,
            "height" =>$height,
            "mostrar" =>$mostrar,
            "url"=>$url,
        );

        if($imagen != "")
        {
            $datos["imagen"]=$imagen;

            $link_img_actual = "recursos/images/publicidades/".$row_actual["width"]."_".$row_actual["height"]."/".$row_actual["imagen"];
            
            if(file_exists($link_img_actual))
            {
                unlink($link_img_actual);
            }
        }

        $this->db->where("id",$id);
        return $this->db->update("publicidades",$datos);
    }

    public function get_publicidad($id)
    {
    	$r = $this->db->query("SELECT publicidades.* FROM publicidades where publicidades.id = ?",array($id));
    	return $r->row_array();
    }

    public function eliminar_publicidad($id)
    {
        $row_actual = $this->get_publicidad($id);
    	
        $this->db->where("id",$id);
    	$borrada = $this->db->delete("publicidades");

        if($borrada)
        {
            $link_img_actual = "recursos/images/publicidades/".$row_actual["width"]."_".$row_actual["height"]."/".$row_actual["imagen"];
                
            if(file_exists($link_img_actual))
            {
                unlink($link_img_actual);
            }  

            $this->eliminar_ubicaciones_publicidad($id);
        }

        return $borrada;
    }

    public function agregar_ubicacion_publicidad($id_publicidad,$id_sector_publicitario,$id_rubro,$id_subrubro)
    {
        $datos = Array(
            "id_publicidad"=>$id_publicidad,
            "id_sector_publicitario"=>$id_sector_publicitario,
            "id_rubro"=>$id_rubro,
            "id_subrubro"=>$id_subrubro
        );

        return $this->db->insert("ubicaciones_publicidades",$datos);
    }

    public function get_sectores_web_publicitarios()
    {
        $r = $this->db->query("select * from sectores_web_publicitarios");
        return $r->result_array();
    }

    public function eliminar_ubicaciones_publicidad($id_publicidad)
    {
        $this->db->where("id_publicidad",$id_publicidad);
        return $this->db->delete("ubicaciones_publicidades");
    }

    public function get_ubicaciones_publicidad($id_publicidad)
    {
        $r =$this->db->query(
        "SELECT ubicaciones_publicidades.*,
        sectores_web_publicitarios.nombre_sector as sectores_web_publicitarios_nombre_sector, 
        grupos_padres.descripcion as rubro_rubro,
        grupos.grupo as sub_rubro_subrubro  
        FROM ubicaciones_publicidades 
        LEFT JOIN sectores_web_publicitarios on 
                sectores_web_publicitarios.id = ubicaciones_publicidades.id_sector_publicitario
        LEFT JOIN grupos_padres 
                on grupos_padres.codigo = ubicaciones_publicidades.id_rubro
        LEFT JOIN grupos 
                on grupos.codigo = ubicaciones_publicidades.id_subrubro 
        WHERE ubicaciones_publicidades.id_publicidad = ? ",array($id_publicidad));
        

        return $r->result_array();
    }
}