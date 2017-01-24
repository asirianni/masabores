<?php
/**
 *
 * @author AdrianSirianni
 *        
 */
class Almacen_model extends CI_Model {
	
	/**
	 *
	 * @access public
	 *        
	 */
	public function __construct() {
		parent::__construct ();
		$this->load->database();
	}
        
        function obtener_lista_precios() {
            $codigo_seleccionado=1;
            if($this->session->userdata("lista_precios")!=null){$codigo_seleccionado=$this->session->userdata["lista_precios"];}
            $query = $this->db->query("SELECT * FROM listas_precios WHERE codigo = $codigo_seleccionado ");
            $resultado=$query->row_array();
            return $resultado["descripcion_lista"];
        }
	
	function obtener_producto($codigo) {
		$query = $this->db->query("SELECT * FROM productos WHERE codigo = $codigo ");
		return $query->row_array();
	}
	function obtener_talles() {
		$query = $this->db->query("SELECT * FROM talles where mostrar = 'si' ");
		return $query->result_array();
	}
	function obtener_colores() {
		$query = $this->db->query("SELECT * FROM colores where mostrar = 'si' ");
		return $query->result_array();
	}
	function obtener_cantidades() {
		$query = $this->db->query("SELECT * FROM cantidades");
		return $query->result_array();
	}
	function obtener_productos_almacen($sub_rubro) {
		$query="";
		if($sub_rubro!=null){
			$query = $this->db->query("select * from productos where sub_rubro=$sub_rubro and mostrar = 'si' ");
		}else{
			$query = $this->db->query("select * from productos where mostrar = 'si' ");
		}
		return $query->result_array();
	}
	
	
	function obtener_rubros() {
		$query = $this->db->query("SELECT * FROM rubros ");
		return $query->result_array();
	}
	
	function obtener_subrubros($rubro) {
		$query = $this->db->query("SELECT * FROM sub_rubros where activo = 'si' and cod_rubro = $rubro");
		return $query->result_array();
	}
        function obtener_subrubro($sub_rubro) {
                $dato_descripcion_subrubro="";
		$query = $this->db->query("SELECT descripcion FROM sub_rubros where codigo =  $sub_rubro");
                $valor_obtenido=$query->row_array();
		if ($valor_obtenido!=null) {
			$dato_descripcion_subrubro=$valor_obtenido['descripcion'];
		}
		return $dato_descripcion_subrubro;
	}
	
	function obtener_productos($cod_sub_rubro) {
		$lista_1="";
		$lista_2="";
		$lista_seleccionada="lista_1";// siempre levanta la lista 1 sino se selecciona nada.. hay que corregir la logica de los if.
		
		$query_lista_1 = $this->db->query("SELECT descripcion
											FROM  `configuracion` 
											WHERE codigo =2");
		
		$query_lista_2 = $this->db->query("SELECT descripcion
											FROM  `configuracion` 
											WHERE codigo =3");
		
		$valor_obtenido_1=$query_lista_1->row_array();
		if ($valor_obtenido_1!=null) {
			$lista_1=$valor_obtenido_1['descripcion'];
		}
		
		$valor_obtenido_2=$query_lista_2->row_array();
		if ($valor_obtenido_2!=null) {
			$lista_2=$valor_obtenido_2['descripcion'];
		}
				
		$fecha_hoy=date('Y-m-d');
		$fecha_lista_1=date($lista_1);
		$fecha_lista_2=date($lista_2);
		
		if( $fecha_hoy >= $fecha_lista_1){
			$lista_seleccionada="lista_1";
		}
		
		if( $fecha_hoy >= $fecha_lista_2){
			$lista_seleccionada="lista_2";
		}
		
		$query="";
		
		if($cod_sub_rubro==51){
			//$query = $this->db->query("SELECT * FROM productos where activo = 'si' and promocion = 'si'");
			
			$query = $this->db->query("select p.cod_web as cod_web, p.cod_fab as cod_fab, p.cod_sub_rubro as cod_sub_rubro, p.producto as producto, 
										p.descripcion as descripcion, pr.$lista_seleccionada as precio, p.imagen as imagen, p.activo as activo, p.gustos as gustos, 
										p.maximo as maximo, p.oferta as oferta, p.precio_anterior as precio_anterior, p.promocion as promocion
										from productos as p, precios as pr
										where p.cod_web=pr.producto
										and p.activo = 'si'
										and p.promocion = 'si'
										order by p.cod_web asc");
			
		}else{
			//$query = $this->db->query("SELECT * FROM productos where activo = 'si' and cod_sub_rubro = $cod_sub_rubro");
			
			$query = $this->db->query("select p.cod_web as cod_web, p.cod_fab as cod_fab, p.cod_sub_rubro as cod_sub_rubro, p.producto as producto,
					p.descripcion as descripcion, pr.$lista_seleccionada as precio, p.imagen as imagen, p.activo as activo, p.gustos as gustos,
					p.maximo as maximo, p.oferta as oferta, p.precio_anterior as precio_anterior, p.promocion as promocion
					from productos as p, precios as pr
					where p.cod_web=pr.producto
					and p.activo = 'si'
					and p.cod_sub_rubro = $cod_sub_rubro
					");
			
		}
		
		return $query->result_array();
	}
	
	function obtener_sub_rubros_con_gustos() {
		$query = $this->db->query("SELECT g.cod_sub_rubro as codigo, s.descripcion as descripcion FROM gustos as g, sub_rubros as s  WHERE g.cod_sub_rubro=s.codigo group by g.cod_sub_rubro");
		return $query->result_array();
	}
	
	function obtener_gustos($codigo) {
		$query = $this->db->query("SELECT * FROM gustos where cod_sub_rubro = $codigo");
		return $query->result_array();
	}
	function insertar_precios_productos($codigo) {
		$query = $this->db->query("insert into precios values($codigo,0,0)");
	}
	function obtener_precios() {
		$query = $this->db->query("SELECT p.cod_web AS cod_web, p.cod_fab AS cod_fab, p.producto AS producto, p.descripcion AS descripcion, pr.lista_1 AS lista_1, pr.lista_2 AS lista_2, s.descripcion AS rubro
									FROM productos AS p, precios AS pr, sub_rubros AS s
									WHERE p.cod_web = pr.producto
									AND p.cod_sub_rubro = s.codigo
									AND p.activo =  'si'
									ORDER BY p.cod_web ASC");
		return $query->result_array();
	}
	function obtener_lista_1($codigo_lista){
		$fecha="";
		$query = $this->db->query("SELECT descripcion FROM  configuracion WHERE codigo = $codigo_lista");
		$valor_obtenido=$query->row_array();
		if ($valor_obtenido!=null) {
			$fecha=$valor_obtenido['descripcion'];
		}
		return $fecha;
	}
        
        function obtener_imagen_sub_rubros($codigo){
		$imagen=null;
		$query = $this->db->query("SELECT imagen FROM sub_rubros WHERE codigo = $codigo");
		$valor_obtenido=$query->row_array();
		if ($valor_obtenido!=null) {
			$imagen=$valor_obtenido['imagen'];
		}
		return $imagen;
	}
        
        function obtener_imagen_productos($codigo){
		$imagen=null;
		$query = $this->db->query("SELECT imagen FROM imagenes WHERE cod_producto = '$codigo'");
		$valor_obtenido=$query->row_array();
		if ($valor_obtenido!=null) {
			$imagen=$valor_obtenido['imagen'];
		}
		return $imagen;
	}
        
	function actualizar_fecha_lista($lista, $fecha) {
		$query = $this->db->query("update configuracion set descripcion = '$fecha' where funcionalidad = '$lista'");;
	}
	function actualizar_producto($codigo, $lista_1, $lista_2) {
		$query = $this->db->query("update precios set lista_1 = $lista_1, lista_2 = $lista_2 where producto = $codigo");;
	}
        function limpiar_tabla_productos() {
		$query = $this->db->query("TRUNCATE TABLE productos ");
		
	}
        
        function todos_productos($busqueda) {
            $lista=  $this->obtener_lista_precios();
            $query = $this->db->query("select codigo, cod_prod, descripcion, round($lista, 2) as precio from productos where descripcion LIKE '%$busqueda%'");
            return $query->result_array();
	}
        
        function todos_productos_by_rubro($rubro){
            $lista=  $this->obtener_lista_precios();
            $query = $this->db->query("select codigo, cod_prod, descripcion, round($lista*1.21, 2) as precio from productos where sub_rubro=$rubro");
            return $query->result_array();
	}
        
        function tabla_destacados() {
            $query = $this->db->query("Select * from tabla_destacados");
            return $query->result_array();
        }
        
        function productos_destacados($destacado) {
            
            
            $limpiar_campo_tabla_productos="UPDATE productos SET cod_prod = TRIM(cod_prod);";
            $this->db->query($limpiar_campo_tabla_productos);
            
            
            
            $query = $this->db->query("Select pd.cod_producto as cod_producto, "
                    . "p.descripcion as producto, pd.detalle as detalle, pd.imagen_1 as imagen_1, "
                    . "pd.precio as precio from productos_destacados as pd, productos as p "
                    . "where pd.cod_producto=p.cod_prod "
                    . "and pd.destacado=$destacado "
                    . "and pd.mostrar='si'");
            return $query->result_array();
        }
        
        function get_codigo_masabores($codigo) {
            $query = $this->db->query("Select cod_prod from productos where codigo=$codigo");
            return $query->row_array();
        }
	
	
}

?>