<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
        public $partes_web;
        
        public function __construct(){
            parent::__construct();
            $this->output->set_header('Access-Control-Allow-Origin: *');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->load->library('Usuario');
            $this->load->library('Session');
            $this->load->library('Local');
            $this->load->library('Pedido');
            $this->load->model('Almacen_model');
            $this->load->model('Cliente_model');
            $this->load->model('Local_model');
            $this->load->model('Configuracion_model');
            $this->load->model('Pedido_model');
            
            $this->load->library('Partes_Web');
            $this->partes_web = new Partes_Web();
            
	}
        
	public function index(){
            
            $this->load->model("Slider_marcas");
            
            $salida["rubros"]=  $this->Almacen_model->obtener_rubros();
            /*$salida["correo"]= $this->Configuracion_model->obtener_config(1);
            $salida["movil"]= $this->Configuracion_model->obtener_config(2);
            $salida["telefono"]= $this->Configuracion_model->obtener_config(3);
            $salida["direccion"]= $this->Configuracion_model->obtener_config(4);*/
            //$salida["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $salida["horarios"]= $this->Configuracion_model->obtener_config(5);
            $salida["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $salida["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $salida["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $salida["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $salida["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $salida["destacado_5"]= $this->Almacen_model->productos_destacados(5);
            $salida["marcas"]=$this->Slider_marcas->getSliderMarcas();
            
            $salida["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $salida["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $salida["menu_superior"]= $this->partes_web->getMenuSuperior();
            $salida["parte_buscador"]= $this->partes_web->getParteBuscador();
            $salida["footer"]= $this->partes_web->getFooter();
            $salida["siganos_en"]= $this->partes_web->getSiganosEn();
            
            $this->load->model("Home_seccion_model");
            $salida["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            
            $this->load->view('entrada', $salida);
	}
        
        public function registrarse(){
            
            if($this->session->userdata("ingresado") == false && !$this->input->post())
            {
                $this->load->model("Provincias_model");
                $this->load->model("Vendedor_model");
                $this->load->model("Iva_model");
                $this->load->model("Paises_model");
                
                $salida["paises"]=  $this->Paises_model->getPaises();
                $salida["rubros"]=  $this->Almacen_model->obtener_rubros();
                $salida["correo"]= $this->Configuracion_model->obtener_config(1);
                $salida["movil"]= $this->Configuracion_model->obtener_config(2);
                $salida["telefono"]= $this->Configuracion_model->obtener_config(3);
                $salida["direccion"]= $this->Configuracion_model->obtener_config(4);
                $salida["horarios"]= $this->Configuracion_model->obtener_config(5);
                $salida["localidad"]= $this->Configuracion_model->obtener_config(6);
                
                $salida["vendedores"]=$this->Vendedor_model->getVendedores();
                $salida["tipos_iva"]=$this->Iva_model->getTiposIva();
                
                $salida["modal_ingreso"]= $this->partes_web->getModalIngreso();
                $salida["menu_principal"]= $this->partes_web->getMenuPrincipal();
                $salida["menu_superior"]= $this->partes_web->getMenuSuperior();
                $salida["parte_buscador"]= $this->partes_web->getParteBuscador();
                $salida["footer"]= $this->partes_web->getFooter();
                $salida["siganos_en"]= $this->partes_web->getSiganosEn();
                $this->load->view('registrarse', $salida);
            }
            else
            {
                // REGISTRO DE CLIENTE AL VENIR POR POST 
                
                $this->load->model("Cliente_model");
                
                $datos= $this->input->post();
                $datos["estado"]="pendiente";
                $respuesta = $this->Cliente_model->registrarClientePorPost($datos);
                
                if($respuesta)
                {
                    $resultado = $this->Cliente_model->getClienteInicioSesion($this->input->post("usuario"),$this->input->post("pass"));
                
                    $datos = Array(
                        "codigo"=>$resultado["codigo"],
                        "usuario"=>$resultado["usuario"],
                        "correo"=>$resultado["correo"],
                        "pass"=>$resultado["pass"],
                        "nombre"=>$resultado["nombre"],
                        "apellido"=>$resultado["apellido"],
                        "direccion"=>$resultado["direccion"],
                        "celular"=>$resultado["celular"],
                        "estado"=>$resultado["estado"],
                        "lista_precios"=>$resultado["lista_precios"],
                        "dni_cuil"=>$resultado["dni_cuil"],
                        "localidad"=>$resultado["localidad"],
                        "ingresado"=>true
                    );
                    
                    $this->session->set_userdata($datos);
                    
                    redirect("Welcome");
                    
                }
            }
	}
        
        public function acceso() {
            $output['salida_error']="";
            $this->load->view('back/loguin/ingreso', $output);
        }
        
        public function validar_usuario(){
                        
            //$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|valid_email');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('pass', 'Pass', 'required');
            $this->form_validation->set_message(
                            'required', 'Valor requerido. No lo deje en blanco');
            //$this->form_validation->set_message(
                            //'valid_email', 'Ingrese con mail valido. Ej. jose@suempresa.com');
            if ($this->form_validation->run() == FALSE){
                $output['salida_error']="";
                $this->load->view('back/loguin/ingreso', $output);
                
            }else{
                $usuario_ingresado = $this->input->post("usuario");
                $pass_ingresado = $this->input->post("pass");
                
                $usuario=new Usuario();
                $usuario_verificado=$usuario->verificar_usuario($usuario_ingresado, $pass_ingresado);
               
                if ($usuario_verificado->getExiste()) {
                  if($usuario_verificado->getTipo_usuario()==1 || $usuario_verificado->getTipo_usuario()==3){
                      redirect('/backoffice/escritorio');
                  } 
                  else if($usuario_verificado->getTipo_usuario() == 2)
                  {
                      redirect('/Vendedor');
                  }
                }else{
                    $output['salida_error']="datos incorrectos, ingreselos nuevamente";
                    $this->load->view('back/loguin/ingreso', $output);
                }
            }
	}
        
        public function buscar() {
            $output['productos']="";
            if($this->input->post("busqueda")!=="" && $this->input->post("busqueda")!==null){
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos_by_busqueda/".$this->input->post("busqueda");
            }else{
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos/";
            }
            $output["rubros"]=  $this->Almacen_model->obtener_rubros();
            $output['lista']=  $this->Almacen_model->obtener_lista_precios();
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            $this->load->view('mostrar_productos', $output);

        }
        
        public function productos() {
            $output['productos']="";
            if($this->input->post("busqueda")!=="" && $this->input->post("busqueda")!==null){
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos_by_busqueda/".$this->input->post("busqueda");
            }else{
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos/";
            }
            $output["rubros"]=  $this->Almacen_model->obtener_rubros();
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            $this->load->view('grupos', $output);

        }
        
        public function zonas_de_cobertura(){
           
            $this->load->model("Zonas_cobertura_model");
            
            $output["zonas_coberturas"]=  $this->Zonas_cobertura_model->getZonasCoberturas();
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            $this->load->view('zonas_de_cobertura', $output);

        }
        
        public function nosotros() {
            
            $this->load->model("Nosotros_model");
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            $output["nosotros"]= $this->Nosotros_model->getNosotros();
            $this->load->view('nosotros', $output);

        }
        
        public function contacto() {
            
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            
            $output["mensaje_error"]="";
            $this->load->view('contacto', $output);

        }
        
        public function enviar_mensaje_contacto()
        {
            if($this->input->post())
            {
                $this->load->model("Mensaje_model");
                
                $respuesta = $this->Mensaje_model->agregarMensaje($this->input->post("nombre"),$this->input->post("correo"),$this->input->post("telefono"),$this->input->post("mensaje"));
            
                
                $output["correo"]= $this->Configuracion_model->obtener_config(1);
                $output["movil"]= $this->Configuracion_model->obtener_config(2);
                $output["telefono"]= $this->Configuracion_model->obtener_config(3);
                $output["direccion"]= $this->Configuracion_model->obtener_config(4);
                $output["horarios"]= $this->Configuracion_model->obtener_config(5);
                $output["localidad"]= $this->Configuracion_model->obtener_config(6);
                
                if($respuesta)
                {
                    $output["mensaje_error"]="Mensaje enviado correctamente";
                }
                else
                {
                    $output["mensaje_error"]="No se ha podido enviar el mensaje, verifique sus datos";
                }
                
                $this->load->view('contacto', $output);
            }
            else
            {
                redirect("welcome/contacto");
            }
        }
        
        public function lista_de_precios() {
            $output['productos']="";
            if($this->input->post("busqueda")!=="" && $this->input->post("busqueda")!==null){
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos_by_busqueda/".$this->input->post("busqueda");
            }else{
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos/";
            }
            $output["rubros"]=  $this->Almacen_model->obtener_rubros();
            $output['lista']=  $this->Almacen_model->obtener_lista_precios();
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            
            $this->load->view('mostrar_productos', $output);

        }
        
        public function busqueda_rubro($rubro) {
            $output['productos']="";
            if($rubro!=0){
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos_by_rubro/".$rubro;
            }else{
                $output['productos']=  base_url()."index.php/welcome/get_listado_productos/";
            }
            $output["rubros"]=  $this->Almacen_model->obtener_rubros();
            $output['lista']=  $this->Almacen_model->obtener_lista_precios();
            
            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            $this->load->view('mostrar_productos', $output);

        }
        
        function get_listado_productos_by_rubro($rubro) {
            echo json_encode($this->Almacen_model->todos_productos_by_rubro($rubro));
	}
        
        function get_listado_productos_by_busqueda($busqueda) {
            echo json_encode($this->Almacen_model->todos_productos($busqueda));
	}
        
        function get_listado_productos() {
            echo json_encode($this->Almacen_model->todos_productos(""));
	}
        
        function iniciar_sesion_cliente() {
            
            
                $respuesta = false;
                $resultado = $this->Cliente_model->getClienteInicioSesion($this->input->post("usuario"),$this->input->post("password"));
                
                if($resultado && ($resultado["estado"]=="confirmado"))
                {
                    $resultado = $resultado;
                    
                    $datos = Array(
                        "codigo"=>$resultado["codigo"],
                        "usuario"=>$resultado["usuario"],
                        "correo"=>$resultado["correo"],
                        "pass"=>$resultado["pass"],
                        "nombre"=>$resultado["nombre"],
                        "apellido"=>$resultado["apellido"],
                        "direccion"=>$resultado["direccion"],
                        "celular"=>$resultado["celular"],
                        "estado"=>$resultado["estado"],
                        "lista_precios"=>$resultado["lista_precios"],
                        "dni_cuil"=>$resultado["dni_cuil"],
                        "localidad"=>$resultado["localidad"],
                        "ingresado"=>true
                    );
                    
                    $this->session->set_userdata($datos);
                    
                    $respuesta = true;
                }
                
                echo json_encode($respuesta);
            
        }
        
        public function ver_imagen_producto() {
            echo $codigo_producto=$this->input->post("codigo");
//            $imagen= $this->Almacen_model->obtener_imagen_productos($codigo_producto);
//            if ($imagen != null) {
//                 echo "<img src='".base_url()."assets/img/productos/".$imagen."' class=''/>";
//             }  else {
//                 echo "no hay imagen para mostrar";
//             }
        }
        
        public function ver_imagen_producto_con_memo() {
            $codigo_web=$this->input->post("codigo");
            $codigo_producto= $this->Almacen_model->obtener_producto($codigo_web);
            $imagen= $this->Almacen_model->obtener_imagen_productos($codigo_producto["cod_prod"]);
            if ($imagen!=null) {
                
                 echo "<img src='".base_url()."assets/img/productos/".$imagen."' class=''/>";
                 echo "<p>".$codigo_producto["memo"]."</p>";
             }  else {
                 echo "no hay imagen para mostrar";
             }
        }
        
        public function checkout(){
            $this->ejecutar_checkout(false, "", "");
        }
        
        public function registrar_pedido() {
            //datos traidos del form registrar pedido del checkout
            $cliente=$this->input->post("cliente");
            $cod_direccion=$this->input->post("cod_direccion");
            $localidad_entrega=$this->input->post("localidad");
            $cod_local_retiro=$this->input->post("cod_local_retiro");
            $total=$this->input->post("total");
            $estado=$this->input->post("estado");
            $fecha=$this->input->post("fecha");
            $envio=$this->input->post("envio");
            $pago=$this->input->post("pago");
            $detenvio=$this->input->post("detenvio");
            $pedido_detalle = json_decode($this->input->post("pedido"),true);
            //datos que se obtinene a partir del codigo direccion para persistir en el pedido
            $local=null;
            $costo=null;
            $localidad=null;
            $direccion=null;
            //obtener el ultimo pedido
            $consulta= $this->Pedido_model->obtener_ultimo();
            //se genera el pedido para persistirlo
            $pedido = new Pedido();
            $pedido->numero=$consulta;
            $pedido->cliente=$cliente;
            $pedido->total=$total;
            $pedido->estado=$estado;
            $pedido->fecha=null;
            $pedido->pago=$pago;
            $pedido->detenvio=$detenvio;
            // se pregunta por el tipo de envio si es 1 hay que entregarlo si no se retira.
            if ($envio == "1") {
                $pedido->f_entrega=$fecha;
                $local=null;
                $costo=null;
                //$local=$this->Cliente_model->obtener_local_entrega_by_cod_direccion($cod_direccion);
                //$costo=$this->Cliente_model->obtener_costo_entrega_by_cod_direccion($cod_direccion);
                $localidad=$localidad_entrega;
                $direccion=$cod_direccion;
                //$localidad=$this->Cliente_model->obtener_localidad_entrega_by_cod_direccion($cod_direccion);
                //$direccion=$this->Cliente_model->obtener_direccion_entrega_by_cod_direccion($cod_direccion);
            }else {
                $pedido->f_retiro=$fecha;
                $local=$cod_local_retiro;
            }
            $pedido->local=$local;
            $pedido->costo_envio=$costo;
            $pedido->direccion_entrega=$direccion;
            $pedido->localidad=$localidad;

            $this->Pedido_model->insertarPedido($pedido);
            // se persiste el detalle del pedido en la tabla pedido_detalle
            if ($pedido_detalle!=null) {
                foreach($pedido_detalle as $p){
                    //verificamos la insercion, si falla sale con un break del bucle
                    $cod_base=$this->Almacen_model->get_codigo_masabores($p["cod"]);
                    if ($this->Pedido_model->insertarPedidoDetalle($consulta, $cod_base["cod_prod"], $p["pre"], $p["cant"])) {
                            ;
                    }else{
                            break;
                    }
                }
            }

            //$this->enviar_pedido($this->session->userdata('correo'), $this->session->userdata('nombre'), $consulta, $fecha);

            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            $output["footer"]= $this->partes_web->getFooter();
            $this->load->view('finalizar_pedido', $output);
	}
        
        public function cerrar_sesion()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }
        
        private function ejecutar_checkout($nuevo_cliente, $error_usuario, $error_pass) {
            $salida["rubros"]=  $this->Almacen_model->obtener_rubros();
            $salida['lista']=  $this->Almacen_model->obtener_lista_precios();
            $salida['nuevo_cliente'] = $nuevo_cliente;
            $salida['validar_usuario'] = $this->verificar_usuario(null);
            $salida['error_usuario'] = $error_usuario;
            $salida['error_pass'] = $error_pass;
            $salida['localidades'] = "";//$this->obtener_localidad_entrega();
            //$salida['minimo_tarjeta_credito'] = $this->Ecomerce_model->obtener_configuracion(12);
            $salida['locales'] = $this->obtener_locales(null);
            $salida['lista_direcciones']= "";//$this->cliente_model->obtener_listado_direcciones($this->session->userdata('correo'));
            $salida["correo"]= $this->Configuracion_model->obtener_config(1);
            $salida["movil"]= $this->Configuracion_model->obtener_config(2);
            $salida["telefono"]= $this->Configuracion_model->obtener_config(3);
            $salida["direccion"]= $this->Configuracion_model->obtener_config(4);
            $salida["horarios"]= $this->Configuracion_model->obtener_config(5);
            $salida["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $salida["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $salida["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $salida["menu_superior"]= $this->partes_web->getMenuSuperior();
            $salida["parte_buscador"]= $this->partes_web->getParteBuscador();
            $salida["footer"]= $this->partes_web->getFooter();
            
            $this->load->view('checkout', $salida);
        }
        
        private function enviar_pedido($correo_cliente, $nombre_cliente, $pedido, $fecha) {
            $enlace_cliente=site_url('welcome/ver_pedido_cliente/'.$pedido);
            $enlace_call_center=site_url('backoffice/ver_pedido/'.$pedido);

            $correo_e=$this->Configuracion_model->obtener_config(1);
            $sitio="presupuestos@todopositivo.net";
            //$sitio="sirianni.adrian@gmail.com";
            $this->procesar_correo($sitio, $correo_e, 'Presupuesto hecho por el sitio', 
                    $this->mensaje_call_center($correo_cliente, $pedido, $fecha, $enlace_call_center));

            $this->procesar_correo($sitio, $correo_cliente, 'Confirmacion de Presupuesto', 
                    $this->mensaje_cliente($nombre_cliente, $pedido, $fecha, $enlace_cliente));

	}
	
	private function procesar_correo($from, $to, $subject, $mensaje){
            $envio;

            //configuracion para gmail
//            $configCorreo = array(
//                    'protocol' => 'smtp',
//                    'smtp_host' => 'mail.todopositivo.net',
//                    'smtp_port' => 25,
//                    'smtp_user' => 'presupuestos@todopositivo.net',
//                    'smtp_pass' => 'Presu1128',
//                    'mailtype' => 'html',
//                    'charset' => 'utf-8',
//                    'newline' => "\r\n"
//            );
            
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
//
            $this->email->initialize($config);

//            $this->email->initialize($configCorreo);
            $this->email->from('presupuestos@todopositivo.net', 'presupuestos@todopositivo.net');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($mensaje);
            $envio=$this->email->send();
            return $envio;
	}
	
	private function mensaje_call_center($cliente, $pedido, $fecha, $direccion_enlace){
		
		$mensaje = "
		<table border='0'
				cellspacing='0'
				cellpadding='30'
				style='width:100%;
				font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
				text-align:center;
				background:#1C468C' width='100%' align='center'>
			<tbody>
				<tr>
					<td align='center'
						style='width:100%;
						font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
						text-align:center; background:#BDBDBD' width='100%'>
						<table border='0' cellspacing='0' cellpadding='0' width='590'>
							<tbody>
								<tr>
									<td style='width:160px' width='160'>
										<a href='' style='text-decoration:none'>
											<img src='".base_url()."assets/recursos/images/logo.png' style='display:block; border:0px'>
										</a>
									</td>
									<td valign='bottom' style='text-align:right' align='right'>
										<h3 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
													margin:0; padding:0;
													font-size:15px;
													font-weight:400; color:#FFFFFF'>".$fecha.
														"</h3>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align='center' style='width:100%;
										font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
										text-align:center; background:#FFFFFF'><br><br><br>
						<h1 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif; font-weight:300; margin:0; padding:0; font-size:32px; line-height:40px; color:#000000; text-align:center' align='center'>Hey, realizaron un Presupuesto on line :) !!!</h1>
						<h3 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif; font-weight:300; margin:0; padding:0; font-size:20px; line-height:40px; color:#000000; text-align:center' align='center'>
							Usuario: ".$cliente."<br>
							Pedido Nro.: ".$pedido."
						</h3>
						".$this->renderizar_pedido_mail($pedido)."
					</td>
				</tr>
			</tbody>
		</table>";
		return $mensaje;
	}
	
	private function mensaje_cliente($nombre_cliente, $pedido, $fecha, $direccion_enlace){
		
		$correo=$this->Configuracion_model->obtener_config(1);
		$telefono=$this->Configuracion_model->obtener_config(3);
		$horario=$this->Configuracion_model->obtener_config(5);

		$mensaje = "
		<table border='0'
				cellspacing='0'
				cellpadding='30'
				style='width:100%;
				font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
				text-align:center;
				background:#1C468C' width='100%' align='center'>
			<tbody>
				<tr>
					<td align='center'
						style='width:100%;
						font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
						text-align:center; background:#BDBDBD' width='100%'>
						<table border='0' cellspacing='0' cellpadding='0' width='590'>
							<tbody>
								<tr>
									<td style='width:160px' width='160'>
										<a href='' style='text-decoration:none'>
											<img src='".base_url()."assets/recursos/images/logo.png' style='display:block; border:0px'>
										</a>
									</td>
									<td valign='bottom' style='text-align:right' align='right'>
										<h3 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
													margin:0; padding:0;
													font-size:15px;
													font-weight:400; color:#FFFFFF'>".$fecha.
														"</h3>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align='center' style='width:100%;
										font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
										text-align:center; background:#EEEEEE'><br><br><br>
						<h1 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif; font-weight:300; margin:0; padding:0; font-size:32px; line-height:40px; color:#000000; text-align:center' align='center'>".$nombre_cliente.", gracias por tu presupuesto !!!</h1>
						<h3 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif; font-weight:300; margin:0; padding:0; font-size:20px; line-height:40px; color:#000000; text-align:center' align='center'>
							Su nro. de pedido es: ".$pedido."<br>
							Cualquier consulta podra hacerla a: ".$correo["envioripcion"]."</h3>
							<h3 style='font-family:Helvetica Neue, Helvetica, Arial, sans-serif; font-weight:300; margin:0; padding:0; font-size:20px; line-height:40px; color:#000000; text-align:center' align='center'>O llamando al ".$telefono["descripcion"]."<br>
				  			Horario: ".$horario["descripcion"]."<br>
				  			<br>
						</h3>
						".$this->renderizar_pedido_mail($pedido)."
					</td>
				</tr>
			</tbody>
		</table>";
		return $mensaje;
	}
        
        public function obtener_locales($localidad){
	
		$consulta;
	
		if ($localidad!=null) {
			$consulta= $this->Local_model->obtener_locales($localidad);
		}else{
			$consulta= $this->Local_model->obtener_todos_locales();
		}
	
		$locales_carga=array();
		if ($consulta!=null) {
			foreach($consulta as $loc){
				$l= new Local();
				$l->cod_web=$loc["cod_web"];
				$l->direccion=$loc["direccion"];
				$l->localidad=$loc["loc"];
				array_push($locales_carga, $l);
			}
		}
	
		if ($localidad!=null) {
			if ($locales_carga!=null) {
				foreach($locales_carga as $loc){
					echo "<option value ='".$loc->cod_web."'>".$loc->localidad." - ".$loc->direccion."</option>";
				}
			}
		}else{
			return $locales_carga;
		}
	
	
	}
        
        private function renderizar_pedido_mail($numero) {
		
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
	
		//$pedido=$this->Pedido_model->obtener_pedido($numero);
		//$detalle=$this->Pedido_model->obtener_pedido_detalle($numero);
	
		if (true) {
			$salida="<div class='col-lg-6'>
                     	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                                    <b><i> Datos del Cliente<i></b>
                        	</div>
                        	
                        	<div class='panel-body'>
                            	<div class='table-responsive'>
                                	<table border='1' >
                                   		<tbody>
	                                        <tr>
	                                            <td>Num. de cliente</td>
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
                                    	</tbody>
                                	</table>
                            	</div>
                        	</div>
                    	</div>
                	</div>
                        <br>
					<div class='col-lg-6'>
                     	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	<b><i> Datos del Pedido<i></b>
                        	</div>
                        	
                        	<div class='panel-body'>
                            	<div class='table-responsive'>
                                	<table border='1'>
                                   		<tbody>
	                                        <tr>
	                                            <td>Num. de pedido</td>
												<td>".$pedido['numero']."</td>
	                                        </tr>
											<tr>
	                                            <td>Fecha recibido</td>
												<td>".$pedido['fecha']."</td>
	                                        </tr>
											<tr>
	                                            <td>Total</td>
												<td>".$pedido['total']."</td>
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
                           	
                            $salida.= "
                                    </div>
                            	</div>
                        	</div>
                    	</div>
                	</div>
                        <br>
					<div class='col-lg-12'>
                     	<div class='panel panel-default'>
                        	<div class='panel-heading'>
                            	<b><i> Detalle del Pedido<i></b>
                        	</div>
                        	
                        	<div class='panel-body'>
                            	<div class='table-responsive'>
                                	<table border='1'>
										<thead>
	                                        <tr>
	                                            <th>Codigo</th>
	                                            <th>Producto</th>
	                                            <th>Cant</th>
                                                    <th>Pre</th>
                            					
	                                        </tr>
                                    	</thead>
                                   		<tbody>";
                           	
                           	foreach ($detalle as $d){
                           			$salida.="<tr>
	                                            <td>".$d['cod_prod']."</td>
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
        
        private function verificar_usuario($usuario){
            if ($this->session->userdata('ingresado')) {
                    return true;
            }else{
                    return false;
            }
	}
        
        
}
