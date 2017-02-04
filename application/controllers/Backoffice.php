<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backoffice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->library('email');
		$this->load->helper('html');
		$this->load->model('Almacen_model');
		$this->load->model('Cliente_model');
//		$this->load->model('Localidad_model');
//		$this->load->model('Barrio_model');
		$this->load->model('Pedido_model');
//		$this->load->model('Local_model');
//		$this->load->model('Usuario_model');
//		$this->load->library('Cliente');
//		$this->load->library('Localidad');
//		$this->load->library('Local');
//		$this->load->library('Rubro');
//		$this->load->library('SubRubro');
//		$this->load->library('Barrio');
                $this->load->library('session');
//		$this->load->library('Pedido');
		$this->load->library('grocery_CRUD');
                $this->load->helper('file');
		$this->load->database();
	}
	
	public function validar_administrador()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass', 'Pass', 'required');
	
	
		$this->form_validation->set_message(
				'required', 'Valor requerido. No lo deje en blanco');
		$this->form_validation->set_message(
				'valid_email', 'Ingrese con mail valido. Ej. jose@suempresa.com');
	
		if ($this->form_validation->run() == FALSE){
			$output['salida_error']="";
			$this->load->view('back/loguin.php', $output);
		}else{
			$usuario = $this->input->post("usuario");
			$pass = $this->input->post("pass");
			if ($this->Usuario_model->obtener_usuario($usuario)) {
				if ($this->Usuario_model->obtener_usuario_pass($usuario, $pass)) {
					$this->cargar_datos_session($usuario);
                                        if ($usuario=="vicentecarlosa@hotmail.com") {
                                            $this->panel_actualizacion_precios();
                                        }else{
                                            $this->load->view('back/escritorio.php', $this->cargar_datos_escritorio());
                                        }
					
				}else{
					$output['salida_error']="Pass ingresada incorrecta";
					$this->load->view('back/loguin.php', $output);
				}
			}else{
				$output['salida_error']="Usuario ingresado incorrecto";
				$this->load->view('back/loguin.php', $output);
			}
		}
	}
        
        public function panel_actualizacion_precios(){
		if ($this->verificar_acceso()) {
                        $output = (object)array('output' => '' , 'js_files' => array() , 'css_files' => array());
			$this->load->view('back/panel_actualizacion_precios.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
        
	
	private function cargar_datos_session($correo){
		$nuevosdatos = array(
				'email'     => $correo,
				'ingresado' => TRUE
		);
		
		$this->session->set_userdata($nuevosdatos);
	}
	
	private function verificar_acceso(){
		$validacion=false;
		if($session_id = $this->session->userdata('ingresado')){
			$validacion=true;
		}
		return $validacion;
	}
        
        public function abm_productos_administrador(){
            if ($this->verificar_acceso()) {
                $crud = new grocery_CRUD();
                $crud->set_table('productos');
                $crud->columns('codigo','sub_rubro','descripcion','imagen', 'precio');
                $crud->set_relation('sub_rubro','sub_rubros','descripcion');
                $crud->set_field_upload('imagen','assets/recursos/images/product-almacen');
                $crud->set_field_upload('perfil','assets/recursos/images/product-almacen');
                
                $output = $crud->render();
                $this->load->view('back/panel_actualizacion_precios.php', $output);
            }else{
                $output['salida_error']="";
                $this->load->view('back/loguin', $output);
            }
	}
        
        public function abm_p_especiales_administrador(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('productos_especiales');
			$crud->columns('articulo');
			$crud->set_relation('articulo','productos','descripcion');
			$crud->set_field_upload('imagen','assets/recursos/images/product-almacen');
			$output = $crud->render();
		
			$this->load->view('back/panel_actualizacion_precios.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
        
        public function abm_rubros_administrador(){
            if ($this->verificar_acceso()) {
                $crud = new grocery_CRUD();
                $crud->set_table('rubros');
                $crud->columns('descripcion');
                $output = $crud->render();               
                $this->load->view('back/panel_actualizacion_precios.php', $output);
            }else{
                $output['salida_error']="";
                $this->load->view('back/loguin', $output);
            }
	}
        
        public function abm_subrubros_administrador(){
            if ($this->verificar_acceso()) {
                $crud = new grocery_CRUD();
                $crud->set_table('sub_rubros');
                $crud->columns('descripcion', 'cod_rubro' );
                $crud->set_relation('cod_rubro','rubros','descripcion');
                $crud->set_field_upload('imagen','assets/img/sub_rubros');
                $output = $crud->render();
                $this->load->view('back/panel_actualizacion_precios.php', $output);
            }else{
                $output['salida_error']="";
                $this->load->view('back/loguin', $output);
            }
	}
        
        public function abm_precios_administrador(){
           $output["error"]=false;
           $output["importacion"]=false; 
           $this->load->view('back/importador_precios.php', $output);
	}
        
        public function importar(){
            require_once(APPPATH.'/libraries/lib_excel/PHPExcel/IOFactory.php');
            try {
                $this->Almacen_model->limpiar_tabla_productos();
                $this->Almacen_model->limpiar_tabla_grupos();
                    //Cargar PHPExcel library
//                $this->load->library('excel');
//                $name   = $_FILES['uploaded']['name'];
//                $tname  = $_FILES['uploaded']['tmp_name'];
//                $obj_excel = PHPExcel_IOFactory::load($tname);
                $codigos_grupos= array();
                $descripcion_grupos=array();
//                
//                $sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
                
                $cardelimitador = ',';
                $oa = fopen($_FILES['uploaded']['tmp_name'], 'r');
                
                $arr_datos = array();
                $i=0;
                while($a = fgetcsv($oa, 1000, $cardelimitador)){
                    if($i!=0){
                       $arr_datos = array(
                            'codigo'  => $i,
                            'memo'  => $a[0],
                            'cod_prod'  => (string) $a[1],
                            'descripcion'  => $a[2],
                            'cod_barra'  => $a[3],
                            'cod_grupo'  => $a[4],
                            'cod_proveedor'  => $a[5],
                            'precio_1'  => $a[8],
                            'precio_2'  => $a[9],
                            'precio_3'  => $a[10],
                            'iva'  => 21,
                            'sub_rubro'  => null,
                            'imagen'  => null,
                            'perfil'  => null,
                            'mostrar'  => 'si'
                                                                  
                        );
                        
                        if (!in_array($a[4], $codigos_grupos)) {
                            array_push($codigos_grupos, $a[4]);
                            array_push($descripcion_grupos, $a[5]);
                        }
                        
                        
                        foreach ($arr_datos as $llave => $valor) {
                                $arr_datos[$llave] = $valor;
                        }
                        $this->db->insert('productos',$arr_datos); 
                    }
                        
                    $i++;
                }
                
                for($i=0;$i < count($codigos_grupos); ++$i){
                    $grupos_seleccionado = array(
                        'codigo'  => $codigos_grupos[$i],
                        'grupo'  => $descripcion_grupos[$i]                                      
                    );
                    $this->db->insert('grupos',$grupos_seleccionado);
                }
                $this->Almacen_model->limpiar_espacios();
                $output["error"]=false;
                $output["importacion"]=true; 
                $this->load->view('back/importador_precios.php', $output);
            
            } catch (Exception $exc) {
                $output["error"]=true;
                $output["importacion"]=false; 
                $this->load->view('back/importador_precios.php', $output);
            }

	}

	public function escritorio(){
		if ($this->verificar_acceso()) {
			$this->load->view('back/escritorio.php', $this->cargar_datos_escritorio());
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
        
	public function abm_rubros(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('rubros');
			$crud->columns('descripcion');
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_sub_rubros(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('sub_rubros');
			$crud->columns('descripcion', 'cod_rubro' );
			$crud->set_relation('cod_rubro','rubros','descripcion');
			$output = $crud->render();
			$this->load->view('back/home.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_slider(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('slider');
			$crud->columns('titulo', 'texto', 'imagen' );
			$crud->set_field_upload('imagen','assets/recursos/images/product-slide');
			$output = $crud->render();
			$this->load->view('back/home.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_paneles(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('contenido_paneles');
			$crud->columns('panel','titulo','imagen','detalle');
			$crud->set_field_upload('imagen','assets/recursos/images/product-panels');
			$crud->unset_add();
			$crud->unset_delete();
			$output = $crud->render();
		
			$this->load->view('back/home.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_logos(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('logos');
			$crud->columns('imagen','descripcion');
			$crud->set_field_upload('imagen','assets/recursos/images/logos');
			$crud->unset_add();
			$crud->unset_delete();
			$output = $crud->render();
		
			$this->load->view('back/home.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_p_especiales(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('productos_especiales');
			$crud->columns('articulo');
			$crud->set_relation('articulo','productos','descripcion');
			
			$output = $crud->render();
		
			$this->load->view('back/home.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_localidad(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('localidad');
			$crud->columns('codigo', 'localidad');
			$crud->set_relation('cod_zo_entrega','zona_entrega','descripcion');
			$output = $crud->render();
			$this->load->view('back/config.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_locales(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('locales');
//			$crud->columns('cod_fab', 'dire', 'denom');
			$crud->set_relation('loc','localidades','localidad');
			$output = $crud->render();
			$this->load->view('back/config.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function abm_costo_envio(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('zona_entrega');
			$crud->columns('codigo', 'descripcion', 'costo');
			$output = $crud->render();
			$this->load->view('back/config.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	
	public function pedidos($tipo){
		$output['output']=$this->renderizar_listado_pedidos_nuevos($tipo);						
		$this->load->view('back/pedidos.php', $output);
	}
	public function pedidos_historico(){
		/* $crud = new grocery_CRUD();
		$crud->set_table('pedido');
		$crud->columns('numero','fecha','cliente','total', 'estado');
		$crud->set_relation('cliente','cliente','correo');
		$crud->set_relation('localidad','localidad','localidad');
		$crud->set_relation('estado','estado_pedido','estado');
		$crud->unset_add();
		$output = $crud->render(); */
		
		$this->load->view('back/pedidos_historico.php');
	}
	
	
	
	function get_listado_historico() {
		echo json_encode($this->Pedido_model->obtener_historial());
	}
	
	function get_listado_precios() {
		echo json_encode($this->Almacen_model->obtener_precios());
	}
	
	
	public function ver_pedido($pedido){
		$output['output']=$this->renderizar_pedido($pedido);
		$this->load->view('back/ver_pedido.php', $output);
	}
	
	public function actualizar_pedido(){
		$pedido=$this->input->post("pedido");
		$estado=$this->input->post("estado");
		$this->Pedido_model->actualizar_pedido($pedido, $estado);
		$output['output']=$this->renderizar_pedido($pedido);
		$this->load->view('back/ver_pedido.php', $output);
	}
        
        public function imagenes(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('imagenes');
			//$crud->columns('codigo','sub_rubro','descripcion','imagen', 'precio');
			$crud->set_relation('cod_producto','productos','descripcion');
			$crud->set_field_upload('imagen','assets/img/productos');
                        //$crud->set_field_upload('frente','assets/recursos/images/product-almacen');
                        //$crud->set_field_upload('perfil','assets/recursos/images/product-almacen');
			//$crud->callback_after_insert(array($this, 'insertar_en_listado_precio'));
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	
	public function productos(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('productos');
                        $crud->set_primary_key('cod_prod','productos');
			//$crud->columns('codigo','sub_rubro','descripcion','imagen', 'precio');
//			$crud->set_relation('sub_rubro','rubros','descripcion');
//			$crud->set_field_upload('imagen','assets/recursos/images/product-almacen');
//                        $crud->set_field_upload('frente','assets/recursos/images/product-almacen');
//                        $crud->set_field_upload('perfil','assets/recursos/images/product-almacen');
			//$crud->callback_after_insert(array($this, 'insertar_en_listado_precio'));
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
        
        public function tabla_destacados(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('tabla_destacados');
                        $crud->unset_add();
                        $crud->unset_delete();
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
        
        public function productos_destacados(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('productos_destacados');
                        $crud->set_primary_key('cod_producto','productos');
			//$crud->set_relation('cod_producto','productos','codigo');
                        $crud->set_relation('destacado','tabla_destacados','descripcion');
			$crud->set_field_upload('imagen_1','assets/recursos/images/productos-destacados');
                        $crud->set_field_upload('imagen_2','assets/recursos/images/productos-destacados');
                        $crud->set_field_upload('imagen_3','assets/recursos/images/productos-destacados');
                        $crud->required_fields('cod_producto','destacado','detalle', 'imagen_1','precio', 'mostrar');
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	function insertar_en_listado_precio($post_array,$primary_key)
	{
		$this->Almacen_model->insertar_precios_productos($primary_key);	
		return true;
	}
	
	public function rubros(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('rubros');
		
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
        
	public function subrubros(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('sub_rubros');
			$crud->set_relation('cod_rubro','rubros','descripcion');
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function colores(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('colores');
		
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	public function talles(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('talles');
		
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	public function cantidades(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('cantidades');
		
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	
	public function actualizar_precios(){
		$output['lista_1']= $this->Almacen_model->obtener_lista_1(2);
		$output['lista_2']= $this->Almacen_model->obtener_lista_1(3);
		$this->load->view('back/precios.php', $output);
	}
	
	public function actualizar_fecha(){
		$lista=$this->input->post("lista");
		$fecha=$this->input->post("fecha");
		$this->Almacen_model->actualizar_fecha_lista($lista, $fecha);
		$output['lista_1']= $this->Almacen_model->obtener_lista_1(2);
		$output['lista_2']= $this->Almacen_model->obtener_lista_1(3);
		$this->load->view('back/precios.php', $output);
	}
	
	public function actualizar_precio_producto(){
		
		$codigo=$this->input->post("codigo");
		$lista_1=$this->input->post("lista_1");
		$lista_2=$this->input->post("lista_2");
		
		$this->Almacen_model->actualizar_producto($codigo, $lista_1, $lista_2);
		
	}
	
	public function nuevos_clientes(){
		$output['output']=$this->renderizar_listado_clientes_nuevos();
		$this->load->view('back/nuevos_clientes.php', $output);
	}
	
	public function clientes(){
		if ($this->verificar_acceso()) {
			/*$crud = new grocery_CRUD();
			$crud->set_table('cliente');
			//$crud->columns('codigo','correo','pass','apellido', 'direccion', 'cod_zona_entrega', 'celular', 'estado');
			$crud->set_relation('localidad','localidades','localidad');
			$crud->set_relation('lista_precios','listas_precios','descripcion_lista');
                        $crud->set_relation('provincia','provincias','provincia');
                        $crud->set_relation('tipo_iva','tipo_iva','iva');
                        $crud->set_relation('provincia','provincias','provincia');
			$crud->required_fields('usuario','correo','pass', 'nombre','apellido', 'celular','fijo',
                        'estado', 'lista_precios','localidad');
                        
			$output = $crud->render();*/
                    
                        $this->load->model("Cliente_model");
                        $this->load->model("Provincias_model");
                        $this->load->model("Iva_model");
                        $this->load->model("Vendedor_model");
                        
                        $output["clientes"]=$this->Cliente_model->getClientes();
                        $output["provincias"]=$this->Provincias_model->getProvincias();
                        $output["tipos_iva"]=$this->Iva_model->getTiposIva();
                        $output["vendedores"]=$this->Vendedor_model->getVendedores();
                        
			$this->load->view('back/clientes.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	public function localidades(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('localidades');
                        $crud->required_fields('localidad');
			$output = $crud->render();
			$this->load->view('back/clientes.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	public function provincias(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('provincia');
		
			$output = $crud->render();
			$this->load->view('back/clientes.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	public function usuarios(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('usuario');
			
			$output = $crud->render();
			$this->load->view('back/usuarios.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
	}
	public function config(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('configuracion');
			
			$output = $crud->render();
			$this->load->view('back/config.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
		
	}
        
        public function abm_vendedores(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('vendedor');
			
			$output = $crud->render();
			$this->load->view('back/config.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
		
	}
        
        public function abm_empleados(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('empleados');
                        $crud->set_primary_key('dni','empleados');
                        
                        $crud->set_relation('tipo_usuario','tipo_usuario','descripcion');
                        $crud->set_relation('cod_sucursal','locales','dire');
                        $crud->set_relation('cod_localidad','localidades','localidad');
                        $crud->set_field_upload('imagen','recursos/images/empleados/');

                        $crud->required_fields('');
                        //$crud->columns(array(''));
			
			$output = $crud->render();
			$this->load->view('back/config.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
		
	}
        
        public function abm_grupos(){
		if ($this->verificar_acceso()) {
			$crud = new grocery_CRUD();
			$crud->set_table('grupos');
                        $crud->set_primary_key('codigo','grupos');
                         $crud->set_field_upload('imagen','recursos/images/grupos/');
			
			$output = $crud->render();
			$this->load->view('back/productos.php', $output);
		}else{
			$output['salida_error']="";
			$this->load->view('back/loguin', $output);
		}
		
	}
        
        public function generacion_etiquetas() {
            $cajas=$this->input->post("cajas");
            $numero=$this->input->post("pedido");
            $datos_cliente=$this->Pedido_model->obtener_cliente($numero);
            $pedido=$this->Pedido_model->obtener_pedido($numero);
            
            echo $this->generar_tabla_rotulos($cajas, $datos_cliente['apellido'], 
                    $pedido['direccion_entrega'], $datos_cliente['celular'], $pedido['localidad']);
        }
		
	private function cargar_datos_escritorio() {
            $retiro=$this->Pedido_model->obtener_retiros_nuevos();
            $delivery=$this->Pedido_model->obtener_delivery_nuevos();

            $output['clientes']=$this->Cliente_model->obtener_clientes_nuevos();
            $output['pedidos']=$this->Pedido_model->obtener_pedidos_descarga();
            $output['delivery']=$delivery;
            $output['retiro']=$retiro;
            return $output;
	}
	
	private function renderizar_listado_clientes_nuevos() {
		$salida="";
		
		$listado=$this->Cliente_model->obtener_listados_clientes_pendientes();
		
		if ($listado!=null) {
			$salida="<div class='col-lg-12'>
                    	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	Listado de clientes que no activaron su correo
                        	</div>
                        	<div class='panel-body'>
                            	<div class='dataTable_wrapper'>
                                	<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
	                                    <thead>
	                                        <tr>
	                                            <th>Codigo</th>
	                                            <th>Correo</th>
	                                            <th>Apellido</th>
	                                            <th>Direccion</th>
	                                            <th>Localidad</th>
												<th>Tel</th>
												<th>Estado</th>
	                                        </tr>
	                                    </thead>
                                    	<tbody>";
											foreach ($listado as $l){
												$salida.= 
												"<tr>
													<td>".$l["codigo"]."</td>
													<td>".$l["correo"]."</td>
													<td>".$l["apellido"]."</td>
													<td>".$l["direccion"]."</td>
													<td>".$l["localidad"]."</td>
													<td>".$l["tel"]."</td>
													<td>".$l["estado"]."</td>
												 </tr>";
											}
							$salida.="</tbody>
                                	</table>
                            	</div>
                            	<div class='well'>
                                	<h4>Correo de activacion</h4>
                                	<p>Recuerde a sus clientes que esta pendiente la activacion.</p>
                                	<a class='btn btn-default btn-lg btn-block' target='_blank' href=''>Enviar correo</a>
                            	</div>
                        	</div>
                    	</div>
                	</div>";
		}else{
			$salida="<div class='col-lg-12'>
                    	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	No hay clientes pendientes de activacion.
                        	</div>
                        </div>	
                	</div>";
		}
				
		return $salida;
	}
	
	private function renderizar_listado_pedidos_nuevos($tipo) {
		$salida="";
		
		$listado=$this->Pedido_model->obtener_pedidos_nuevos($tipo);
		
		if ($listado!=null) {
			$salida="<div class='col-lg-12'>
                    	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	
								 <i class='fa fa-arrow-circle-right'></i><a href='".site_url('backoffice/pedidos/0')."'> Todos </a> |
								 <i class='fa fa-arrow-circle-right'></i><a href='".site_url('backoffice/pedidos/1')."'> Retiro </a> |
								 <i class='fa fa-arrow-circle-right'></i><a href='".site_url('backoffice/pedidos/2')."'> Delivery </a> |
                        	</div>
                        	<div class='panel-body'>
                            	<div class='dataTable_wrapper'>
                                	<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
	                                    <thead>
	                                        <tr>
	                                            <th>Pedido</th>
	                                            <th>Fecha</th>
	                                            <th>Cliente</th>
	                                            <th>Total</th>
	                                            <th>Estado</th>
												<th>Tipo</th>
												<th>Fecha</th>
												<th>Accion</th>
	                                        </tr>
	                                    </thead>
                                    	<tbody>";
											foreach ($listado as $l){
												$tipo="";
												$fecha_cumplir_pedido="";
												
												if($l["retiro"]!=null){
													$tipo="retira cliente";
													$fecha_cumplir_pedido=$l["retiro"];
												}else{
													$tipo="delivery";
													$fecha_cumplir_pedido=$l["entrega"];
												}
												$salida.= 
												"<tr>
													<td>".$l["numero"]."</td>
													<td>".$l["fecha"]."</td>
													<td>".$l["cliente"]."</td>
													<td>".$l["total"]."</td>
													<td>".$l["estado"]."</td>
													<td>".$tipo."</td>
													<td>".$fecha_cumplir_pedido."</td>
													<td><a href='".site_url('backoffice/ver_pedido/'.$l["numero"])."'>ver pedido</a></td>
												 </tr>";
											}
							$salida.="</tbody>
                                	</table>
                            	</div>
                            	
                        	</div>
                    	</div>
                	</div>";
		}else{
			$salida="<div class='col-lg-12'>
                    	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	No hay Pedidos Nuevos.
                        	</div>
                        </div>	
                	</div>";
		}
				
		return $salida;
	}
	
	private function renderizar_pedido($numero) {
		$salida="";
		// obtener datos del cliente a partir del numero pedido.
		$datos_cliente=$this->Pedido_model->obtener_cliente($numero);
		// el pedido se retira?, devuelve true o false.
		$se_retira=$this->Pedido_model->el_pedido_se_retira($numero);
		// obtener datos del pedido a partir del numero pedido.
		$pedido=$this->Pedido_model->obtener_pedido($numero);
		$tipo_entrega="retiro";
		$fecha_entrega=$pedido['f_retiro'];
		if($pedido['f_retiro']==null){
			$tipo_entrega="entrega";
			$fecha_entrega=$pedido['f_entrega'];
		}
		
		
		// obtener detalle a partir del numero de numero pedido.
		$detalle=$this->Pedido_model->obtener_pedido_detalle($numero);
		$datos_local="";
		//obtener datos del local a partir del numero de pedido.
		if ($pedido['local']!=null){
			$datos_local=$this->Pedido_model->obtener_local($numero);
		}
		//obtener los estados posibles del pedido para listarlos en pantalla
		$estados=$this->Pedido_model->obtener_estados();
	
		if (true) {
			$salida="<div class='col-lg-6'>
                     	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	Datos del Cliente
                        	</div>
                        	
                        	<div class='panel-body'>
                            	<div class='table-responsive'>
                                	<table class='table table-striped table-bordered table-hover'>
                                   		<tbody>
	                                        <tr>
	                                            <td>Numero</td>
												<td>".$datos_cliente['codigo']."</td>
	                                        </tr>
											<tr>
	                                            <td>Correo</td>
												<td>".$datos_cliente['correo']."</td>
	                                        </tr>
											<tr>
	                                            <td>Nombre</td>
												<td>".$datos_cliente['nombre']."</td>
	                                        </tr>
											<tr>
	                                            <td>Apellido</td>
												<td>".$datos_cliente['apellido']."</td>
	                                        </tr>
											<tr>
	                                            <td>Celular</td>
												<td>".$datos_cliente['celular']."</td>
	                                        </tr>
											<tr>
	                                            <td>Fijo</td>
												<td>".$datos_cliente['fijo']."</td>
	                                        </tr>
                                                <tr>
	                                            <td>CUIL/DNI</td>
												<td>".$datos_cliente['dni']."</td>
	                                        </tr>
                                    	</tbody>
                                	</table>
                            	</div>
                        	</div>
                    	</div>
                	</div>
					<div class='col-lg-6'>
                     	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	Datos del Pedido
                        	</div>
                        	
                        	<div class='panel-body'>
                            	<div class='table-responsive'>
                                	<table class='table table-striped table-bordered table-hover'>
                                   		<tbody>
	                                        <tr>
	                                            <td>Pedido</td>
												<td><span id='pedido_seleccionado'>".$pedido['numero']."</span></td>
	                                        </tr>
											<tr>
	                                            <td>Fecha recibido</td>
												<td>".$pedido['fecha']."</td>
	                                        </tr>
											<tr>
	                                            <td>Total</td>
												<td> ".$pedido['total']." </td>
	                                        </tr>
											<tr>
	                                            <td>Pago</td>
												<td>".$pedido['pago']."</td>
	                                        </tr>
											<tr>
	                                            <td>Tipo Entrega</td>
												<td>".$tipo_entrega."</td>
	                                        </tr>
											<tr>
	                                            <td>Fecha</td>
												<td>".$fecha_entrega."</td>
	                                        </tr>";
								if($tipo_entrega=="entrega"){
									$salida.="<tr>
	                                            <td>Direccion</td>
												<td>".$pedido['direccion_entrega']."</td>
	                                        </tr>
											<tr>
	                                            <td>Localidad</td>
												<td>".$pedido['localidad']."</td>
	                                        </tr>
											<tr>
	                                            <td>Detalle</td>
												<td>".$pedido['detenvio']."</td>
	                                        </tr>
											";
											
									
								}else{
									$salida.="<tr>
	                                            <td>Local</td>
												<td>".$datos_local['cod_web']."</td>
	                                        </tr>
											<tr>
	                                            <td>Direccion</td>
												<td>".$datos_local['dire']."</td>
	                                        </tr>
											<tr>
	                                            <td>Localidad</td>
												<td>".$datos_local['localidad']."</td>
	                                        </tr>";
								}				
								
                           	$salida.=   "</tbody>
                                	</table>";
                           	$attributes = array('id' => 'form_actualizar_pedido', 'name' => 'formulario_pedido');
                           	$salida.= form_open('backoffice/actualizar_pedido', $attributes);
                           	$salida.="
                           			<div class='form-group'>
                           				<input type='hidden' name='pedido' value='".$pedido['numero']."'/>
                                    	<label>Estado Pedido</label>
                                        <select class='form-control' name='estado'>
                           			";
                           			foreach ($estados as $e){
                           				$selected="";
                           				if ($e['codigo']==$pedido['estado']) { $selected="selected='selected'";}
                           				$salida.="<option value='".$e['codigo']."' ".$selected.">".$e['estado']."</option>";
                           			}
                                        	
                            $salida.=   "</select></div><div class='form-group'><button type='submi' class='btn btn-default'>Actualizar</button>";
                            $salida.= form_close();
                            $salida.= "
                                        
                                    </div>";
                            if ($pedido['direccion_entrega']!=null){
                                //$salida.="<button class='btn btn-default' onClick ='generar_bultos();' >Generar Etiquetas</button>";
                                //<button class='btn btn-default' onClick ='generar_detalle();' >Exportar Detalle</button>
                            }
                            $salida.="
                                    
                            	</div>
                        	</div>
                    	</div>
                	</div>
					<div class='col-lg-12'>
                     	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	Detalle del Pedido
                        	</div>
                        	
                        	<div class='panel-body'>
                                
                            	<div class='table-responsive'>
                                	<table id='detalle_pedido' class='table table-striped table-bordered table-hover' >
                                            <thead>
	                                        <tr>
	                                            <th>Codigo</th>
	                                            <th>Producto</th>
	                                            <th>Cant</th>
                                                    <th>Pre</th>
	                                        </tr>
                                            </thead>
                                   	<tbody >";
                           	
                           	foreach ($detalle as $d){
                           			$salida.="<tr>
	                                            <td>".$d['codigo']."</td>
                                                    <td>".$d['producto']."</td>
                                                    <td>".$d['cantidad']."</td>
                                                    <td>".$d['precio']."</td>
												
	                                        </tr>";
                           	}  
                                    $salida.="</tbody>
                                	</table>
                                    
                            	</div>
                        	</div>
                    	</div>
                	</div>
					";
		}else{
			$salida="<div class='col-lg-12'>
                    	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	No hay Pedidos Nuevos.
                        	</div>
                        </div>
                	</div>";
		}
	
		return $salida;
	}
        
        private function generar_tabla_rotulos($cajas, $nombre, $direccion, $tel, $localidad) {
            $tabla="<table id='rotulos_eti'>";
            for($i=1;$i<=$cajas;$i++){
                $tabla.=
                "<tr>"
                    . "<td>"
                        ."<table border='3px' style='font-size:30px'>
                              <tr>
                                  <td>Nombre: ".$nombre."</td>
                              </tr>
                              <tr>
                                  <td>Direccion: ".$direccion."</td>
                              </tr>
                              <tr>
                                  <td>Telefono: ".$tel."</td>
                              </tr>
                              <tr>
                                  <td>localidad: ".$localidad."</td>
                              </tr>
                              <tr>
                                  <td>Transporte: <br><br><br></td>
                              </tr>
                              <tr>
                                  <td>Observaciones: <br><br><br></td>
                              </tr>
                              <tr>
                                  <td rowspan='6'>Numero Bulto ".$i."/".$cajas."</td>
                              </tr>
                          </table>"
                    ."<td>"
                . "</tr>";
                
            }
             $tabla.="</table>";
            return $tabla;
        }
	
	public function salida() {
		$this->session->sess_destroy();
		$output['salida_error']="";
		$this->load->view('back/loguin/ingreso', $output);
	}
        
        public function prueba() {
            echo "hola";
        }
        
        public function generar_pedidos_texto() {
            
            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"pedidos.odb\"");
            $pedido_numero=1;
            $pedido=$this->Pedido_model->obtener_pedidos_pendientes();
            
            foreach($pedido as $p){
                $detalle=$this->Pedido_model->obtener_detalle_pedido($p["numero"]);
                $datos_complementarios_cliente=$this->Cliente_model->getCliente($p["cliente"]);
                foreach ($detalle as $d) {
                    $cliente=$datos_complementarios_cliente["codigo_masabores"];
                    $articulo=$d["producto"];
                    $cantidad=$d["cantidad"];
                    $descuento=$d["descuento"];;
                    $vendedor=$datos_complementarios_cliente["vendedor"];
                    echo "\"".$pedido_numero."\",\"".$cliente."\",\"".$articulo."\",\"".$cantidad."\",\"".$descuento."\",\"".$vendedor."\"\r\n";
                }
                $this->Pedido_model->actualizar_pedido($p["numero"], 2);
                $pedido_numero++; 
            }
            
            
            
        }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */