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
        $resultado = $this->db->query("select cliente.codigo,cliente.usuario,cliente.correo,cliente.pass,cliente.nombre,cliente.apellido,cliente.razon_social,cliente.nombre_comercial,cliente.direccion,cliente.provincia,cliente.cod_postal,cliente.pais,cliente.celular,cliente.fijo,cliente.tipo_iva,cliente.estado,cliente.lista_precios,cliente.vendedor,cliente.codigo_masabores,cliente.dni_cuil,localidades.localidad from cliente LEFT JOIN localidades on localidades.codigo = cliente.localidad where cliente.usuario = '$usuario' and cliente.pass='$password'");
        return $resultado->row_array();
    }
    
    function obtener_ultimo() {
		$valor=$this->db->insert_id();
		return $valor+1;
    }
	
    function obtener_cliente($correo) {
            $query = $this->db->query("SELECT * FROM cliente WHERE correo = '$correo'");
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
            $query = $this->db->query("SELECT COUNT( codigo ) AS cantidad FROM cliente WHERE estado ='pendiente'");
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
    
    public function registrarClientePorPost($datos)
    {
        /*$datos = Array(
            "usuario"=>$usuario,
            "correo"=>$correo,
            "pass"=>$pass,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "razon_social"=>$razon_social,
            "nombre_comercial"=>$nombre_comercial,
            "direccion"=>$direccion,
            "provincia"=>$provincia,
            "localidad"=>$localidad,
            "cod_postal"=>$cod_postal,
            "pais"=>$celular,
            "fijo"=>$fijo,
            "tipo_iva"=>$tipo_iva,
            "estado"=>$estado,
            "lista_precios"=>$lista_precios,
            "vendedor"=>$vendedor,
            "dni_cuil"=>$dni_cuil,
        );*/
        
        return $this->db->insert("cliente",$datos);
    }
    
    public function actualizarClientePorPost($datos,$codigo)
    {
        $this->db->where("codigo",$codigo);
        
        $nuevos_datos = Array(
            "usuario"=>$datos["usuario"],	
            "correo"=>$datos["correo"], 	
            "pass"=>$datos["pass"], 	
            "nombre"=>$datos["nombre"], 	
            "apellido"=>$datos["apellido"], 	
            "razon_social"=>$datos["razon_social"], 	
            "nombre_comercial"=>$datos["nombre_comercial"], 	
            "direccion"=>$datos["direccion"], 	
            "provincia"=>$datos["provincia"], 	
            "localidad"=>$datos["localidad"], 	
            "cod_postal"=>$datos["cod_postal"], 	
            "pais"=>$datos["pais"], 	
            "celular"=>$datos["celular"], 	
            "fijo"=>$datos["fijo"], 	
            "tipo_iva"=>$datos["tipo_iva"], 	
            "estado"=>$datos["estado"], 	
            "lista_precios"=>$datos["lista_precios"], 	
            "vendedor"=>$datos["vendedor"], 	
            "codigo_masabores"=>$datos["codigo_masabores"], 	
            "dni_cuil"=>$datos["dni_cuil"],
        );
        
        return $this->db->update("cliente",$nuevos_datos);
    }
    
    public function modificarCliente($codigo,$usuario,$correo,$pass,$nombre,$apellido,$razon_social,$nombre_comercial,
                                   $direccion,$provincia,$localidad,$cod_postal,$pais,$celular,$fijo,$tipo_iva,
                                   $estado,$lista_precios,$vendedor,$codigo_masabores,$dni_cuil)
    {
        $datos = Array(
            "usuario"=>$usuario,
            "correo"=>$correo,
            "pass"=>$pass,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "razon_social"=>$razon_social,
            "nombre_comercial"=>$nombre_comercial,
            "direccion"=>$direccion,
            "provincia"=>$provincia,
            "localidad"=>$localidad,
            "cod_postal"=>$cod_postal,
            "pais"=>$pais,
            "celular"=>$celular,
            "fijo"=>$fijo,
            "tipo_iva"=>$tipo_iva,
            "estado"=>$estado,
            "lista_precios"=>$lista_precios,
            "vendedor"=>$vendedor,
            "codigo_masabores"=>$codigo_masabores,
            "dni_cuil"=>$dni_cuil,
        );
        
        $this->db->where("codigo",$codigo);
        return $this->db->update("cliente",$datos);
    }
    
    public function agregarCliente($usuario,$correo,$pass,$nombre,$apellido,$razon_social,$nombre_comercial,
                                   $direccion,$provincia,$localidad,$cod_postal,$pais,$celular,$fijo,$tipo_iva,
                                   $estado,$lista_precios,$vendedor,$codigo_masabores,$dni_cuil)
    {
        $datos = Array(
            "usuario"=>$usuario,
            "correo"=>$correo,
            "pass"=>$pass,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "razon_social"=>$razon_social,
            "nombre_comercial"=>$nombre_comercial,
            "direccion"=>$direccion,
            "provincia"=>$provincia,
            "localidad"=>$localidad,
            "cod_postal"=>$cod_postal,
            "pais"=>$pais,
            "celular"=>$celular,
            "fijo"=>$fijo,
            "tipo_iva"=>$tipo_iva,
            "estado"=>$estado,
            "lista_precios"=>$lista_precios,
            "vendedor"=>$vendedor,
            "codigo_masabores"=>$codigo_masabores,
            "dni_cuil"=>$dni_cuil,
        );
        
        return $this->db->insert("cliente",$datos);
    }
    
    public function eliminar_cliente($codigo)
    {
        $this->db->where("codigo",$codigo);
        return $this->db->delete("cliente");
    }
    
    public function activar_cliente($user)
    {
        $this->db->where("usuario",$user);
        return $this->db->update("cliente",Array("estado"=>"confirmado"));
    }
    
}