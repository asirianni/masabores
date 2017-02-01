<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Masabores</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="<?php echo base_url(); ?>recursos/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>recursos/css/style.css" rel="stylesheet" type="text/css" media="all" /> 
        <link href="<?php echo base_url(); ?>recursos/css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
        <link href="<?php echo base_url(); ?>recursos/css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
        <link href="<?php echo base_url(); ?>recursos/css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
        <link href="<?php echo base_url(); ?>recursos/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider --> 
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>recursos/images/t_.ico"/>
        <!-- //Custom Theme files -->
        <!-- font-awesome icons -->
        <link href="<?php echo base_url(); ?>recursos/css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->
        <!-- js -->
        <script src="<?php echo base_url(); ?>recursos/js/jquery-2.2.3.min.js"></script> 
        <!-- //js -->
        <!-- web-fonts -->
<!--        <link href='http://www.fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://www.fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
        <link href='http://www.fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
        <link href='http://www.fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>-->
        <!-- web-fonts --> 
        <script src="<?php echo base_url(); ?>recursos/js/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>recursos/js/pedido-simple-web.js"></script>
        <script>
        $(document).ready(function() { 
                $("#owl-demo").owlCarousel({ 
                  autoPlay: 3000, //Set AutoPlay to 3 seconds 
                  items :4,
                  itemsDesktop : [640,5],
                  itemsDesktopSmall : [480,2],
                  navigation : true

                }); 
        }); 
        </script>
        <script src="<?php echo base_url(); ?>recursos/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {

                // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

                $('.header-two').scrollToFixed();  
                // previous summary up the page.

                var summaries = $('.summary');
                summaries.each(function(i) {
                    var summary = $(summaries[i]);
                    var next = summaries[i + 1];

                    summary.scrollToFixed({
                        marginTop: $('.header-two').outerHeight(true) + 10, 
                        zIndex: 999
                    });
                });
            });
        </script>
        <!-- start-smooth-scrolling -->
        <script type="text/javascript" src="<?php echo base_url(); ?>recursos/js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>recursos/js/easing.js"></script>	
        <script type="text/javascript">
                        jQuery(document).ready(function($) {
                                $(".scroll").click(function(event){		
                                        event.preventDefault();
                                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                                });
                        });
        </script>
        <!-- //end-smooth-scrolling -->
        <!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
        <script src="<?php echo base_url(); ?>recursos/js/bootstrap.js"></script>	
    </head>
    <body>
	<div class="agileits-modal modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user" aria-hidden="true"></i> INGRESO DE USUARIO</h4>
                    </div>
                    <div class="modal-body modal-body-sub"> 
                        <h5>Ingrese sus datos </h5>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="usuario" id="usuario_ingresar">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="pass" id="password_ingresar"  >
                        </div>
                        <div class="form-group">
                            <button type="button"  class="btn btn-info form-control" id="btn_iniciar_sesion" onClick="iniciarSesionCliente()">Ingresar</button>
                        </div>
                        <div class="form-group">
                            <span style="color: #f00;" id="mensaje_inicio_sesion_usuario"></span>
                        </div>
                    </div>
                </div>
            </div>
	</div>
	<script>
            <?php 
                if($this->session->userdata("ingresado")){

                }else{
                    echo "$('#myModal88').modal('show');";  
                }
            ?> 
	</script> 
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<p><a href="#">PARA ACTIVAR SU USUARIO LLAME AL - <?php echo strtoupper($telefono["descripcion"])?></a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
                                    <li class="dropdown head-dpdn">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> Mi Cuenta<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                    <?php 
                                                        if($this->session->userdata("ingresado")){
                                                            echo "<li><a href='#'>Bienvenido ".$this->session->userdata("nombre")."</a></li>";
//                                                          echo "<li><a href='#'>Lista: ".$this->session->userdata("lista_precios")."</a></li>";
                                                            echo "<li><a href='".base_url()."index.php/welcome/cerrar_sesion'>Salida</a></li>";
                                                        }else{
                                                            echo "<li><a href='#' onclick='iniciar_session();' >Ingreso</a></li>";    
                                                        }
                                                    ?> 
                                            </ul> 
                                    </li> 
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
                                    <h1><a href="<?php echo base_url(); ?>"><span><img src='<?php echo base_url(); ?>assets/recursos/images/logo_1.png' alt='img'></span></a></h1>
                                    <br>
					
				</div>	
				<div class="header-search">
                                    <?php
                                        $attributes = array('id' => 'busqueda_id', 'name' => 'form_buscar');
                                        echo form_open('welcome/buscar', $attributes);
                                    ?>
                                            <input type="search" name="busqueda" placeholder="Buscar producto..."  >
                                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                                                    <i class="fa fa-search" aria-hidden="true"> </i>
                                            </button>
                                    <?php echo form_close(); ?>
				</div>
				<div class="header-cart"> 
<!--					<div class="my-account">
						<a href="contact.html"><i class="fa fa-map-marker" aria-hidden="true"></i> CONTACTO</a>						
					</div>-->
					<div class="cart">
                                            <a href="#" onclick='mostrarModal();'>
                                                <h3> 
                                                    <div class="total">
                                                         <!-- <span class="simpleCart_total"></span>	(<span id="simpleCart_quantity" class="simpleCart_quantity"></span> )-->
                                                       <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> $ <span id="total_final_menu">0</span>
                                                    </div>
                                                </h3>
                                            </a>
<!--                                            <form action="#" method="post" class="last"> 
                                                    <a href="#" onclick='mostrarModal();'></a>
                                                    <button class="w3view-cart" type="submit" name="submit" value="">

                                                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                    </button>
                                            </form>-->
                                            
                                             
					</div>
					<div class="clearfix"> </div> 
				</div> 
				<div class="clearfix"> </div> 
				
			</div>		
		</div><!-- //header-two -->
		<div class="header-three"><!-- header-three -->
			<div class="container">
				<div class="menu">
<!--					<div class="cd-dropdown-wrapper">
						<a class="cd-dropdown-trigger" href="#0">Categorias</a>
						<nav class="cd-dropdown"> 
							<a href="#0" class="cd-close">Close</a>
							<ul class="cd-dropdown-content">
                                                            <?php
//                                                                $salida="<li><a href='".base_url()."index.php/welcome/busqueda_rubro/0'> <i class=''></i> TODOS LOS RUBROS</a></li>";
//                                                                foreach ($rubros as $r) {
//                                                                    $salida.="<li><a href='".base_url()."index.php/welcome/busqueda_rubro/".$r["codigo"]."'>".strtoupper($r["descripcion"])."</a></li>";
//                                                                }
//                                                                echo $salida;
                                                            ?> 
							</ul>  .cd-dropdown-content 
						</nav>  .cd-dropdown 
					</div>  .cd-dropdown-wrapper 	 -->
				</div>
				<div class="move-text">
					<div class="marquee"><a href="<?php echo base_url(); ?>index.php/welcome/buscar"> VER CATALOGO  <span>VER CATALOGO </span> <span> CALCULE SU PEDIDO AHORA!!!</span></a></div>
					<script type="text/javascript" src="<?php echo base_url(); ?>recursos/js/jquery.marquee.min.js"></script>
					<script>
					  $('.marquee').marquee({ pauseOnHover: true });
					  //# sourceURL=pen.js
					</script>
				</div>
			</div>
		</div>
	</div>
	<!-- //header -->	
	<!-- banner -->
	<div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">  
                <div class="item active"><!-- First-Slide -->
                    <img src="<?php echo base_url(); ?>recursos/images/5.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated flipInX">Soluciones <span></span> Gastronomicas</h3>
                        <h4 data-animation="animated flipInX">Venta mayorista y minorista</h4>
                    </div>
                </div>  
                <div class="item"> <!-- Second-Slide -->
                    <img src="<?php echo base_url(); ?>recursos/images/supermercado.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated fadeInDown">Consulte nuestro catalogo online</h3>
                        <h4 data-animation="animated fadeInUp">Calcule su presupuesto</h4>
                    </div>
                </div> 
                <div class="item"><!-- Third-Slide -->
                    <img src="<?php echo base_url(); ?>recursos/images/comercio.jpg" alt="" class="img-responsive"/>
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                        <h4 data-animation="animated flipInX">para su comercio</h4>
                    </div>
                </div> 
            </div> 
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a> 
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> 
        </div>
		<script src="<?php echo base_url(); ?>recursos/js/custom.js"></script>
	</div>
	<!-- //banner -->  
	<!-- welcome -->
	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class=" nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" >
							<i class="fa fa-tags" aria-hidden="true"></i> 
							<h5><?php echo $tabla_destacado[0]["descripcion"]; ?></h5>
						</a></li>
						<li role="presentation"><a href="#carl" role="tab" id="carl-tab" data-toggle="tab"> 
							<i class="fa fa-tags" aria-hidden="true"></i>
							<h5><?php echo $tabla_destacado[1]["descripcion"]; ?></h5>
						</a></li>
						<li role="presentation"><a href="#james" role="tab" id="james-tab" data-toggle="tab"> 
							<i class="fa fa-tags" aria-hidden="true"></i>
							<h5><?php echo $tabla_destacado[2]["descripcion"]; ?></h5>
						</a></li>
						<li role="presentation"><a href="#decor" role="tab" id="decor-tab" data-toggle="tab"> 
							<i class="fa fa-tags" aria-hidden="true"></i>
							<h5><?php echo $tabla_destacado[3]["descripcion"]; ?></h5>
						</a></li>
						<li role="presentation"><a href="#sports" role="tab" id="sports-tab" data-toggle="tab"> 
							<i class="fa fa-tags" aria-hidden="true"></i>
							<h5><?php echo $tabla_destacado[4]["descripcion"]; ?></h5>
						</a></li> 
					</ul>
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">PRODUCTOS DESTACADOS</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<div id="owl-demo" class="owl-carousel">
                                                                    <?php 
                                                                        foreach ($destacado_1 as $d_1) {
                                                                            $mensaje="<div class='item'>
                                                                                <div class='glry-w3agile-grids agileits'> 
                                                                                    <a href=''><img src='".base_url()."assets/recursos/images/productos-destacados/".$d_1["imagen_1"]."' alt='img'></a>
                                                                                    <div class='view-caption agileits-w3layouts'>           
                                                                                        <h4><a href=''>".$d_1["producto"]."</a></h4>
                                                                                        <p>".$d_1["detalle"]."</p>
                                                                                        <h5>$".$d_1["precio"]."</h5> 
                                                                                         
                                                                                    </div>   
                                                                                </div>   
                                                                            </div>";
                                                                            echo $mensaje;
                                                                        }
                                                                    ?>
								</div> 
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo1" class="owl-carousel">
                                                                    <?php 
                                                                        foreach ($destacado_2 as $d_2) {
                                                                            $mensaje="<div class='item'>
                                                                                <div class='glry-w3agile-grids agileits'> 
                                                                                    <a href=''><img src='".base_url()."assets/recursos/images/productos-destacados/".$d_2["imagen_1"]."' alt='img'></a>
                                                                                    <div class='view-caption agileits-w3layouts'>           
                                                                                        <h4><a href=''>".$d_2["producto"]."</a></h4>
                                                                                        <p>".$d_2["descripcion"]."</p>
                                                                                        <h5>".$d_2["precio"]."</h5> 
                                                                                        <form action='#' method='post'>
                                                                                                <input type='hidden' name='cmd' value='_cart' />
                                                                                                <input type='hidden' name='add' value='1' /> 
                                                                                                <input type='hidden' name='w3ls_item' value='Audio speaker' /> 
                                                                                                <input type='hidden' name='amount' value='100.00' /> 
                                                                                                <button type='submit' class='w3ls-cart' ><i class='fa fa-cart-plus' aria-hidden='true'></i> Agregar carrito</button>
                                                                                        </form>  
                                                                                    </div>   
                                                                                </div>   
                                                                            </div>";
                                                                            echo $mensaje;
                                                                        }
                                                                    ?>
								</div>   
							</div>
						</div> 
						<div role="tabpanel" class="tab-pane fade" id="james" aria-labelledby="james-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo2").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo2" class="owl-carousel"> 
									<?php 
                                                                            foreach ($destacado_3 as $d_3) {
                                                                                $mensaje="<div class='item'>
                                                                                    <div class='glry-w3agile-grids agileits'> 
                                                                                        <a href=''><img src='".base_url()."assets/recursos/images/productos-destacados/".$d_3["imagen_1"]."' alt='img'></a>
                                                                                        <div class='view-caption agileits-w3layouts'>           
                                                                                            <h4><a href=''>".$d_3["producto"]."</a></h4>
                                                                                            <p>".$d_3["descripcion"]."</p>
                                                                                            <h5>".$d_3["precio"]."</h5> 
                                                                                            <form action='#' method='post'>
                                                                                                    <input type='hidden' name='cmd' value='_cart' />
                                                                                                    <input type='hidden' name='add' value='1' /> 
                                                                                                    <input type='hidden' name='w3ls_item' value='Audio speaker' /> 
                                                                                                    <input type='hidden' name='amount' value='100.00' /> 
                                                                                                    <button type='submit' class='w3ls-cart' ><i class='fa fa-cart-plus' aria-hidden='true'></i> Agregar carrito</button>
                                                                                            </form>  
                                                                                        </div>   
                                                                                    </div>   
                                                                                </div>";
                                                                                echo $mensaje;
                                                                            }
                                                                        ?>
								</div>    
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="decor" aria-labelledby="decor-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo3").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo3" class="owl-carousel"> 
                                                                    <?php 
                                                                        foreach ($destacado_4 as $d_4) {
                                                                            $mensaje="<div class='item'>
                                                                                <div class='glry-w3agile-grids agileits'> 
                                                                                    <a href=''><img src='".base_url()."assets/recursos/images/productos-destacados/".$d_4["imagen_1"]."' alt='img'></a>
                                                                                    <div class='view-caption agileits-w3layouts'>           
                                                                                        <h4><a href=''>".$d_4["producto"]."</a></h4>
                                                                                        <p>".$d_4["descripcion"]."</p>
                                                                                        <h5>".$d_4["precio"]."</h5> 
                                                                                        <form action='#' method='post'>
                                                                                                <input type='hidden' name='cmd' value='_cart' />
                                                                                                <input type='hidden' name='add' value='1' /> 
                                                                                                <input type='hidden' name='w3ls_item' value='Audio speaker' /> 
                                                                                                <input type='hidden' name='amount' value='100.00' /> 
                                                                                                <button type='submit' class='w3ls-cart' ><i class='fa fa-cart-plus' aria-hidden='true'></i> Agregar carrito</button>
                                                                                        </form>  
                                                                                    </div>   
                                                                                </div>   
                                                                            </div>";
                                                                            echo $mensaje;
                                                                        }
                                                                    ?> 
								</div>    
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="sports" aria-labelledby="sports-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo4").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										}); 
									}); 
								</script>
								<div id="owl-demo4" class="owl-carousel"> 
                                                                    <?php 
                                                                        foreach ($destacado_5 as $d_5) {
                                                                            $mensaje="<div class='item'>
                                                                                <div class='glry-w3agile-grids agileits'> 
                                                                                    <a href=''><img src='".base_url()."assets/recursos/images/productos-destacados/".$d_5["imagen_1"]."' alt='img'></a>
                                                                                    <div class='view-caption agileits-w3layouts'>           
                                                                                        <h4><a href=''>".$d_5["producto"]."</a></h4>
                                                                                        <p>".$d_5["descripcion"]."</p>
                                                                                        <h5>".$d_5["precio"]."</h5> 
                                                                                        <form action='#' method='post'>
                                                                                                <input type='hidden' name='cmd' value='_cart' />
                                                                                                <input type='hidden' name='add' value='1' /> 
                                                                                                <input type='hidden' name='w3ls_item' value='Audio speaker' /> 
                                                                                                <input type='hidden' name='amount' value='100.00' /> 
                                                                                                <button type='submit' class='w3ls-cart' ><i class='fa fa-cart-plus' aria-hidden='true'></i> Agregar carrito</button>
                                                                                        </form>  
                                                                                    </div>   
                                                                                </div>   
                                                                            </div>";
                                                                            echo $mensaje;
                                                                        }
                                                                    ?>
								</div>    
							</div>
						</div> 
					</div>   
				</div>  
			</div>  	
		</div>  	
	</div> 
	<!-- //welcome -->
	<!-- add-products -->
<!--	<div class="add-products"> 
		<div class="container">  
			<div class="add-products-row">
				<div class="w3ls-add-grids">
					<a href="products1.html"> 
						<h4>TOP 10 TRENDS FOR YOU FLAT <span>20%</span> OFF</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-mdl">
					<a href="products1.html"> 
						<h4>SUNDAY SPECIAL DISCOUNT FLAT <span>40%</span> OFF</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-mdl1">
					<a href="products.html"> 
						<h4>LATEST DESIGNS FOR YOU <span> Hurry !</span></h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="clerfix"> </div>
			</div>  	
		</div>  	
	</div>-->
	<!-- //add-products -->
	<!-- coming soon -->
	<div class="soon">
		<div class="container">
			<h3></h3>
			<h4>Genere su presupuesto</h4>  
<!--			<div id="countdown1" class="ClassyCountdownDemo"></div>-->
		</div> 
	</div>
	<!-- //coming soon -->
	<!-- deals -->
<!--	<div class="deals"> 
		<div class="container"> 
			<h3 class="w3ls-title">ESPECIALISTAS EN LOS SIGUIENTES RUBROS </h3>
			<div class="deals-row">
				<div class="col-md-3 focus-grid"> 
					<a href="products.html" class="wthree-btn"> 
						<div class="focus-image"><i class="fa fa-mobile"></i></div>
						<h4 class="clrchg">Mobiles</h4> 
					</a>
				</div>
				<div class="col-md-3 focus-grid"> 
					<a href="products.html" class="wthree-btn wthree1"> 
						<div class="focus-image"><i class="fa fa-laptop"></i></div>
						<h4 class="clrchg"> Electronics & Appliances</h4> 
					</a>
				</div> 
				<div class="col-md-3 focus-grid"> 
					<a href="products4.html" class="wthree-btn wthree2"> 
						<div class="focus-image"><i class="fa fa-wheelchair"></i></div>
						<h4 class="clrchg">Furnitures</h4>
					</a>
				</div> 
				<div class="col-md-3 focus-grid"> 
					<a href="products3.html" class="wthree-btn wthree3"> 
						<div class="focus-image"><i class="fa fa-home"></i></div>
						<h4 class="clrchg">Home Decor</h4>
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products9.html" class="wthree-btn wthree3"> 
						<div class="focus-image"><i class="fa fa-book"></i></div>
						<h4 class="clrchg">Books & Music</h4> 
					</a>
				</div>
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products1.html" class="wthree-btn wthree4"> 
						<div class="focus-image"><i class="fa fa-asterisk"></i></div>
						<h4 class="clrchg">Fashion</h4>
					</a>
				</div>
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products2.html" class="wthree-btn wthree2"> 
						<div class="focus-image"><i class="fa fa-gamepad"></i></div>
						<h4 class="clrchg">Kids</h4>
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products5.html" class="wthree-btn wthree"> 
						<div class="focus-image"><i class="fa fa-shopping-basket"></i></div>
						<h4 class="clrchg">Groceries</h4>
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products7.html" class="wthree-btn wthree5"> 
						<div class="focus-image"><i class="fa fa-medkit"></i></div>
						<h4 class="clrchg">Health</h4> 
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products8.html" class="wthree-btn wthree1"> 
						<div class="focus-image"><i class="fa fa-car"></i></div>
						<h4 class="clrchg">Automotive</h4> 
					</a>
				</div>
				<div class="col-md-3 focus-grid"> 
					<a href="products5.html" class="wthree-btn wthree2"> 
						<div class="focus-image"><i class="fa fa-cutlery"></i></div>
						<h4 class="clrchg">Food</h4> 
					</a>
				</div>
				<div class="col-md-3 focus-grid"> 
					<a href="products4.html" class="wthree-btn wthree5"> 
						<div class="focus-image"><i class="fa fa-futbol-o"></i></div>
						<h4 class="clrchg">Sports</h4> 
					</a>
				</div> 
				<div class="col-md-3 focus-grid"> 
					<a href="products2.html" class="wthree-btn wthree3"> 
						<div class="focus-image"><i class="fa fa-gamepad"></i></div>
						<h4 class="clrchg">Games & Toys</h4> 
					</a>
				</div> 
				<div class="col-md-3 focus-grid"> 
					<a href="products6.html" class="wthree-btn "> 
						<div class="focus-image"><i class="fa fa-gift"></i></div>
						<h4 class="clrchg">Gifts</h4> 
					</a>
				</div> 
				<div class="clearfix"> </div>
			</div>  	
		</div>  	
	</div> -->
	<!-- //deals --> 
	<!-- footer-top -->
	<div class="w3agile-ftr-top">
		<div class="container">
			<div class="ftr-toprow">
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>ENTREGAS</h4>
						<p>Consulte por nuestras entregas en obra </p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>GENERE SU CLAVE DE CLIENTE</h4>
						<p>Registrese y acceda al portal de precios </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>CLIENTES CONTENTOS</h4>
						<p>Nos interesa que usted tenga la mejor atencion </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer-top --> 
	<!-- subscribe -->
	<div class="subscribe"> 
		<div class="container">
			<div class="col-md-6 social-icons w3-agile-icons">
				<h4>SIGANOS EN </h4>  
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
<!--					<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fa fa-rss icon rss"> </a></li> -->
				</ul> 
<!--				<ul class="apps"> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href="#" class="fa fa-apple"></a></li>
					<li><a href="#" class="fa fa-windows"></a></li>
					<li><a href="#" class="fa fa-android"></a></li>
				</ul> -->
			</div> 
			<div class="col-md-6 subscribe-right">
<!--				<h4>Sign up for email and get 25%off!</h4>  
				<form action="#" method="post"> 
					<input type="text" name="email" placeholder="Enter your Email..." required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="clearfix"> </div> -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //subscribe --> 
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
						<h1><a href="<?php echo base_url(); ?>"><span><img src='<?php echo base_url(); ?>assets/recursos/images/logo_1.png' alt='img'></span></a></h1>
                                                <br>
                                                <h6></h6> 
					</div>
					<ul>
                                            <li><i class="fa fa-map-marker"></i> <?php echo strtoupper($direccion["descripcion"]); ?>, <?php echo strtoupper($localidad["descripcion"]); ?>.</li>
                                            <li><i class="fa fa-mobile"></i> <?php echo strtoupper($movil["descripcion"]); ?> </li>
                                            <li><i class="fa fa-phone"></i> <?php echo strtoupper($telefono["descripcion"]); ?> </li>
                                            <li><i class="fa fa-envelope-o"></i> <a href=""><?php echo strtoupper($correo["descripcion"]); ?></a></li>
					</ul> 
				</div>
<!--				<div class="col-md-8 address-right">
					<div class="col-md-4 footer-grids">
						<h3>Company</h3>
						<ul>
							<li><a href="about.html">About Us</a></li>
							<li><a href="marketplace.html">Marketplace</a></li>  
							<li><a href="values.html">Core Values</a></li>  
							<li><a href="privacy.html">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Services</h3>
						<ul>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="login.html">Returns</a></li> 
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="sitemap.html">Site Map</a></li>
							<li><a href="login.html">Order Status</a></li>
						</ul> 
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Payment Methods</h3>
						<ul>
							<li><i class="fa fa-laptop" aria-hidden="true"></i> Net Banking</li>
							<li><i class="fa fa-money" aria-hidden="true"></i> Cash On Delivery</li>
							<li><i class="fa fa-pie-chart" aria-hidden="true"></i>EMI Conversion</li>
							<li><i class="fa fa-gift" aria-hidden="true"></i> E-Gift Voucher</li>
							<li><i class="fa fa-credit-card" aria-hidden="true"></i> Debit/Credit Card</li>
						</ul>  
					</div>
					<div class="clearfix"></div>
				</div>-->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
        <div class="modal fade" id="modalCarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> Cerrar</button>
				        <h4 class="modal-title" id="exampleModalLabel">TOTAL $ <span id="total_final">0</span> </h4>
				      </div>
				      <div class="modal-body">
			            <div class="row">	
			            	<div class="col-md-12">
								<table id="cart" class="table table-hover table-condensed">
									<thead>
						              <tr>
<!--                                                                <th style="">CODIGO</th>  -->
						                <th style="">PRODUCTO</th>
						                <th style="">CANT.</th>
						                <th style="">$</th>
						                <th style="" class="text-center">SUBTOTAL</th>
						                <th style="" class="text-center"></th>
						                <th style="" class="text-center"></th>
						                
						              </tr>
						            </thead>
									<tbody id="table_body">
																                                      
									</tbody>
								</table>
							</div>
			            </div>
				      	<div class="modal-footer">				
	                        <div class="form-group">
	                            <div class="col-md-12 text-right">
		                            <?php
		                            	$attributes = array('id' => 'ver_pedido_id', 'name' => 'formulario_ver_pedido');
		                            	echo form_open('welcome/checkout', $attributes);
                                                    echo "<input type='submit' class='btn btn-medium btn-default btn-square' value='Confirmar'/>";
                                                echo form_close();
                                            ?>
	                            </div>
	                        </div> 	
				         	
				      	</div>
				    </div>
				  </div>
				</div>
        	</div>
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>2017 Desarrollado por <a href="https://www.facebook.com/Ordene-su-negocio-737763829635258/"> Adrian Sirianni.</a></p>
		</div>
	</div> 
	<!-- cart-js -->
	<script src="<?php echo base_url(); ?>recursos/js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        			items[i].set('shipping', 0);
        			items[i].set('shipping2', 0);
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->	
	<!-- countdown.js -->	
	<script src="<?php echo base_url(); ?>recursos/js/jquery.knob.js"></script>
	<script src="<?php echo base_url(); ?>recursos/js/jquery.throttle.js"></script>
	<script src="<?php echo base_url(); ?>recursos/js/jquery.classycountdown.js"></script>
		<script>
			$(document).ready(function() {
				$('#countdown1').ClassyCountdown({
					end: '1388268325',
					now: '1387999995',
					labels: true,
					style: {
						element: "",
						textResponsive: .5,
						days: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#1abc9c",
								lineCap: 'round'
							},
							textCSS: 'font-weight:300; color:#fff;'
						},
						hours: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#05BEF6",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						minutes: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#8e44ad",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						seconds: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#f39c12",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						}

					},
					onEndCallback: function() {
						console.log("Time out!");
					}
				});
			});
		</script>
	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="<?php echo base_url(); ?>recursos/js/jquery.menu-aim.js"> </script>
	<script src="<?php echo base_url(); ?>recursos/js/main.js"></script> <!-- Resource jQuery -->
        
        <script>
            function iniciarSesionCliente()
            {
                var usuario = document.getElementById('usuario_ingresar').value;
                var password = document.getElementById('password_ingresar').value;

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url()?>index.php/welcome/iniciar_sesion_cliente",
                        data: {usuario:usuario,password:password},

                        beforeSend: function(event){},
                        success: function(data)
                        {
                            data = JSON.parse(data);
                            
                            if(data)
                            {
                               location.href= "<?php echo base_url()?>";
                            }
                            else
                            {
                                $("#mensaje_inicio_sesion_usuario").html("Datos incorrectos");
                            }

                        },
                        error: function(event){$("#mensaje_inicio_sesion_usuario").html("Datos incorrectos");},
                    });

            }
            
            function iniciar_session(){
                $('#myModal88').modal('show');
            }
            
        </script>
        <script>
 
            $(document).ready(function(){
                try {

                    if (localStorage.getItem!=null) {
                        storage = JSON.parse(localStorage['pedido']);
                        while (cantidad_productos<storage.length) {
                            agregar_producto_tabla(storage[cantidad_productos].cod, storage[cantidad_productos].cod_prod, storage[cantidad_productos].desc, storage[cantidad_productos].cant, storage[cantidad_productos].pre, storage[cantidad_productos].tot);
                            cantidad_productos++;
                        }
                        pedido = storage;
                        calcular_total();
                    }
                } catch(e) {
                        //alert(e);
                    storage = {};
                }

            });

            function agregar_texto_total(total){
                document.getElementById("total_final").innerHTML=total;
                document.getElementById("total_final_menu").innerHTML=total;
            }
            
            function mostrarModal(){
                var carrito=document.getElementById("total_final_menu").innerHTML;
                if(carrito==0){
                    alert("Su carrito esta sin productos.");
                }else{
                    $('#modalCarrito').modal('show');
                }
            }
            
            
            function agregar_producto_tabla(codigo, cod_prod, producto, cantidad, precio, total){
                var index_tab=1;
                var tabla = document.getElementById("table_body");		    
                var hilera = document.createElement("tr");

                hilera.setAttribute('id', codigo);

                var celdaCodigo = document.createElement("td");
                var textoCeldaCodigo = document.createTextNode(cod_prod);
                celdaCodigo.appendChild(textoCeldaCodigo);

                var celdaDesc = document.createElement("td");
                var textoCeldaDesc = document.createTextNode(producto);
                celdaDesc.appendChild(textoCeldaDesc);

                var celdaCant = document.createElement("td");
                var celdaCantEditable = document.createElement("input");
                
                //var textoCeldaCant = document.createTextNode(cantidad);
                celdaCantEditable.setAttribute('id', 'cant_'+codigo);
                celdaCantEditable.setAttribute('size', "3");
                celdaCantEditable.setAttribute('value', cantidad);
                celdaCantEditable.setAttribute('onblur', "sumar_cantidad('"+codigo+"', '"+"cant_"+codigo+"')");
                celdaCantEditable.setAttribute('tabindex', index_tab);
                index_tab++;
                celdaCant.appendChild(celdaCantEditable);

                var celdaPrec = document.createElement("td");
                var textoCeldaPrec = document.createTextNode(precio);
                celdaPrec.appendChild(textoCeldaPrec);

                var celdaTot = document.createElement("td");
                var textoCeldaTot = document.createTextNode(total);
                celdaTot.setAttribute('id', 'tot_'+codigo);
                celdaTot.appendChild(textoCeldaTot);

                var celdaEliminar = document.createElement("td");
                var a = document.createElement('a');
                a.setAttribute('href', '#sharp');
                a.setAttribute('onclick', 'eliminar_producto('+codigo+')');
                var Img =document.createElement("img");
                Img.setAttribute('src', '<?php echo base_url(); ?>recursos/images/comandera/eliminar-icono.png');

                var celdaMas= document.createElement("td");
                var aMas = document.createElement('a');
                aMas.setAttribute('href', '#sharp');
                aMas.setAttribute('onclick', 'agregar_producto('+codigo+', "'+cod_prod+'" ,"'+producto+'", 1, '+precio+' )');
                var ImgMas =document.createElement("img");
                ImgMas.setAttribute('src', '<?php echo base_url(); ?>recursos/images/comandera/aumentar.png');

                var celdaMenos= document.createElement("td");
                var aMenos = document.createElement('a');
                aMenos.setAttribute('href', '#sharp');
                aMenos.setAttribute('onclick', 'restarProducto('+codigo+','+precio+', '+cantidad+' )');
                var ImgMenos =document.createElement("img");
                ImgMenos.setAttribute('src', '<?php echo base_url(); ?>recursos/images/comandera/restar.png');

                a.appendChild(Img);
                aMas.appendChild(ImgMas);
                aMenos.appendChild(ImgMenos);

                celdaEliminar.appendChild(a);
                celdaMas.appendChild(aMas);
                celdaMenos.appendChild(aMenos);

                //hilera.appendChild(celdaCodigo);
                hilera.appendChild(celdaDesc);
                hilera.appendChild(celdaCant);
                hilera.appendChild(celdaPrec);
                hilera.appendChild(celdaTot);
                hilera.appendChild(celdaEliminar);
                //hilera.appendChild(celdaMas);
                hilera.appendChild(celdaMenos);

                tabla.appendChild(hilera);

                verificar_productos();
            }

        </script>
        
        
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 
</body>
</html>