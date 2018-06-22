<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
            $this->load->library('Mailer');
            $this->load->model('Almacen_model');
            $this->load->model('Cliente_model');
            $this->load->model('Local_model');
            $this->load->model('Configuracion_model');
            $this->load->model('Pedido_model');
            $this->load->model('Metadatos_model');
            $this->load->model("Publicidades_model");
            $this->load->model("Formas_pago_model");
            $this->load->library('Partes_Web');
            $this->load->model("Home_seccion_model");
            $this->partes_web = new Partes_Web();
            
	}
        
    public function index(){
            
            // CARGANDO METADATOS
            $vista = "home";
            $salida["description"]= $this->Metadatos_model->getDescription($vista);
            $salida["title"]= $this->Metadatos_model->getTitle($vista);
            $salida["keywords"]= $this->Metadatos_model->getKeywords($vista);
            
            // FIN
            $this->load->model("Slider_marcas");
            
            $salida["rubros"]=  $this->Almacen_model->obtener_rubros();
            /*$salida["correo"]= $this->Configuracion_model->obtener_config(1);
            $salida["movil"]= $this->Configuracion_model->obtener_config(2);
            $salida["telefono"]= $this->Configuracion_model->obtener_config(3);
            $salida["direccion"]= $this->Configuracion_model->obtener_config(4);*/
            //$salida["localidad"]= $this->Configuracion_model->obtener_config(6);
            
            $salida["horarios"]= $this->Configuracion_model->obtener_config(5);
            $salida["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $salida["modulo_destacado_abierto"]= "si";
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

            // OBTENIENDO PUBLICIDADES

            $salida["publicidades_inicio_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_inicio_vertical_izquierdo();

            $salida["publicidades_inicio_vertical_derecho"]= $this->Publicidades_model->get_publicidades_inicio_vertical_derecho();

            $salida["publicidades_inicio_horizontal"]= $this->Publicidades_model->
                get_publicidades_inicio_horizontal();
            
            $this->load->view('entrada', $salida);
	}

    public function ver_publicidad($id = 0)
    {
        $publicidad = $this->Publicidades_model->get_publicidad($id);

        if($publicidad)
        {
            $this->Publicidades_model->set_visitas_publicidad($id,($publicidad["visitas"]+1));
            redirect($publicidad["url"]);
        }
    }
        
    public function mi_perfil()
    {
            if($this->session->userdata("ingresado") == true)
            {
                $this->load->model("Cliente_model");
                $this->load->model("Vendedor_model");
                $this->load->model("Iva_model");
                $this->load->model("Provincias_model");
                
                if($this->input->post())
                {
                    $datos_actuales = $this->Cliente_model->getCliente($this->session->userdata("codigo"));
                    
                    $datos= $this->input->post();
                
                    $datos["estado"]=$datos_actuales["estado"];
                    $datos["lista_precios"]=$datos_actuales["lista_precios"];

                    if($datos["nueva_password"] != "" && $datos["nueva_password"] == $datos["nueva_password2"])
                    {
                       $datos["pass"]= $datos["nueva_password"];
                    }
                    
                    

                    $respuesta = $this->Cliente_model->actualizarClientePorPost($datos,$this->session->userdata("codigo"));
                    
                    
                    // ENVIO DE CORREO
                    $this->load->model("Configuracion_model");
                    
                    $correo_cliente= $datos["correo"];
                    $correo_server = $this->Configuracion_model->obtener_config(11);
                    $correo_server = $correo_server["descripcion"];
                    
                    $tipo_iva= $this->Iva_model->getTipoIva($datos["tipo_iva"]);
                    
                    $vendedor= $this->Vendedor_model->getVendedorMasabores($datos["vendedor"]);
                    $vendedor= $vendedor["dni"]." ".$vendedor["nombre"]." ".$vendedor["apellido"];
                    
                    $localidad= $this->Provincias_model->getLocalidad($datos["localidad"]);
                    $localidad= $localidad["localidad"];
                    
                    $mensaje_para_cliente= $this->get_mensaje_cliente_cambios_realizados_para_cliente($datos,$tipo_iva,$vendedor,$localidad);
                    
                    $this->enviar_correo_seguro($correo_server, "Masabores ", $correo_cliente, "Cambios en la cuenta", $mensaje_para_cliente);
                    
                    if($datos_actuales["correo"] != $datos["correo"])
                    {
                        $this->enviar_correo_seguro($correo_server, "Masabores", $datos_actuales["correo"], "Cambios en la cuenta", $mensaje_para_cliente);
                    }
                    
                    // FIN ENVIO DE CORREOS*/
                    
                    redirect("Welcome/mi_perfil");
                }
                else
                {
                    $this->load->model("Provincias_model");

                    // CARGANDO METADATOS
                    $vista = "Mi perfil";
                    $output["description"]= $this->Metadatos_model->getDescription($vista);
                    $output["title"]= $this->Metadatos_model->getTitle($vista);
                    $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
                    // FIN

                    
                    
                    $this->load->model("Paises_model");

                    $output["paises"]=  $this->Paises_model->getPaises();
                    $output["rubros"]=  $this->Almacen_model->obtener_rubros();


                    $output["vendedores"]=$this->Vendedor_model->getVendedores();
                    $output["tipos_iva"]=$this->Iva_model->getTiposIva();


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


                    $output["mis_datos"]=$this->Cliente_model->obtener_cliente($this->session->userdata("correo"));

                    $output["localidades_de_mi_provincia"]= $this->Provincias_model->getLocalidadesDeProvincia($output["mis_datos"]["provincia"]);
                    $output["provincias_de_mi_pais"]=$this->Provincias_model->getProvinciasPorPais($output["mis_datos"]["pais"]);

                    $this->load->view('mi_perfil', $output);
                }
            }
            else
            {
                redirect(base_url());
            }
        }
        
    public function registrarse(){
            
            if($this->session->userdata("ingresado") == false && !$this->input->post())
            {
                $this->load->helper('captcha');
                
                // THE CAPTCHA CODE
                
                $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
                $numerodeletras=5; 
                $cadena = ""; 
                
                for($i=0;$i<$numerodeletras;$i++)
                {
                    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
                }

                $vals = array(
                        'word'          => $cadena,
                        'img_path'      => './captcha/',
                        'img_url'       => base_url().'captcha/',
                        'font_path'     => './fonts/AlfaSlabOne-Regular.ttf',
                        'img_width'     => '200',
                        'img_height'    => 70,
                        'expiration'    => 7200,
                        'word_length'   => 8,
                        'font_size'     => 16,
                        'img_id'        => 'Imageid',
                        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                        // White background and border, black text and red grid
                        'colors'        => array(
                                'background' => array(255, 255, 255),
                                'border' => array(255, 255, 255),
                                'text' => array(0, 0, 0),
                                'grid' => array(255, 40, 40)
                        )
                );

                $this->session->set_userdata('captcha',$vals['word']);
                
                $cap = create_captcha($vals);
                $salida["cap"]=$cap;

                // END
                
                
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
                $datos["lista_precios"]=3;
                
                $respuesta = $this->Cliente_model->registrarClientePorPost($datos);
                
                if($respuesta)
                {
                    $resultado = $this->Cliente_model->getClienteInicioSesion($this->input->post("usuario"),$this->input->post("pass"));
                
                    
                    // ENVIO DE CORREOS
//                    $this->load->library("Correo");
                    $this->load->model("Configuracion_model");
                    
                    $correo_cliente= $resultado["correo"];
                    $correo_server = $this->Configuracion_model->obtener_config(11);
                    $correo_server = $correo_server["descripcion"];
                    $correo_empresa = $this->Configuracion_model->obtener_config(1);
                    $correo_empresa=$correo_empresa["descripcion"];
                    
                    $mensaje_para_cliente= $this->get_mensaje_cliente_registrado_para_cliente($resultado);
                    
//                    Correo::enviar_correo($mensaje_para_cliente, "Bienvenido a Masabores", $correo_server, $correo_cliente);
                    $this->enviar_correo_seguro($correo_server, "masabores administracion", $correo_cliente, "Bienvenido a Masabores", $mensaje_para_cliente);
                    
                    $mensaje_para_masabores= $this->get_mensaje_cliente_registrado_para_masabores($resultado);
                    
                    $this->enviar_correo_seguro($correo_server, "cliente", $correo_empresa, "Un nuevo cliente registrado - Masabores", $mensaje_para_masabores);
//                    Correo::enviar_correo($mensaje_para_masabores, "Un nuevo cliente registrado - Masabores", $correo_server, $correo_empresa);
                    
                    // FIN ENVIO DE CORREOS
                    
                    /*$datos = Array(
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
                        "ingresado"=>true,
                        "cod_masabores"=>$resultado["codigo_masabores"],
                    );
                    
                    $this->session->set_userdata($datos);
                    
                    redirect("Welcome");*/
                    
                    $output["correo"]= $this->Configuracion_model->obtener_config(1);
                    $output["movil"]= $this->Configuracion_model->obtener_config(2);
                    $output["telefono"]= $this->Configuracion_model->obtener_config(3);
                    $output["direccion"]= $this->Configuracion_model->obtener_config(4);
                    $output["horarios"]= $this->Configuracion_model->obtener_config(5);
                    $output["localidad"]= $this->Configuracion_model->obtener_config(6);
                    $output["footer"]= $this->partes_web->getFooter();
                    $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
                    $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
                    $output["menu_superior"]= $this->partes_web->getMenuSuperior();
                    $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            
            
                    $this->load->view("registrado",$output);
                    
                }
            }
	}
        
    public function get_mensaje_cliente_registrado_para_cliente($resultado)
    {
        $mensaje=
        "   <p><img src='".base_url()."assets/recursos/images/logo_mas.png'></p>
            <h3>Bienvenido a Masabores ".$resultado["nombre"]." ".$resultado["apellido"]."</h3>
            <p>Se ha registrado en nuestra <a href='".base_url()."'>página web</a> correctamente</p>
            <h5>Los datos de ingreso son:</h5>
            <p>Usuario: ".$resultado["usuario"]."</p>
            <p>Contraseña: ".$resultado["pass"]."</p>
            <p><a href='".base_url()."index.php/welcome/activar_usuario/".$resultado["usuario"]."'>Active su cuenta haciendo click aquí</a></p>
        
        ";
        return $mensaje;
    }
    
    public function get_mensaje_cliente_cambios_realizados_para_cliente($resultado,$tipo_iva,$vendedor,$localidad)
    {
        $mensaje=
        "   <p><img src='".base_url()."assets/recursos/images/logo_mas.png'></p>
            <h3>Cambios en la cuenta </h3>
            <p>Se ha actualizado los datos en la <a href='".base_url()."'>página web</a> correctamente</p>
            <h5>Los datos actuales de la cuenta son:</h5>
            <p>Correo: ".$resultado["correo"]."</p>
            <p>Usuario: ".$resultado["usuario"]."</p>
            <p>Contraseña: ".$resultado["pass"]."</p>
            <p>Nombre: ".$resultado["nombre"]."</p>
            <p>Apellido: ".$resultado["apellido"]."</p>
            <p>Razon Social: ".$resultado["razon_social"]."</p>
            <p>Nombre Comercial: ".$resultado["nombre_comercial"]."</p>
            <p>CUIL - DNI: ".$resultado["dni_cuil"]."</p>
            <p>Direccion: ".$resultado["direccion"]."</p>
            <p>Codigo Postal: ".$resultado["cod_postal"]."</p>
            <p>Celular: ".$resultado["celular"]."</p>
            <p>Fijo: ".$resultado["fijo"]."</p>
            <p>Tipo de Iva: ".$tipo_iva."</p>
            <p>Vendedor: ".$vendedor."</p>
            <p>Localidad: ".$localidad."</p>
            <p>Codigo Masabores: ".$resultado["codigo_masabores"]."</p>
            
            
            <p><a href='".base_url()."welcome'>Masabores</a></p>
        
        ";
        return $mensaje;
    }
    
    public function get_mensaje_cliente_registrado_para_masabores($resultado)
    {
        $mensaje=
        "   <p><img src='".base_url()."assets/recursos/images/logo_mas.png'></p>
            <h3>".$resultado["nombre"]." ".$resultado["apellido"]." nuevo cliente!</h3>
            <p>Se ha registrado en nuestra <a href='".base_url()."'>página web</a> correctamente</p>
            <h5>Los datos principales ingresados son:</h5>
            <p>N° de indentificacion en el sistema: ".$resultado["codigo"]."</p>
            <p>Usuario: ".$resultado["usuario"]."</p>
            <p>Contraseña: ".$resultado["pass"]."</p>
            <p>Correo: ".$resultado["correo"]."</p>
            <p>Celular: ".$resultado["celular"]."</p>
            <p><a href='".base_url()."'>Inicie sesion</a></p>
        ";
        return $mensaje;
    }
    
    public function activar_usuario($user = null)
    {
        $this->load->model("Cliente_model");
        
        $this->Cliente_model->activar_cliente($user);
        
        redirect(base_url());
    }
    public function acceso() {
            $output['salida_error']="";
            $this->load->view('back/loguin/ingreso', $output);
        }
        
    public function recuperar_password() {
                        
            if($this->input->post())
            {
                $this->load->model("Usuario_model");
                $correo = $this->input->post("correo");
                
                $this->load->library("Correo");
                
                if(Correo::validar_correo($correo))
                {
                
                    $usuario= $this->Usuario_model->getUsuarioPorCorreo($correo);

                    if($usuario)
                    {
                        $this->load->model("Configuracion_model");
                        $nuestro_correo= $this->Configuracion_model->obtener_config(1);
                        $nuestro_correo= $nuestro_correo["descripcion"];

                        $mail = "Los datos de su cuenta son los siguientes:<br/>Usuario:".$usuario["usuario"]."<br/>/>Contraseña:".$usuario["pass"]."<br/>";
                        $titulo = "Datos de acceso al Sistema";
    //                    $headers = "MIME-Version: 1.0\r\n"; 
    //                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    //                    $headers .= "From: Masabores < $nuestro_correo >\r\n";
                        $bool = $this->enviar_correo_seguro($nuestro_correo, "administracion", $correo, $titulo, $mail);
    //                    $bool = mail($correo,$titulo,$mail,$headers);

                        if($bool){
                            $output['salida_error']="Los datos de su cuenta han sido enviados a su correo";
                            $this->load->view('back/loguin/ingreso', $output);
                        }else{
                            $output['salida_error']="Ha ocurrido un error al intentar mandar los datos";
                            $this->load->view('back/loguin/recuperar_contrasenia', $output);
                        }
                    }
                    else
                    {
                        $output['salida_error']="No se ha encontrado ninguna cuenta con el correo ingresado";
                        $this->load->view('back/loguin/recuperar_contrasenia', $output);
                    }
                }
                else
                {
                    $output['salida_error']="Correo no valido";
                    $this->load->view('back/loguin/recuperar_contrasenia', $output);
                }
            }
            else
            {
                $output['salida_error']="";
                $this->load->view('back/loguin/recuperar_contrasenia', $output);
            }
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
            if($this->session->userdata("ingresado") == true)
            {
                $output['productos']="";
                if($this->input->post("busqueda")!=="" && $this->input->post("busqueda")!==null){
                    $output['productos']=  base_url()."index.php/welcome/get_listado_productos_by_busqueda/".$this->input->post("busqueda");
                }else{
                    $output['productos']=  base_url()."index.php/welcome/get_listado_productos/";
                }
                
                $this->load->model("Configuracion_model");
                $output["minimo_de_entrega"]= $this->Configuracion_model->obtener_config(10);
                
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

                $vista = "home";
                $output["description"]= $this->Metadatos_model->getDescription($vista);
                $output["title"]= $this->Metadatos_model->getTitle($vista);
                $output["keywords"]= $this->Metadatos_model->getKeywords($vista);

                $this->load->view('mostrar_productos', $output);
            }
            else
            {
                redirect("Welcome");
            }
        }
        
        public function productos() {
            
            $this->load->model("Configuracion_model");
            $output["minimo_de_entrega"]= $this->Configuracion_model->obtener_config(10);
            
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
            
             // OBTENIENDO PUBLICIDADES
            $cod_sector_destacado=$this->Almacen_model->obtener_sector_activacion_destacados(4);
            $output["modulo_destacado_abierto"]= $cod_sector_destacado["mostrar_destacado"];
            $output["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            $output["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $output["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $output["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $output["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $output["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $output["destacado_5"]= $this->Almacen_model->productos_destacados(5);

            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_categorias_vertical_izquierdo();

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_categorias_vertical_derecho();

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_categorias_horizontal();

            $this->load->view('grupos', $output);

        }
        
        public function zonas_de_cobertura(){
           
            $this->load->model("Zonas_cobertura_model");
            $this->load->model("Configuracion_model");
            
            $output["zonas_coberturas"]=  $this->Zonas_cobertura_model->getZonasCoberturas();
            $output["minimo_de_entrega"]= $this->Configuracion_model->obtener_config(10);
            
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
            
             // OBTENIENDO PUBLICIDADES
            $cod_sector_destacado=$this->Almacen_model->obtener_sector_activacion_destacados(3);
            $output["modulo_destacado_abierto"]= $cod_sector_destacado["mostrar_destacado"];
            $output["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            $output["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $output["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $output["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $output["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $output["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $output["destacado_5"]= $this->Almacen_model->productos_destacados(5);

            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_entregas_vertical_izquierdo();

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_entregas_vertical_derecho();

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_entregas_horizontal();

            $this->load->view('zonas_de_cobertura', $output);

        }
        
        public function nosotros() {
            
            $this->load->model("Nosotros_model");
            
            // CARGANDO METADATOS
            $vista = "quienes somos";
            $output["description"]= $this->Metadatos_model->getDescription($vista);
            $output["title"]= $this->Metadatos_model->getTitle($vista);
            $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
            // FIN
            
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

             // OBTENIENDO PUBLICIDADES
            $cod_sector_destacado=$this->Almacen_model->obtener_sector_activacion_destacados(2);
            $output["modulo_destacado_abierto"]= $cod_sector_destacado["mostrar_destacado"];
            $output["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            $output["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $output["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $output["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $output["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $output["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $output["destacado_5"]= $this->Almacen_model->productos_destacados(5);

            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_nosotros_vertical_izquierdo();

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_nosotros_vertical_derecho();

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_nosotros_horizontal();

            $this->load->view('nosotros', $output);
        }

        public function videos() {
            
            $this->load->model("Videos_model");
            
            // CARGANDO METADATOS
            $vista = "videos";
            $output["description"]= $this->Metadatos_model->getDescription($vista);
            $output["title"]= $this->Metadatos_model->getTitle($vista);
            $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
            // FIN
            
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

            $output["videos"]= $this->Videos_model->get_videos_visibles();
            
             // OBTENIENDO PUBLICIDADES
            $cod_sector_destacado=$this->Almacen_model->obtener_sector_activacion_destacados(7);
            $output["modulo_destacado_abierto"]= $cod_sector_destacado["mostrar_destacado"];
            $output["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            $output["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $output["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $output["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $output["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $output["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $output["destacado_5"]= $this->Almacen_model->productos_destacados(5);

             // OBTENIENDO PUBLICIDADES

            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_videos_vertical_izquierdo();

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_videos_vertical_derecho();

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_videos_horizontal();

            $this->load->view('videos', $output);
        }
        
        public function contacto() {
            
            
            // CARGANDO METADATOS
            $vista = "contacto";
            $output["description"]= $this->Metadatos_model->getDescription($vista);
            $output["title"]= $this->Metadatos_model->getTitle($vista);
            $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
            // FIN
            
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
            
             // OBTENIENDO PUBLICIDADES
            $cod_sector_destacado=$this->Almacen_model->obtener_sector_activacion_destacados(6);
            $output["modulo_destacado_abierto"]= $cod_sector_destacado["mostrar_destacado"];
            $output["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            $output["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $output["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $output["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $output["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $output["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $output["destacado_5"]= $this->Almacen_model->productos_destacados(5);
            
            $output["mensaje_error"]="";

            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_contacto_vertical_izquierdo();

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_contacto_vertical_derecho();

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_contacto_horizontal();


            $this->load->view('contacto', $output);

        }
        
        public function enviar_mensaje_contacto()
        {
            if($this->input->post())
            {
                $this->load->model("Mensaje_model");
                
                $respuesta = $this->Mensaje_model->agregarMensaje($this->input->post("nombre"),$this->input->post("correo"),$this->input->post("telefono"),$this->input->post("mensaje"));
            
                // CARGANDO METADATOS
                $vista = "contacto";
                $output["description"]= $this->Metadatos_model->getDescription($vista);
                $output["title"]= $this->Metadatos_model->getTitle($vista);
                $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
                // FIN

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
            $this->load->model("Configuracion_model");
            $output["minimo_de_entrega"]= $this->Configuracion_model->obtener_config(10);
            
            // CARGANDO METADATOS
            $vista = "productos";
            $output["description"]= $this->Metadatos_model->getDescription($vista);
            $output["title"]= $this->Metadatos_model->getTitle($vista);
            $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
            
            // FIN
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
            
             // OBTENIENDO PUBLICIDADES
            $cod_sector_destacado=$this->Almacen_model->obtener_sector_activacion_destacados(5);
            $output["modulo_destacado_abierto"]= $cod_sector_destacado["mostrar_destacado"];
            $output["secciones_activas"]= $this->Home_seccion_model->getHomeSecciones();
            $output["tabla_destacado"]= $this->Almacen_model->tabla_destacados();
            $output["destacado_1"]= $this->Almacen_model->productos_destacados(1);
            $output["destacado_2"]= $this->Almacen_model->productos_destacados(2);
            $output["destacado_3"]= $this->Almacen_model->productos_destacados(3);
            $output["destacado_4"]= $this->Almacen_model->productos_destacados(4);
            $output["destacado_5"]= $this->Almacen_model->productos_destacados(5);
            
            $output["modal_ingreso"]= $this->partes_web->getModalIngreso();
            $output["menu_principal"]= $this->partes_web->getMenuPrincipal();
            $output["menu_superior"]= $this->partes_web->getMenuSuperior();
            $output["parte_buscador"]= $this->partes_web->getParteBuscador();
            $output["footer"]= $this->partes_web->getFooter();
            
            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_productos_vertical_izquierdo();

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_productos_vertical_derecho();

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_productos_horizontal();
            
            $this->load->view('mostrar_productos', $output);

        }
        
        public function busqueda_rubro($rubro) {
            $this->load->model("Configuracion_model");
            $output["minimo_de_entrega"]= $this->Configuracion_model->obtener_config(10);
            
            $vista = "productos";
            $output["description"]= $this->Metadatos_model->getDescription($vista);
            $output["title"]= $this->Metadatos_model->getTitle($vista);
            $output["keywords"]= $this->Metadatos_model->getKeywords($vista);
            
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
            $respuesta = $this->Configuracion_model->obtener_config(12);
            $respuesta= $respuesta["descripcion"];
            
            $output["mostrar_precio"] = false;
            
            if($respuesta == "si" && $this->session->userdata("ingresado") ==  TRUE)
            {
                $output["mostrar_precio"] = true;
            }

            $output["publicidades_vertical_izquierdo"]= $this->Publicidades_model->get_publicidades_rubro_vertical_izquierdo($rubro);

            $output["publicidades_vertical_derecho"]= $this->Publicidades_model->get_publicidades_rubro_vertical_derecho($rubro);

            $output["publicidades_horizontal"]= $this->Publicidades_model->get_publicidades_rubro_horizontal($rubro);

            $this->load->view('mostrar_productos', $output);
        }
        
        function get_listado_productos_by_rubro($rubro) {
            echo json_encode($this->Almacen_model->todos_productos_by_rubro($rubro));
	}
        
        function get_listado_productos_by_busqueda($busqueda) {
            $palabras = Array();
            $cant_palabras = 0;
            $palabras[0]="";
            $aux_busqueda = "";
            
            $indice =0;
            $palabras[]="";
            
            while($indice < strlen($busqueda))
            {
                $letra = substr($busqueda, $indice, 1);
                
                if($letra != "%")
                {
                    $palabras[$cant_palabras].=$letra;
                }
                else
                {
                   $indice+=2;
                   $palabras[]="";
                   $cant_palabras++;
                }
                
                $indice++;
            }
            
            echo json_encode($this->Almacen_model->todos_productos($palabras));
	}
        
        function get_listado_productos() {
            echo json_encode($this->Almacen_model->todos_productos(""));
	}
        
        function prueba()
        {
            var_dump($this->Almacen_model->obtener_lista_precios());
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
            $codigo_masabores = "";
            $precio_reparto = "";

            $total=(float)$this->input->post("total");

            if($this->input->post("tipo_de_retiro") == "reparto")
            {
                if($total < 1000)
                {
                   $zona = $this->input->post("localidad_cargo");
                
                    $this->load->model("Zonas_cobertura_model");
                    $zona = $this->Zonas_cobertura_model->getZonaCoberturaCheckoutPedido($zona);
                    $codigo_masabores= $zona["codigo_entrega"];
                    $precio_reparto= $zona["costo"]; 
                }
                else
                {
                    $zona = 0;
                
                    $codigo_masabores= 0;
                    $precio_reparto= 0;
                }
            }
            
            $cliente=$this->input->post("cliente");
            $cod_direccion=$this->input->post("cod_direccion");
            $localidad_entrega=$this->input->post("localidad");
            $cod_local_retiro=$this->input->post("cod_local_retiro");
            
            
            if($codigo_masabores != "")
            {
                $total+= (float)$precio_reparto;
            }
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

            $registrado = $this->Pedido_model->insertarPedido($pedido);
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
            
            if($codigo_masabores != "")
            {
                $this->Pedido_model->insertarPedidoDetalle($consulta, $codigo_masabores, $precio_reparto, 1);
            }

            //$this->enviar_pedido($this->session->userdata('correo'), $this->session->userdata('nombre'), $consulta, $fecha);

            $output["correo"]= $this->Configuracion_model->obtener_config(1);
            $output["movil"]= $this->Configuracion_model->obtener_config(2);
            $output["telefono"]= $this->Configuracion_model->obtener_config(3);
            $output["direccion"]= $this->Configuracion_model->obtener_config(4);
            $output["horarios"]= $this->Configuracion_model->obtener_config(5);
            $output["localidad"]= $this->Configuracion_model->obtener_config(6);
            $output["footer"]= $this->partes_web->getFooter();
            
            if($registrado)
            {
                $this->enviar_correo_pedido_registrado_cliente($pedido->numero,$pedido->cliente,$total);
                $this->enviar_correo_pedido_registrado_empresa($pedido->numero,$pedido->cliente,$total);
            }
            
            $this->load->view('finalizar_pedido', $output);
            
            
            
	}
        
        private function enviar_correo_pedido_registrado_cliente($numero_pedido,$cliente,$total)
        {
            $detalle_pedido = $this->Pedido_model->get_detalle_pedido($numero_pedido);
            
            // ENVIO DE CORREOS
//            $this->load->library("Correo");
            $this->load->model("Configuracion_model");
            $this->load->model("Cliente_model");
                    
//            $correo_cliente= $resultado["correo"];
            $correo_server = $this->Configuracion_model->obtener_config(11);
            $correo_server = $correo_server["descripcion"];
            $correo_empresa = $this->Configuracion_model->obtener_config(1);
            $correo_empresa=$correo_empresa["descripcion"];
            $cliente = $this->Cliente_model->getCliente($cliente);
            $correo_cliente= $cliente["correo"];
                    
            $mensaje =
            "
                <p><img src='".base_url()."assets/recursos/images/logo_mas.png'></p>
                <h3>Ha registrado un pedido en el sistema</h3>
                <p>Numero de pedido N° ".$numero_pedido."</p>
                <p>Total: ".$total."</p>
                <p>Detalle del pedido registrado</p>
                <br/>
                <table>
                    <thead>
                        <tr>
                            <th>Cod. Producto</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descuento</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
            ";
            foreach($detalle_pedido as $value)
            {
                $precio = (float)$value["precio"];
                $cantidad = (float)$value["cantidad"];
                $descuento = (float)$value["descuento"];
                $subtotal = ($precio*$cantidad)-(($precio * $cantidad) * ($descuento / 100));
                $mensaje.=
                "
                    <tr>
                        <td>".$value["producto"]."</td>
                        <td>".$value["descripcion"]."</td>
                        <td>$".$value["precio"]."</td>
                        <td>".$value["cantidad"]."</td>
                        <td>".$value["descuento"]."</td>
                        <td>".$subtotal."</td>
                    </tr>
                ";
            }
            
            $mensaje.="
                    </tbody>
                </table>";
            $this->enviar_correo_seguro($correo_server, $cliente["nombre"], $correo_cliente, "Pedido registrado - Masabores", $mensaje);
//            Correo::enviar_correo($mensaje, "Pedido registrado - Masabores", $correo_server, $correo_cliente);
        }
        
        private function enviar_correo_pedido_registrado_empresa($numero_pedido,$cliente,$total)
        {
            $detalle_pedido = $this->Pedido_model->get_detalle_pedido($numero_pedido);
            
            // ENVIO DE CORREOS
//            $this->load->library("Correo");
            $this->load->model("Configuracion_model");
            $this->load->model("Cliente_model");
                    
//            $correo_cliente= $resultado["correo"];
            $correo_server = $this->Configuracion_model->obtener_config(11);
            $correo_server = $correo_server["descripcion"];
            $correo_empresa = $this->Configuracion_model->obtener_config(1);
            $correo_empresa=$correo_empresa["descripcion"];
            $cliente = $this->Cliente_model->getCliente($cliente);
            $correo_cliente= $cliente["correo"];
                    
            $mensaje =
            "
                <p><img src='".base_url()."assets/recursos/images/logo_mas.png'></p>
                <h3>Se ha registrado un nuevo pedido en el sistema</h3>
                <p>Numero de pedido N° ".$numero_pedido."</p>
                 <p>Total: ".$total."</p>
                <p>Cliente: ".$cliente["nombre"]." ".$cliente["apellido"]."</p>
                <p>Correo del cliente: ".$correo_cliente."</p>
                <p>Detalle del pedido registrado</p>
                <br/>
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descuento</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            ";
            foreach($detalle_pedido as $value)
            {
                $precio = (float)$value["precio"];
                $cantidad = (float)$value["cantidad"];
                $descuento = (float)$value["descuento"];
                $subtotal = ($precio*$cantidad)-(($precio * $cantidad) * ($descuento / 100));
                $mensaje.=
                "
                    <tr>
                        <td>".$value["producto"]."</td>
                        <td>$".$value["precio"]."</td>
                        <td>".$value["cantidad"]."</td>
                        <td>".$value["descuento"]."</td>
                        <td>".$subtotal."</td>
                    </tr>
                ";
            }
            $this->enviar_correo_seguro($correo_server, "administracion", $correo_empresa, "Pedido registrado - Masabores", $mensaje);     
//            Correo::enviar_correo($mensaje, "Pedido registrado - Masabores", $correo_server, $correo_empresa);
        }
        
        public function cerrar_sesion()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }
        
        private function ejecutar_checkout($nuevo_cliente, $error_usuario, $error_pass) {
            $this->load->model("Zonas_cobertura_model");
            
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
            $salida["minimo_de_entrega"]= $this->Configuracion_model->obtener_config(10);
            
            $salida["zonas_de_cobertura"]= $this->Zonas_cobertura_model->getZonasCoberturasCheckoutPedido();
            $salida["formas_pago"]= $this->Formas_pago_model->getListado();
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
	
//	private function procesar_correo($from, $to, $subject, $mensaje){
//            $envio;
//
//            //configuracion para gmail
////            $configCorreo = array(
////                    'protocol' => 'smtp',
////                    'smtp_host' => 'mail.todopositivo.net',
////                    'smtp_port' => 25,
////                    'smtp_user' => 'presupuestos@todopositivo.net',
////                    'smtp_pass' => 'Presu1128',
////                    'mailtype' => 'html',
////                    'charset' => 'utf-8',
////                    'newline' => "\r\n"
////            );
//            
//            $config['protocol'] = 'sendmail';
//            $config['mailpath'] = '/usr/sbin/sendmail';
//            $config['charset'] = 'iso-8859-1';
//            $config['mailtype'] = 'html';
//            $config['wordwrap'] = TRUE;
////
//            $this->email->initialize($config);
//
////            $this->email->initialize($configCorreo);
//            $this->email->from('presupuestos@todopositivo.net', 'presupuestos@todopositivo.net');
//            $this->email->to($to);
//            $this->email->subject($subject);
//            $this->email->message($mensaje);
//            $envio=$this->email->send();
//            return $envio;
//	}
	
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
        
        private function enviar_correo_seguro($correo_origen, $nombre, $correo_destino, $titulo, $mensaje){
//            $mail = new Mailer();
//            
//            // Datos de la cuenta de correo utilizada para enviar vía SMTP
//            $smtpHost = "mail.masabores.com";  // Dominio alternativo brindado en el email de alta 
//            $smtpUsuario = "administracion@masabores.com";  // Mi cuenta de correo
//            $smtpClave = "Admin03548427004";  // Mi contraseña
//
////            $mail->IsSMTP();
//            $mail->SMTPAuth = true;
//            $mail->Port = 587; 
////            $mail->IsHTML(true); 
//            $mail->CharSet = "utf-8";
//
//            // VALORES A MODIFICAR //
//            $mail->Host = $smtpHost; 
//            $mail->Username = $smtpUsuario; 
//            $mail->Password = $smtpClave;
//
//            $mail->From = $correo_origen; // Email desde donde envío el correo.
//            $mail->FromName = $nombre;
//            $mail->addAddress($correo_destino, "John Doe"); // Esta es la dirección a donde enviamos los datos del formulario
//
//            $mail->Subject = $titulo; // Este es el titulo del email.
//            $mensajeHtml = nl2br($mensaje);
//            $mail->Body = "{$mensajeHtml}"; 
//            // FIN - VALORES A MODIFICAR //
//
//            $estadoEnvio = $mail->Send(); 
            
//            $this->load->library('Email'); // Note: no $config param needed
            $this->email->from($correo_origen, $nombre);
            $this->email->to($correo_destino);
            $this->email->subject($titulo);
            $this->email->set_mailtype("html");
            $this->email->message($mensaje);
            
            $estadoEnvio=$this->email->send();
            
            return $estadoEnvio;
        }
        
        
}
