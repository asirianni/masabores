<?php
/**
 *
 * @author AdrianSirianni
 *        
 */
class Cliente_model extends CI_Model {
	
    /**
     *
     * @access public
     *        
     */
    public function __construct() {
            parent::__construct ();
            $this->load->database();
    }
    
    function getClienteInicioSesion($usuario, $password){
        $resultado = $this->db->query("SELECT c.codigo as codigo, c.usuario as usuario, c.correo as correo, c.pass as pass, c.nombre as nombre, c.apellido as apellido, c.direccion as direccion, c.celular as celular, c.fijo as fijo, c.estado as estado, c.lista_precios as lista_precios, c.dni_cuil, l.localidad FROM cliente as c, localidades as l where c.localidad=l.codigo and c.usuario='$usuario' and c.pass='$password'");
        return $resultado->row_array();
    }
    
    function obtener_ultimo() {
		$valor=$this->db->insert_id();
		return $valor+1;
    }
	
    function obtener_cliente($correo) {
            $query = $this->db->query("SELECT c.codigo AS codigo, 
                                                            c.correo AS correo, 
                                                            c.pass AS pass, 
                                                            c.nombre AS nombre, 
                                                            c.apellido AS apellido, 
                                                            c.sexo AS sexo, 
                                                            c.nacimiento AS nacimiento, 
                                                            c.direccion AS direccion, 
                                                            c.localidad AS cod_barrio,
                                                            c.celular AS celular, 
                                                            c.fijo AS fijo, 
                                                            c.estado AS estado, 
                                                            c.dni AS dni
                                                            FROM cliente c
                                                            WHERE c.correo = '$correo'");
            return $query->row_array();
    }
    function obtener_listado_direcciones($correo) {
            $query = $this->db->query("SELECT d.codigo AS codigo, 
                                                                    d.direccion AS direccion, 
                                                                    d.localidad AS localidad, 
                                                                    d.costo AS costo, 
                                                                    d.estado AS estado, 
                                                                    d.local AS local 
                                                                    FROM direccion_entrega AS d, cliente AS c
                                                                    WHERE d.cliente = c.codigo
                                                                    AND c.correo =  '$correo'");
            return $query->result_array();
    }
    function obtener_listado_direcciones_by_cod($cliente) {
            $query = $this->db->query("SELECT d.codigo AS codigo, 
                                                                    d.direccion AS direccion, 
                                                                    d.localidad AS localidad, 
                                                                    d.costo AS costo, 
                                                                    d.estado AS estado, 
                                                                    d.local AS local 
                                                                    FROM direccion_entrega AS d, cliente AS c
                                                                    WHERE d.cliente = c.codigo
                                                                    AND c.codigo =  $cliente");
            return $query->result_array();
    }
    function obtener_local_entrega_by_cod_direccion($cod_direccion) {
            $local;
            $query = $this->db->query("select local from direccion_entrega where codigo=$cod_direccion");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $local=$valor_obtenido['local'];
            }
            return $local;
    }
    
    function obtener_costo_entrega_by_cod_direccion($cod_direccion) {
            $costo=null;
            $query = $this->db->query("select z.costo as costo from direccion_entrega as d, zona_costo as z where d.costo = z.codigo and d.codigo=$cod_direccion");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $costo=$valor_obtenido['costo'];
            }
            return $costo;
    }
    
    function obtener_localidad_entrega_by_cod_direccion($cod_direccion) {
            $localidad;
            $query = $this->db->query("select localidad from direccion_entrega where codigo=$cod_direccion");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $localidad=$valor_obtenido['localidad'];
            }
            return $localidad;
    }
    
    function obtener_direccion_entrega_by_cod_direccion($cod_direccion) {
            $direccion;
            $query = $this->db->query("select direccion from direccion_entrega where codigo=$cod_direccion");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $direccion=$valor_obtenido['direccion'];
            }
            return $direccion;
    }
    function obtener_pass($correo, $pass) {
            $query = $this->db->query("SELECT * FROM cliente where correo = ".$correo."and pass=".$pass);
            return $query->row_array();
    }
    function insertarCliente($cliente) {
            $data = array(
                    'codigo' => $cliente->codigo,
                    'correo' => $cliente->correo,
                    'pass' => $cliente->pass,
                    'nombre' => $cliente->nombre,
                    'apellido' => $cliente->apellido,
                    'sexo' => $cliente->sexo,
                    'nacimiento' => $cliente->nacimiento,
                    'direccion' => $cliente->direccion,
                    'cod_zona_entrega' => null,
                    'celular' => $cliente->celular,
                    'fijo' => $cliente->fijo,
                    'estado' => $cliente->estado,
                    'dni' => $cliente->dni,
                    'localidad' => $cliente->localidad
            );
            $this->db->insert('cliente', $data);
            // se asigna la direccion de entrega al crear el usuario pero no tiene asignado ni codigo de costo ni codigo de local.
            // se va a signar desde el back ofice
            $this->insertar_direccion_asociada($cliente->codigo, $cliente->direccion, $cliente->localidad, null, 'p', null);
    }
    function insertar_direccion_asociada($cliente, $direccion, $localidad, $costo, $estado, $local) {
            $data = array(
                    'codigo' => null,
                    'cliente' => $cliente,
                    'direccion' => $direccion,
                    'localidad' => $localidad,
                    'costo' => $costo,
                    'estado' => $estado,
                    'local' => $local
            );
            $this->db->insert('direccion_entrega', $data);
    }
    function modificar_cliente($cliente) {
            $query = $this->db->query("SELECT * FROM item where destacado = 10");
            return $query->result_array();
    }
    
    public function count() {
            return $this->db->count_all('cliente');
    }
    public function obtener_clientes_nuevos() {
            $clientes_nuevos=0;
            $query = $this->db->query("SELECT COUNT( codigo ) AS cantidad FROM cliente WHERE estado ='confirmado'");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $clientes_nuevos=$valor_obtenido['cantidad'];
            }
            return $clientes_nuevos;
    }
    public function obtener_listados_clientes_pendientes() {
            $query = $this->db->query("SELECT c.codigo AS codigo, c.correo AS correo, c.apellido AS apellido, c.direccion AS direccion, c.localidad AS localidad, c.celular AS tel, e.estado AS estado
                                                               FROM cliente AS c, estado_cliente AS e
                                                               WHERE c.estado = e.codigo
                                                               AND c.estado =2");
            return $query->result_array();
    }
    
    public function existe_cliente($correo) {
            $validacion=false;
            $query = $this->db->query("select correo from cliente where correo='$correo'");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $validacion=true;
            }
            return $validacion;
    }
    
    public function obtener_pass_recuperacion($correo) {
            $pass="";
            $query = $this->db->query("select pass from cliente where correo='$correo'");
            $valor_obtenido=$query->row_array();
            if ($valor_obtenido!=null) {
                    $pass=$valor_obtenido['pass'];
            }
            return $pass;
    }
    
    function obtener_minimo_tarjeta_credito() {
            $minimo=0;
            $query = $this->db->query("SELECT descripcion FROM configuracion where codigo = 4");
            $valor_obtenido=$query->row_array();
            $minimo=$valor_obtenido['descripcion'];
            return $minimo;
    }
    
    public function getClientes()
    {
        $r = $this->db->query("select * from cliente");
        return $r->result_array();
    }
    
    public function getBusquedaClientesPorCampo($texto,$campo)
    {
        $r = $this->db->query("select * from cliente where $campo like '%$texto%'");
        return $r->result_array();
    }
    
    public function getListaPreciosCliente($codigo_cliente)
    {
        $r = $this->db->query("select lista_precios from cliente where codigo = $codigo_cliente");
        $r= $r->row_array();
        return (int)$r["lista_precios"];
    }
    
    public function getCliente($cliente)
    {
        $r = $this->db->query("select * from cliente where codigo=$cliente");
        return $r->row_array();
    }
    
}