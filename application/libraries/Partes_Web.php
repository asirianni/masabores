<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partes_Web
 *
 * @author mario
 */
class Partes_Web 
{
    //partes web
    private $css_files;
    private $js_files;
    private $modal_ingreso;
    private $menu_principal;
    private $menu_superior;
    private $parte_buscador;
    private $siganos_en;
    private $footer;
    
    // CODEINGNITER
    public $ci;
    
    // DATOS EMPRESA
    private $dato_correo;
    private $dato_movil;
    private $dato_telefono;
    private $dato_direccion;
    private $dato_localidad;
    private $dato_twitter;
    private $dato_facebook;
    private $dato_google;
    
    function getDato_correo() {
        return $this->dato_correo;
    }

    function getDato_movil() {
        return $this->dato_movil;
    }

    function getDato_telefono() {
        return $this->dato_telefono;
    }

    function getDato_direccion() {
        return $this->dato_direccion;
    }

    function getDato_localidad() {
        return $this->dato_localidad;
    }

    function setDato_correo($dato_correo) {
        $this->dato_correo = $dato_correo;
    }

    function setDato_movil($dato_movil) {
        $this->dato_movil = $dato_movil;
    }

    function setDato_telefono($dato_telefono) {
        $this->dato_telefono = $dato_telefono;
    }

    function setDato_direccion($dato_direccion) {
        $this->dato_direccion = $dato_direccion;
    }

    function setDato_localidad($dato_localidad) {
        $this->dato_localidad = $dato_localidad;
    }
    
    function setDato_twitter($dato_twitter) {
        $this->dato_twitter = $dato_twitter;
    }
    
    function setDato_facebook($dato_facebook) {
        $this->dato_facebook = $dato_facebook;
    }
    
    function setDato_google($dato_google) {
        $this->dato_google = $dato_google;
    }

        
    public function __construct() {
        
        $this->ci = &get_instance();
        $this->ci->load->library("session");
        
        $this->ci->load->model("Configuracion_model");
        $datos_correo= $this->ci->Configuracion_model->obtener_config(1);
        $this->setDato_correo($datos_correo["descripcion"]);
        $datos_movil= $this->ci->Configuracion_model->obtener_config(2);
        $this->setDato_movil($datos_movil["descripcion"]);
        $datos_telefono= $this->ci->Configuracion_model->obtener_config(3);
        $this->setDato_telefono($datos_telefono["descripcion"]);
        $datos_direccion= $this->ci->Configuracion_model->obtener_config(4);
        $this->setDato_direccion($datos_direccion["descripcion"]);
        $datos_localidad= $this->ci->Configuracion_model->obtener_config(6);
        $this->setDato_localidad($datos_localidad["descripcion"]);
        
        $this->seteoCssFile();
        $this->seteoModalIngreso();
        $this->seteoMenuPrincipal();
        $this->seteoMenuSuperior();
        $this->seteoParteBuscador();
        $this->seteoSiganosEn();
        $this->seteoFooter();
        
        
        
    }
    
    public function getCssFiles()
    {
        return $this->css_files;
    }
    
    public function getJsFiles()
    {
        return $this->js_files;
    }
    
    public function getModalIngreso()
    {
        return $this->modal_ingreso;
    }
    
    public function getMenuPrincipal()
    {
        return $this->menu_principal;
    }
    
    public function getMenuSuperior()
    {
        return $this->menu_superior;
    }
    
    public function getParteBuscador()
    {
        return $this->parte_buscador;
    }
    
    public function getFooter()
    {
        return $this->footer;
    }
    
    public function getSiganosEn()
    {
        return $this->siganos_en;
    }
    
    private function seteoCssFile()
    {
        $this->css_files=
        "<!-- Custom Theme files -->
        <link href=".base_url()."recursos/css/bootstrap.css rel=stylesheet type=text/css media=all />
        <link href=".base_url()."recursos/css/style.css rel=stylesheet type=text/css media=all /> 
        <link href=".base_url()."recursos/css/menu.css rel=stylesheet type=text/css media=all /> <!-- menu style --> 
        <link href=".base_url()."recursos/css/ken-burns.css rel=stylesheet type=text/css media=all /> <!-- banner slider --> 
        <link href=".base_url()."recursos/css/animate.min.css rel=stylesheet type=text/css media=all /> 
        <link href=".base_url()."recursos/css/owl.carousel.css rel=stylesheet type=text/css media=all> <!-- carousel slider --> 
        <link rel=icon type=image/png href=".base_url()."recursos/images/t_.ico/>
        <!-- //Custom Theme files -->
        <!-- font-awesome icons -->
        <link href=".base_url()."recursos/css/font-awesome.css rel=stylesheet> 
        <!-- CSS MARIO -->
        <link href=".base_url()."recursos/css/agregado-estilos.css rel=stylesheet> ";
    }
    
    private function seteoModalIngreso()
    {
        $this->modal_ingreso=
        "<div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h4 class='modal-title' id='myModalLabel'><i class='fa fa-user' aria-hidden='true'></i> INGRESO DE USUARIO</h4>
                    </div>
                    <div class='modal-body modal-body-sub'> 
                        <h5>Ingrese sus datos si los posee</h5>
                        <div class='form-group'>
                            <input type='text' class='form-control' placeholder='usuario' id='usuario_ingresar'>
                        </div>
                        <div class='form-group'>
                            <input type='password' class='form-control' placeholder='pass' id='password_ingresar'  >
                        </div>
                        <div class='form-group'>
                            <button type='button'  class='btn btn-info form-control' id='btn_iniciar_sesion' onClick='iniciarSesionCliente()'>Ingresar</button>
                        </div>
                        <div class='form-group'>
                            <span style='color: #f00;' id='mensaje_inicio_sesion_usuario'></span>
                        </div>
                        <p><a href='".base_url()."index.php/welcome/registrarse'>Registrarse</a></p>
                        <p><a href='".base_url()."index.php/welcome/recuperar_password'>Recuperar datos de mi cuenta</a></p>
                    </div>
                </div>
            </div>";
    }
    
    private function seteoMenuPrincipal()
    {
        $this->menu_principal=
        "<nav class='navbar navbar-default navbar-verde'>
                              <div class='container-fluid'>
                                <div class='navbar-header'>
                                  <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
                                    <span class='sr-only'>Toggle navigation</span>
                                    <span class='icon-bar'></span>
                                    <span class='icon-bar'></span>
                                    <span class='icon-bar'></span>
                                  </button>
                                    <a class='navbar-brand' href='#'><span class='visible-xs'>Menu</span></a>
                                </div>
                                <div id='navbar' class='navbar-collapse collapse'>
                                  <ul class='nav navbar-nav'>
                                    <!--<li class='active'><a href='#'>Home</a></li>
                                    <li><a href='#'>About</a></li>
                                    <li><a href='#'>Contact</a></li>
                                    <li class='dropdown'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Dropdown <span class='caret'></span></a>
                                      <ul class='dropdown-menu'>
                                        <li><a href='#'>Action</a></li>
                                        <li><a href='#'>Another action</a></li>
                                        <li><a href='#'>Something else here</a></li>
                                        <li role='separator' class='divider'></li>
                                        <li class='dropdown-header'>Nav header</li>
                                        <li><a href='#'>Separated link</a></li>
                                        <li><a href='#'>One more separated link</a></li>
                                      </ul>
                                    </li>-->
                                  </ul>
                                  <ul class='nav navbar-nav navbar-right'>
                                    <li class='active'><a href='".base_url()."'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Principal</a></li>
                                    <li><a href='".base_url()."index.php/welcome/nosotros'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Nosotros</a></li>
                                    <li><a href='".base_url()."index.php/welcome/zonas_de_cobertura'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Entregas</a></li>
                                    <li><a href='".base_url()."index.php/welcome/productos'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Categorias</a></li>
                                    <li><a href='".base_url()."index.php/welcome/lista_de_precios'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Todos</a></li>
                                    <li><a href='".base_url()."index.php/welcome/contacto'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Contacto</a></li>
                                  </ul>
                                </div><!--/.nav-collapse -->
                              </div><!--/.container-fluid -->
                            </nav>";
    }
    
    private function seteoMenuSuperior()
    {
//        $this->ci->load->model("Configuracion_model");
        
        $datos_telefono= $this->ci->Configuracion_model->obtener_config(3);
//        $this->setDato_telefono($datos_telefono["descripcion"]);
        
        
        $this->menu_superior=
        "<div class='w3ls-header-left'>";
            if($this->ci->session->userdata('ingresado'))
            {
                $this->menu_superior.="<p><a href='#'>PARA ACTIVAR SU USUARIO LLAME AL - ".strtoupper($this->dato_telefono)."</a></p>";
//                $this->menu_superior.="<p><a href='#'>ESTA VIENDO LISTA DE PRECIOS: ".$this->ci->session->userdata('lista_precios')."</a></p>";
            }
            else
            {
                $this->menu_superior.="<p><a href='#'>PARA ACTIVAR SU USUARIO LLAME AL - ".strtoupper($this->dato_telefono)."</a></p>";
            }
	$this->menu_superior.="</div>
                        
			<div class='w3ls-header-right'>
				<ul>";
                                if($this->ci->session->userdata('ingresado')){
                                                $this->menu_superior.="<span style='color:#fff;font-size: 20px;font-weight: bold;'>Bienvenido ".$this->ci->session->userdata('nombre')."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                                            }
                                    $this->menu_superior.="<li class='dropdown head-dpdn'>";
                                            
                                            $this->menu_superior.="<a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user' aria-hidden='true'></i> Mi Cuenta<span class='caret'></span></a>
                                            <ul class='dropdown-menu'>";
                                                    if($this->ci->session->userdata('ingresado')){
                                                            $this->menu_superior.="<li><a href='#'>Bienvenido ".$this->ci->session->userdata('nombre')."</a></li>
                                                                                   
                                                                                    <li><a href='".base_url()."index.php/welcome/cerrar_sesion'>Salida</a></li>";
                                                        }else{
                                                            $this->menu_superior.="<li><a href='#' onclick='iniciar_session();' >Ingreso</a></li>
                                                                                   <li><a href='".base_url()."index.php/welcome/registrarse' >Registrarse</a></li>";
                                                        }
                                                     
                     $this->menu_superior.="</ul> 
                                    </li> 
				</ul>
			</div>
			<div class='clearfix'> </div>";
    }
    
    private function seteoParteBuscador()
    {
        $this->parte_buscador=
        "<div class='header-two'><!-- header-two -->
			<div class='container'>
				<div class='header-logo'>
                                    <h1 class='hidden-xs'><a href='".base_url()."'><span><img src='".base_url()."assets/recursos/images/logo_mas.png' alt='img'></span></a></h1>
                                    <h1 class='visible-xs'><a href='".base_url()."'><span><img src='".base_url()."assets/recursos/images/logo_mas-movil.png' alt='img'></span></a></h1>
				</div>	
				<div class='header-search'>";
                                    
                                        $attributes = array('id' => 'busqueda_id', 'name' => 'form_buscar');
                                        $this->parte_buscador.=form_open('welcome/buscar', $attributes);
                                    
                                            $this->parte_buscador.="<input type='search' name='busqueda' placeholder='Buscar producto...'  >
                                            <button type='submit' class='btn btn-default' aria-label='Left Align'>
                                                    <i class='fa fa-search' aria-hidden='true'> </i>
                                            </button>";
                                        $this->parte_buscador.=form_close();
    $this->parte_buscador.="</div>
				<div class='header-cart'> 
<!--					<div class='my-account'>
						<a href='contact.html'><i class='fa fa-map-marker' aria-hidden='true'></i> CONTACTO</a>						
					</div>-->
					<div class='cart'>
                                            <a href='#' onclick='mostrarModal();'>
                                                <h3> 
                                                    <div class='total'>
                                                         <!-- <span class='simpleCart_total'></span>	(<span id='simpleCart_quantity' class='simpleCart_quantity'></span> )-->
                                                       <i class='fa fa-cart-arrow-down' aria-hidden='true'></i> $ <span id='total_final_menu'>0</span>
                                                    </div>
                                                </h3>
                                            </a>
<!--                                            <form action='#' method='post' class='last'> 
                                                    <a href='#' onclick='mostrarModal();'></a>
                                                    <button class='w3view-cart' type='submit' name='submit' value=''>

                                                        <i class='fa fa-cart-arrow-down' aria-hidden='true'></i>
                                                    </button>
                                            </form>-->
                                            
                                             
					</div>
					<div class='clearfix'> </div> 
				</div> 
				<div class='clearfix'> </div> 
				
			</div>		
		</div><!-- //header-two -->";
    }
    
    private function seteoSiganosEn()
    {
        $datos_facebook= $this->ci->Configuracion_model->obtener_config(7);
        $this->setDato_facebook($datos_facebook["descripcion"]);
        
        $datos_google= $this->ci->Configuracion_model->obtener_config(8);
        $this->setDato_google($datos_google["descripcion"]);
        
        $datos_localidad= $this->ci->Configuracion_model->obtener_config(9);
        $this->setDato_twitter($datos_localidad["descripcion"]);
        
        $this->siganos_en=
        "<!-- subscribe -->
	<div class='subscribe'> 
		<div class='container'>
			<div class='col-md-6 social-icons w3-agile-icons'>
				<h4>SIGANOS EN </h4>  
				<ul>
					<li><a href='".strtoupper($this->dato_facebook)."' class='fa fa-facebook icon facebook'> </a></li>
					<li><a href='".strtoupper($this->dato_twitter)."' class='fa fa-twitter icon twitter'> </a></li>
					<li><a href='".strtoupper($this->dato_google)."' class='fa fa-google-plus icon googleplus'> </a></li>
<!--					<li><a href='#' class='fa fa-dribbble icon dribbble'> </a></li>
					<li><a href='#' class='fa fa-rss icon rss'> </a></li> -->
				</ul> 
<!--				<ul class='apps'> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href='#' class='fa fa-apple'></a></li>
					<li><a href='#' class='fa fa-windows'></a></li>
					<li><a href='#' class='fa fa-android'></a></li>
				</ul> -->
			</div> 
			<div class='col-md-6 subscribe-right'>
<!--				<h4>Sign up for email and get 25%off!</h4>  
				<form action='#' method='post'> 
					<input type='text' name='email' placeholder='Enter your Email...' required=''>
					<input type='submit' value='Subscribe'>
				</form>
				<div class='clearfix'> </div> -->
			</div>
			<div class='clearfix'> </div>
		</div>
	</div>
	<!-- //subscribe --> ";
    }
    private function seteoFooter()
    {
        $datos_correo= $this->ci->Configuracion_model->obtener_config(1);
        $this->setDato_correo($datos_correo["descripcion"]);
        $datos_movil= $this->ci->Configuracion_model->obtener_config(2);
        $this->setDato_movil($datos_movil["descripcion"]);
        $datos_telefono= $this->ci->Configuracion_model->obtener_config(3);
        $this->setDato_telefono($datos_telefono["descripcion"]);
        $datos_direccion= $this->ci->Configuracion_model->obtener_config(4);
        $this->setDato_direccion($datos_direccion["descripcion"]);
        $datos_localidad= $this->ci->Configuracion_model->obtener_config(6);
        $this->setDato_localidad($datos_localidad["descripcion"]);
        
       $this->ci->load->model("Locales_model");
       
       $locales = $this->ci->Locales_model->getLocales();
        
       
       $dir_uno = strtoupper($locales[0]["dire"])." ".strtoupper($locales[0]["desc_localidad"]);
       $dir_dos = strtoupper($locales[1]["dire"])." ".strtoupper($locales[1]["desc_localidad"]);
       
       /*
       if(strlen($dir_uno) > strlen($dir_dos))
       {
           for($i= strlen($dir_dos); $i <strlen($dir_uno);$i++)
           {
               $dir_dos.="  ";
           }
       }
       else
       {
           for($i= strlen($dir_uno); $i <strlen($dir_dos);$i++)
           {
               $dir_uno.="  ";
           }
       }
       */
       
        $this->footer=
        "<!-- footer -->
	<div class='footer'>
		<div class='container'>
			<div class='footer-info w3-agileits-info'>
				<div class='col-md-4 address-left agileinfo'>
					<div class='footer-logo header-logo'>
						<h1><a href='".base_url()."'><span><img src='".base_url()."assets/recursos/images/logo_mas.png' alt='img'></span></a></h1>
                                                <br>
                                                <h6></h6> 
					</div>
					<ul>
                                            <li><i class='fa fa-map-marker'></i>".$dir_uno."</li>
                                            <!--<li><i class='fa fa-mobile'></i></li>-->
                                            <li><i class='fa fa-phone'></i>".strtoupper($locales[0]["telefono"])."</li>
                                            <li><i class='fa fa-envelope-o'></i> <a href=''>".strtoupper($locales[0]["correo"])."</a></li>
                                            <li><i class='fa fa-envelope-o'></i> <a href=''>".strtoupper($locales[0]["horario"])."</a></li>
					</ul> 
				</div>
			</div>
                        <div class='footer-info w3-agileits-info'>
				<div class='col-md-offset-1 col-md-4 address-left agileinfo'>
					<div class='footer-logo header-logo'>
						<h1><a href='".base_url()."'><span><img src='".base_url()."assets/recursos/images/logo_mas.png' alt='img'></span></a></h1>
                                                <br>
                                                <h6></h6> 
					</div>
					<ul>
                                            <li><i class='fa fa-map-marker'></i>".$dir_dos."<br/><br/></li>
                                            <!--<li><i class='fa fa-mobile'></i></li>-->
                                            <li><i class='fa fa-phone'></i>".strtoupper($locales[1]["telefono"])."</li>
                                            <li><i class='fa fa-envelope-o'></i> <a href=''>".strtoupper($locales[1]["correo"])."</a></li>
                                            <li><i class='fa fa-envelope-o'></i> <a href=''>".strtoupper($locales[1]["horario"])."</a></li>
					</ul> 
				</div>
			</div>
		</div>
	</div>
	<!-- //footer -->		
	<div class='copy-right'> 
		<div class='container'>
			<p>2017 Desarrollado por <a href='https://www.facebook.com/Ordene-su-negocio-737763829635258/'> Adrian Sirianni.</a></p>
		</div>
	</div> ";
    }
    
    
}
