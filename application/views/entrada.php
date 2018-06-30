<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title["descripcion"]?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <?php if($keywords){?>
            <meta name="keywords" content="<?php echo $keywords["descripcion"]?>" />
        <?php }?>
        <?php if($description){?>
            <meta name="description" content="<?php echo $description["descripcion"]?>">
        <?php }?>
        
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
        <!-- CSS MARIO -->
        <link href="<?php echo base_url(); ?>recursos/css/agregado-estilos.css" rel="stylesheet"> 
         <!-- CSS MARIO -->
        <link href="<?php echo base_url(); ?>recursos/bxslider/jquery.bxslider.css" rel="stylesheet">
        
        <!-- CSS flexlider destacados-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/slider-destacados/css/flexslider.css" type="text/css" media="screen" />
        <!-- //font-awesome icons -->
        <!-- js -->
        <script src="<?php echo base_url(); ?>recursos/js/jquery-2.2.3.min.js"></script>
        
        <link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>recursos/slippry/dist/slippry.min.css'/>


        <script src="<?php echo base_url(); ?>recursos/js/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>recursos/js/pedido-simple-web.js"></script>
        <script src="<?php echo base_url(); ?>recursos/bxslider/jquery.bxslider.min.js"></script> 
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
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-87801251-1', 'auto');
            ga('send', 'pageview');
        </script>
    </head>
    <body>
	<div class="agileits-modal modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
            <?php echo $modal_ingreso?>
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
		<?php echo $menu_superior?>
            </div>
		<?php echo $parte_buscador?>
		<div class="header-three"><!-- header-three -->
			<div class="container">
				<div class="menu">
				</div>
                            
                            <?php if($secciones_activas[0]["mostrar"] == "si"){echo $menu_principal;}?>
			</div>
		</div>
	</div>
	<!-- //header -->	
	<!-- banner -->
	<div class="banner">
                <!-- INICIO CARRUSEL - SLIDER-->
                <?php if($secciones_activas[1]["mostrar"] == "si"){?>
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
                        <div class="carousel-inner" role="listbox">  
                            <div class="item active"><!-- First-Slide -->
                                <img src="<?php echo base_url(); ?>recursos/images/masabores_img_frente.JPG" alt="" class="img-responsive" />
                                <div class="carousel-caption kb_caption kb_caption_right">
                                    <h3 data-animation="animated flipInX">Masabores <span>  </span> </h3>
                                    <h4 data-animation="animated flipInX">Bienvenido</h4>
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
                                <img src="<?php echo base_url(); ?>recursos/images/foto7.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Stock permanente </h3>
                                    <h4 data-animation="animated flipInX">de productos</h4>
                                </div>
                            </div>
                            <div class="item"><!-- Third-Slide -->
                                <img src="<?php echo base_url(); ?>recursos/images/cocina.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Su aliado en la cocina </h3>
                                    <h4 data-animation="animated flipInX">con los mejores productos</h4>
                                </div>
                            </div>
                            <div class="item"><!-- Third-Slide -->
                                <img src="<?php echo base_url(); ?>recursos/images/foto2.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">con marcas lideres </h3>
                                    <h4 data-animation="animated flipInX">en el mercado</h4>
                                </div>
                            </div> 
            <!--                <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto3.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> 
                            <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto4.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> 
                            <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto5.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> 
                            <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto6.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> 
                            <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto7.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> 
                            <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto8.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> 
                            <div class="item"> Third-Slide 
                                <img src="<?php echo base_url(); ?>recursos/images/foto9.jpg" alt="" class="img-responsive"/>
                                <div class="carousel-caption kb_caption kb_caption_center">
                                    <h3 data-animation="animated fadeInLeft">Los mejores productos </h3>
                                    <h4 data-animation="animated flipInX">para su comercio</h4>
                                </div>
                            </div> -->

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
                <!-- FIN CARRUSEL -->
                <?php }?>
		<script src="<?php echo base_url(); ?>recursos/js/custom.js"></script>
	</div>
	<!-- //banner -->  
	<!-- welcome -->
        
	<div class="welcome"> 
		<div class="container"> 
            <div class="col-md-2">
                <ul id="publicidad_inicio_izquierda">
                <?php
                if($publicidades_inicio_vertical_izquierdo) { 
                ?>
                    <li>
                        <a href="#">
                            <img src="<?php echo base_url()?>recursos/images/loader.gif"  class="img-responsive">
                        </a>
                    </li>
                <?php
                        
                 } else {?>
                    <li>
                        <a href="#">
                            <img src="<?php echo base_url() ?>recursos/images/publicidades/170_638/default.jpg"  class="img-responsive">
                        </a>
                    </li>
                <?php }?>
                </ul>
            </div>
            
            <?php  
                if($modulo_destacado_abierto=='si'){
            ?>      
                    
            <div class="col-md-8">
                <div class="flexslider carousel">
                    <ul class="slides">
                        <?php 
                                                                    
                            foreach ($destacado_todos as $d_t) {
                                
                                $detalle_seleccionado=$d_t["detalle"];
                                $detalle=str_replace("<p>", "", $detalle_seleccionado);
                                $detalle=str_replace("</p>", "", $detalle);
                                $detalle=  trim($detalle);
                                echo "<li>";
                                echo "<img src='".base_url()."assets/recursos/images/productos-destacados/redimension/".$d_t["imagen_1"]."' />";
                                echo "<div class=''>           
                                        <h4><a href='#'>".substr($d_t["producto"],0,18)."</a></h4>
                                        <p>".substr($d_t["detalle"],0,18)."</p>
                                        <p></p>
                                        <p><a class='btn btn-primary' href='#sharp' onclick = 'agregar_producto(".$d_t["codigo"]." , &#39;&#39;, &#39;".$detalle."&#39;, 1,  ".$d_t["precio"].")'>
                                            <i class='fa fa-cart-arrow-down' aria-hidden='true'> </i> COMPRAR +<br/> $".$d_t["precio"]."
                                        </a></p>


                                    </div>";
                                echo "</li>";
                            }
                        
                        ?>
                        <li>
                            
                        </li>         
                    </ul>
                  </div>
                
                
                
			<div class="welcome-info">
                            
                            
                            
                            <h3 class="w3ls-title">PRODUCTOS DESTACADOS</h3>
				
			</div>  

            <div class="col-md-12" style="text-align:center;">
                <ul id="publicidad_inicio_central">
                <?php
                if($publicidades_inicio_horizontal) { ?>
                    <li>
                        <a href="#">
                            <img src="<?php echo base_url()?>recursos/images/loader.gif"  class="img-responsive">
                        </a>
                    </li>
                <?php 
                } else { ?>
                    <li>
                        <a href="#">
                            <img src="<?php echo base_url() ?>recursos/images/publicidades/729_90/default.jpg" class="img-responsive">
                        </a>
                    </li>
                <?php }?>
                </ul>
            </div>

            <!-- FIN PRODUCTOS DESTACADOS -->	
        </div>
        
                                        <?php
                                            }
                                        ?>            
                    
        <div class="col-md-2">
            <ul id="publicidad_inicio_derecha">
            <?php
            if($publicidades_inicio_vertical_derecho) { ?>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>recursos/images/loader.gif"  class="img-responsive">
                    </a>
                </li>
            <?php
             } else {?>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url() ?>recursos/images/publicidades/170_638/default.jpg"  class="img-responsive">
                    </a>
                </li>
            <?php }?>
        </ul>
        </div>

        

		</div>  	
	</div> 
	<!-- footer-top -->
        <?php if( $secciones_activas[3]["mostrar"] == "si"){?>
        <div class="hidden-sm hidden-xs">
            <ul class="bxslider" style="text-align: center;">
                <?php 

                    $iconos = count($marcas);

                    $indice = 0;

                    while ($indice < $iconos)
                    {
                        $contador = 0;

                        echo "<li>";

                        while ($contador < 6)
                        {
                            if($indice < $iconos)
                            {
                             echo "<img style='display: inline-block !important;margin-bottom: 0px;padding-bottom:10px;' src='".base_url()."recursos/images/slider_marcas/".$marcas[$indice]["imagen"]."'>";
                            }
                            $contador++;
                            $indice++;
                        }

                        $contador =0;
                        echo "</li>";
                    }

                ?>
             </ul>
        </div>
        <div class="visible-sm">
            <ul class="bxslider " style="text-align: center;">
                <?php 

                    $iconos = count($marcas);

                    $indice = 0;

                    while ($indice < $iconos)
                    {
                        $contador = 0;

                        echo "<li>";

                        while ($contador < 3)
                        {
                            if($indice < $iconos)
                            {
                             echo "<img class='img-responsive' style='display: inline-block !important;margin-bottom: 10px;padding-bottom:0px;' src='".base_url()."recursos/images/slider_marcas/".$marcas[$indice]["imagen"]."'>";
                            }
                            $contador++;
                            $indice++;
                        }

                        $contador =0;
                        echo "</li>";
                    }

                ?>
             </ul>
        </div>
        <div class="visible-xs">
            <ul class="bxslider " style="text-align: center;">
                <?php 

                    $iconos = count($marcas);

                    $indice = 0;

                    while ($indice < $iconos)
                    {
                        $contador = 0;

                        echo "<li>";

                        while ($contador < 2)
                        {
                            if($indice < $iconos)
                            {
                             echo "<img class='img-responsive' style='display: inline-block !important;margin-bottom: 10px;padding-bottom:0px;' src='".base_url()."recursos/images/slider_marcas/".$marcas[$indice]["imagen"]."'>";
                            }
                            $contador++;
                            $indice++;
                        }

                        $contador =0;
                        echo "</li>";
                    }

                ?>
             </ul>
        </div>
        <?php }?>
	<div class="w3agile-ftr-top">
		<div class="container">
			<div class="ftr-toprow">
				<div style="cursor: pointer ;" onclick="location.href='<?php echo base_url()?>index.php/welcome/zonas_de_cobertura';" class="col-md-4 ftr-top-gridson" >
					<div class="ftr-top-left" >
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>ENTREGAS</h4>
						<p>Consulte nuestras zonas de cobertura</p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div style="cursor: pointer ;" onClick='generar_clave_cliente()' class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>GENERE SU CLAVE DE CLIENTE</h4>
						<p>Registrese y acceda al portal de precios </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div style="cursor: pointer ;" class="col-md-4 ftr-top-grids">
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
        <?php if( $secciones_activas[4]["mostrar"] == "si"){
        echo $siganos_en;}?>
	
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
	<?php echo $footer?>
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
                            
                                $('.bxslider').bxSlider({
                                        auto: true,
                                        autoControls: false,
                                        default: 'horizontal',
                                        responsive: true,
                                        speed: 200,
                                });
                                
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
    <script src="<?php echo base_url(); ?>recursos/slippry/src/slippry.min.js"></script>

        <script>
            
            function generar_clave_cliente()
            {
                var inicio_sesion = JSON.parse(<?php echo json_encode($this->session->userdata('ingresado'))?>);
                
                if(inicio_sesion)
                {
                    alert("ya se encuentra registrado");
                }
                else
                {
                    location.href="<?php echo base_url()?>index.php/welcome/registrarse";
                }
                
            }
            
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
                        error: function(event){alert(event.responseText());$("#mensaje_inicio_sesion_usuario").html("Datos incorrectos");},
                    });

            }
            
            function iniciar_session(){
                $('#myModal88').modal('show');
            }
            
        </script>
        
        <script src="http://localhost/masabores/recursos/js/pedido-simple-web.js"></script>
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
        
         
<script type="text/javascript">

var publicidades_inicio_vertical_izquierdo = new Array();
var publicidades_inicio_vertical_derecho = new Array();
var publicidades_inicio_horizontal = new Array();


$(window).load(function(){
    // CARGANDO ARREGLO DE PUIBLICIDADES
    <?php
    
        foreach($publicidades_inicio_vertical_izquierdo as $publicidad)
        {
    ?>
        publicidades_inicio_vertical_izquierdo.push({
            "id":'<?php echo $publicidad["id"] ?>',
            "imagen":'<?php echo $publicidad["imagen"] ?>',
        });
                                    
    <?php
        } 
    
        foreach($publicidades_inicio_vertical_derecho as $publicidad)
        {
    ?>
        publicidades_inicio_vertical_derecho.push({
            "id":'<?php echo $publicidad["id"] ?>',
            "imagen":'<?php echo $publicidad["imagen"] ?>',
        });
                                    
    <?php
        }
     
        foreach($publicidades_inicio_horizontal as $publicidad)
        {
    ?>
        publicidades_inicio_horizontal.push({
            "id":'<?php echo $publicidad["id"] ?>',
            "imagen":'<?php echo $publicidad["imagen"] ?>',
        });
                                    
    <?php
        } 
    ?>

    if(publicidades_inicio_vertical_izquierdo.length > 0)
    {
        var html_publicidades_izquierda='';

        for(var i=0; i < publicidades_inicio_vertical_izquierdo.length;i++)
        {
            
            html_publicidades_izquierda+='<li> \n\
                <a href="<?php echo base_url()?>index.php/welcome/ver_publicidad/'+publicidades_inicio_vertical_izquierdo[i]["id"]+'" target="_blank"><img src="<?php echo base_url()?>recursos/images/publicidades/170_638/'+publicidades_inicio_vertical_izquierdo[i]["imagen"]+'"></a>\n\
            </li>';
        }

        $("#publicidad_inicio_izquierda").html(html_publicidades_izquierda);
    }
    
    if(publicidades_inicio_vertical_derecho.length > 0)
    {
        var html_publicidades_derecha='';

        for(var i=0; i < publicidades_inicio_vertical_derecho.length;i++)
        {
            
            html_publicidades_derecha+='<li> \n\
                <a href="<?php echo base_url()?>index.php/welcome/ver_publicidad/'+publicidades_inicio_vertical_derecho[i]["id"]+'" target="_blank"><img src="<?php echo base_url()?>recursos/images/publicidades/170_638/'+publicidades_inicio_vertical_derecho[i]["imagen"]+'"></a>\n\
            </li>';
        }

        $("#publicidad_inicio_derecha").html(html_publicidades_derecha);
    }

    if(publicidades_inicio_horizontal.length > 0)
    {

        var html_publicidades_horizontal_html='';

        for(var i=0; i < publicidades_inicio_horizontal.length;i++)
        {
            
            html_publicidades_horizontal_html+='<li> \n\
                <a href="<?php echo base_url()?>index.php/welcome/ver_publicidad/'+publicidades_inicio_horizontal[i]["id"]+'" target="_blank"><img src="<?php echo base_url()?>recursos/images/publicidades/729_90/'+publicidades_inicio_horizontal[i]["imagen"]+'"></a>\n\
            </li>';
        }

        $("#publicidad_inicio_central").html(html_publicidades_horizontal_html);

    }
    correr_publicidades();
});


function correr_publicidades()
{
    $("#publicidad_inicio_derecha").slippry({
        "controls":false,
        "hideOnEnd":false,
        "pager":false,
    });

    $("#publicidad_inicio_izquierda").slippry({
        "controls":false,
        "hideOnEnd":false,
        "pager":false,
    });

    $("#publicidad_inicio_central").slippry({
        "controls":false,
        "hideOnEnd":false,
        "pager":false,
    });
}

</script>
  <!-- jQuery -->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
  <!--<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>recursos/slider-destacados/js/libs/jquery-1.7.min.js">\x3C/script>')</script>-->

  <!-- FlexSlider -->
  <script defer src="<?php echo base_url(); ?>recursos/slider-destacados/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

</body>
</html>