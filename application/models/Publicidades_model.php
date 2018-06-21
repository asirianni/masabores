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
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 1  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_inicio_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 2  and ubicaciones_publicidades.id_rubro = 0)  and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_inicio_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 3  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_nosotros_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 4  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_nosotros_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 5  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_nosotros_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 6  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_entregas_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 7  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_entregas_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 8  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_entregas_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 9  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_categorias_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 10  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_categorias_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 11  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_categorias_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 12  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_productos_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 13  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_productos_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 14  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_productos_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 15  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_contacto_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 16  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_contacto_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 17  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_contacto_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 18  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_rubro_vertical_izquierdo($id_rubro = 0)
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 19  and ubicaciones_publicidades.id_rubro = ".$id_rubro.") and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_rubro_vertical_derecho($id_rubro = 0)
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 20  and ubicaciones_publicidades.id_rubro = ".$id_rubro.") and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_rubro_horizontal($id_rubro = 0)
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 21  and ubicaciones_publicidades.id_rubro = ".$id_rubro.") and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_publicidades_videos_vertical_izquierdo()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 23  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_videos_vertical_derecho()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 24  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 170 and publicidades.height = 638");
        return $r->result_array();
    }

    public function get_publicidades_videos_horizontal()
    {
        $r = $this->db->query("select * from publicidades where publicidades.id in (select ubicaciones_publicidades.id_publicidad from ubicaciones_publicidades where ubicaciones_publicidades.id_sector_publicitario = 25  and ubicaciones_publicidades.id_rubro = 0) and publicidades.mostrar = 'si' and publicidades.width = 729 and publicidades.height = 90");
        return $r->result_array();
    }

    public function get_ultima_publicidad()
    {
        $r = $this->db->query("SELECT * FROM publicidades where id in (select max(id) from publicidades)");
        return $r->row_array();
    }

    public function agregar_publicidad($descripcion,$imagen,$width,$height,$mostrar,$url,$id_usuario)
    {
    	$datos = Array(
    		"descripcion" =>$descripcion,
            "imagen" =>$imagen,
            "width" =>$width,
            "height" =>$height,
            "mostrar" =>$mostrar,
            "url"=>$url,
            "visitas"=>0,
            "id_usuario"=>$id_usuario,
    	);

    	$agregada = $this->db->insert("publicidades",$datos);

        if($agregada)
        {
            $agregada= $this->get_ultima_publicidad();
        }

        return $agregada;
    }

    public function editar_publicidad($id,$descripcion,$imagen,$width,$height,$mostrar,$url,$id_usuario)
    {
        $row_actual = $this->get_publicidad($id);

        $datos = Array(
            "descripcion" =>$descripcion,
            "width" =>$width,
            "height" =>$height,
            "mostrar" =>$mostrar,
            "url"=>$url,
            "id_usuario"=>$id_usuario,
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

    public function agregar_ubicacion_publicidad($id_publicidad,$id_sector_publicitario,$id_rubro)
    {
        $datos = Array(
            "id_publicidad"=>$id_publicidad,
            "id_sector_publicitario"=>$id_sector_publicitario,
            "id_rubro"=>$id_rubro
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
        grupos_padres.descripcion as rubro_rubro
        FROM ubicaciones_publicidades 
        LEFT JOIN sectores_web_publicitarios on 
                sectores_web_publicitarios.id = ubicaciones_publicidades.id_sector_publicitario
        LEFT JOIN grupos_padres 
                on grupos_padres.codigo = ubicaciones_publicidades.id_rubro
        WHERE ubicaciones_publicidades.id_publicidad = ? ",array($id_publicidad));
        

        return $r->result_array();
    }
}