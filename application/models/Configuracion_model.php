<?php
/**
 *
 * @author AdrianSirianni
 *        
 */
class Configuracion_model extends CI_Model {
	
    /**
     *
     * @access public
     *        
     */
    public function __construct() {
            parent::__construct ();
            $this->load->database();
    }
    
    function obtener_config($dato) {
        $query = $this->db->query("SELECT * FROM configuracion where codigo = $dato ");
        return $query->row_array();
    }
}