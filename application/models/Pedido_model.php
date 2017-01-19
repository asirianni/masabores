<?php
/**
 *
 * @author AdrianSirianni
 *        
 */
class Pedido_model extends CI_Model {
	
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
		$valor=$this->db->count_all('pedido');
		return $valor+1;
	}
	
	function insertarPedido($pedido) {
		$data = array(
				'numero' => $pedido->numero,
				'fecha' => $pedido->fecha,
				'cliente' => $pedido->cliente,
				'total' => $pedido->total,
				'estado' => $pedido->estado,
				'local' => $pedido->local,
				'pago' => $pedido->pago,
				'f_retiro' => $pedido->f_retiro,
				'f_entrega' => $pedido->f_entrega,
				'costo_envio' => $pedido->costo_envio,
				'direccion_entrega' => $pedido->direccion_entrega,
				'localidad' => $pedido->localidad,
				'detenvio' => $pedido->detenvio
		);
		$this->db->insert('pedido', $data);
	}
	
	function insertarPedidoDetalle($numero_pedido, $producto, $precio, $cantidad) {
		$data = array(
				'num_pedido' => $numero_pedido,
				'producto' => $producto,
				'precio' => $precio,
				'cantidad' => $cantidad
		);
		
		if ($this->db->insert('pedido_detalle', $data)) {
			return true;

		}else{
			return false;
		}
		
	}
	
	public function obtener_retiros_nuevos() {
		$retiros_nuevos=0;
		$query = $this->db->query("select count(numero) as retiro from pedido where f_retiro is not null and estado = 1");
		$valor_obtenido=$query->row_array();
		
		if ($valor_obtenido!=null) {
			$retiros_nuevos=$valor_obtenido['retiro'];
		}
		return $retiros_nuevos;
	}
	public function obtener_delivery_nuevos() {
		$delivery_nuevos=0;
		$query = $this->db->query("select count(numero) as delivery from pedido where f_entrega is not null and estado = 1");
		$valor_obtenido=$query->row_array();
		
		if ($valor_obtenido!=null) {
			$delivery_nuevos=$valor_obtenido['delivery'];
		}
		return $delivery_nuevos;
	}
	
	//si el tipo es 1 trae los pedidos con fecha de retiro.
	//si el tipo es 2 trae los pedidos con fecha de entrega.
	//si es 0 trae todos.
	
	public function obtener_pedidos_nuevos($tipo){
		$consulta="SELECT p.numero as numero, p.fecha AS fecha, c.correo AS cliente, p.total AS total, e.estado AS estado, p.f_retiro 	AS retiro, p.f_entrega AS entrega
		FROM pedido AS p, cliente AS c, estado_pedido AS e
		WHERE p.cliente = c.codigo
		AND p.estado = e.codigo
		AND p.estado= 1";
		switch($tipo){
			case 1:
			$consulta.=" AND p.f_retiro IS NOT NULL ";
			break;
			case 2:
			$consulta.=" AND p.f_entrega IS NOT NULL ";
		}
		$query = $this->db->query($consulta);
		return $query->result_array();
	}
	
	public function obtener_cliente($numero_pedido){
		$consulta="SELECT c.codigo AS codigo, c.correo AS correo, c.nombre AS nombre, c.apellido AS apellido, c.celular AS celular, c.fijo AS fijo, c.dni_cuil as dni
		FROM cliente AS c, pedido AS p
		WHERE p.cliente = c.codigo
		AND p.numero = $numero_pedido ";
		$query = $this->db->query($consulta);
		return $query->row_array();
	}
	
	public function el_pedido_se_retira($numero){
		$se_retira=false;
		$consulta="SELECT local FROM pedido WHERE numero = $numero ";
		$query = $this->db->query($consulta);
		$query->row_array();
		
		$valor_obtenido=$query->row_array();
		$local=$valor_obtenido['local'];
		
		if ($local!=null) {
			$se_retira=true;
		}
		return $se_retira;
	}
	
	public function obtener_pedido($numero){
		$consulta="select * from pedido where numero= $numero";
		$query = $this->db->query($consulta);
		return $query->row_array();
	}
	
	public function obtener_pedido_detalle($numero){
                $limpiar_campo_tabla_detalle_pedido="UPDATE pedido_detalle SET producto = TRIM(producto);";
                $limpiar_campo_tabla_productos="UPDATE productos SET cod_prod = TRIM(cod_prod);";
		$consulta="SELECT p.producto as codigo, pr.cod_prod as cod_prod, pr.descripcion as producto, p.precio as precio, p.cantidad as cantidad
					FROM  pedido_detalle as p, productos as pr
					WHERE p.producto=pr.cod_prod
					AND p.num_pedido= $numero";
                $this->db->query($limpiar_campo_tabla_detalle_pedido);
                $this->db->query($limpiar_campo_tabla_productos);
		$query = $this->db->query($consulta);
		return $query->result_array();
	}
	
	public function obtener_local($numero){
		$consulta="SELECT l.cod_web AS cod_web, l.dire AS dire, lo.localidad AS localidad, l.denom AS denom
					FROM pedido AS p, locales AS l, localidades AS lo
					WHERE p.local = l.cod_web
					AND l.loc = lo.codigo
					AND p.numero = $numero";
		$query = $this->db->query($consulta);
		return $query->row_array();
	}
	
	public function obtener_estados(){
		$consulta="SELECT * from estado_pedido";
		$query = $this->db->query($consulta);
		return $query->result_array();
	}
	
	public function actualizar_pedido($pedido, $estado){
		$consulta="update pedido set estado = $estado where numero = $pedido";
		$query = $this->db->query($consulta);
		
	}
	
	public function obtener_historial(){
		$consulta="Select p.numero as numero, p.fecha as fecha, c.correo as cliente, p.total as total, e.estado as estado
					from pedido as p, cliente as c, estado_pedido as e
					where p.cliente=c.codigo
					and p.estado=e.codigo order by p.numero desc";
		$query = $this->db->query($consulta);
		return $query->result_array();
	
	}
	
	
	
}

?>