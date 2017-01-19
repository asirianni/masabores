<?php
/**
 *
 * @author AdrianSirianni
 *        
 */
class Local_model extends CI_Model {
	
	/**
	 *
	 * @access public
	 *        
	 */
	public function __construct() {
		parent::__construct ();
		$this->load->database();
	}
	
	function obtener_ultimo() {
		$query = $this->db->query();
		return $query->result_array();
	}
	
	function obtener_localidad($localidad) {
		$query = $this->db->query("SELECT * FROM cliente where correo = '$correo'");
		return $query->row_array();
	}
	function obtener_localidades() {
		$query = $this->db->query("SELECT * FROM localidad");
		return $query->result_array();
	}
	function obtener_locales($localidad) {
		$query = $this->db->query("SELECT l.cod_web AS cod_web, l.cod_fab AS cod_fab, l.dire AS direccion, lc.localidad AS loc
									FROM locales AS l, localidad AS lc
									WHERE lc.codigo = l.loc
									AND lc.codigo = $localidad
									ORDER BY lc.localidad ASC");
		return $query->result_array();
	}
	
	function obtener_todos_locales() {
            $query = $this->db->query("SELECT l.cod_web AS cod_web, l.dire AS direccion, lc.localidad AS loc
                            FROM locales AS l, localidades AS lc
                            WHERE lc.codigo = l.loc
                            ORDER BY lc.localidad ASC");
            return $query->result_array();
	}
	
	function costos_envio($local) {
		$query = $this->db->query("SELECT * FROM zona_costo WHERE origen = '$local'");
		return $query->result_array();
	}
	
	
}

?>