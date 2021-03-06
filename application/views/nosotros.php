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
        <!-- //font-awesome icons -->
        <!-- js -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>recursos/css/bootstrap-table.css"/>
        <!-- CSS MARIO -->
        <link href="<?php echo base_url(); ?>recursos/css/agregado-estilos.css" rel="stylesheet"> 
        <script src="<?php echo base_url(); ?>recursos/js/jquery-2.2.3.min.js"></script> 
        <!-- //js --> 
        <!-- web-fonts -->
        <link href='http://www.fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://www.fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
        <link href='http://www.fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
        <link href='http://www.fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>

        <link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>recursos/slippry/dist/slippry.min.css'/>

        <style type="text/css">
		ul.menu {
  clear: both;
  float: left;
  width: 100%;
}
ul.menu {
  clear: both;
  float: left;
  width: 100%;
  list-style: none;
  margin: 0;
  padding: 0;
}
ul.menu li {
   float: left;
}
ul.menu li a {
  padding: .3em;
  display: block;
  text-decoration: none;
  color: #333;
  background: #F4F4F4;
  border-top: 1px solid #7C7C7C;
  border-right: 1px solid #7C7C7C;
  border-bottom: 1px solid #9C9C9C;
}
	</style>
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
                            <?php echo $menu_principal?>
			</div>
		</div>
		
	</div>
        
	<div class="products">	 
            <div class="row">
                <div class="col-md-2">
                    <ul id="publicidad_izquierda">
                    <?php
                    if($publicidades_vertical_izquierdo) { 
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
                                <img src="<?php echo base_url() ?>recursos/images/publicidades/170_638/default.jpg" >
                            </a>
                        </li>
                    <?php }?>
                    </ul>
                </div>
                <div class="col-md-8">
                    <h2 class="text-center" style="margin-bottom: 30px;">Nosotros</h2>
                    <p style="color: #000 !important;"><?php echo $nosotros["contenido"]?></p>
                    <div class="welcome">
                        <div class="container"> 
                            <?php  
                                if($modulo_destacado_abierto=='si'){
                            ?>      

                            <div class="col-md-10">
                                <div class="welcome-info">
                                    <h3 class="w3ls-title">PRODUCTOS DESTACADOS</h3>
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
                                                <!-- INICIO PRODUCTOS DESTACADOS-->
                                                <?php if ($secciones_activas[2]["mostrar"] == "si"){?>

                                                <div id="myTabContent" class="tab-content">
                                                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                                                <div class="tabcontent-grids">  
                                                                        <div id="owl-demo" class="owl-carousel">
                                                                            <?php 

                                                                                foreach ($destacado_1 as $d_1) {
                                                                                    $detalle_seleccionado=$d_1["detalle"];
                                                                                    $detalle=str_replace("<p>", "", $detalle_seleccionado);
                                                                                    $detalle=str_replace("</p>", "", $detalle);
                                                                                    $detalle=  trim($detalle);
                                                                                    $mensaje="<div class='item'>
                                                                                        <div class='glry-w3agile-grids'> 
                                                                                            <img height='200' width='179' src='".base_url()."assets/recursos/images/productos-destacados/".$d_1["imagen_1"]."' alt='img'>
                                                                                            <div class=''>           
                                                                                                <h4><a href='#h'>".$d_1["producto"]."</a></h4>
                                                                                                <p>".$d_1["detalle"]."</p>
                                                                                                <p></p>
                                                                                                <p><a class='btn btn-primary' href='#sharp' onclick = 'agregar_producto(".$d_1["codigo"]." , &#39;&#39;, &#39;".$d_1["producto"]."&#39;, 1,  ".$d_1["precio"].")'>
                                                                                                    <i class='fa fa-cart-arrow-down' aria-hidden='true'> </i> COMPRAR +<br/> $".$d_1["precio"]."
                                                                                                </a></p>


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
                                                                                    $detalle_seleccionado=$d_2["detalle"];
                                                                                    $detalle=str_replace("<p>", "", $detalle_seleccionado);
                                                                                    $detalle=str_replace("</p>", "", $detalle);
                                                                                    $detalle=  trim($detalle);
                                                                                    $mensaje="<div class='item'>
                                                                                        <div class='glry-w2agile-grids'> 
                                                                                            <img height='200' width='179' src='".base_url()."assets/recursos/images/productos-destacados/".$d_2["imagen_1"]."' alt='img'>
                                                                                            <div class=''>           
                                                                                                <h4><a href='#'>".$d_2["producto"]."</a></h4>
                                                                                                <p>".$d_2["detalle"]."</p>
                                                                                                <p></p>
                                                                                                <p><a class='btn btn-primary' href='#sharp' onclick = 'agregar_producto(".$d_2["codigo"]." , &#29;&#29;, &#29;".$detalle."&#29;, 2,  ".$d_2["precio"].")'>
                                                                                                    <i class='fa fa-cart-arrow-down' aria-hidden='true'> COMPRAR +<br/> $".$d_2["precio"]."</i>
                                                                                                </a></p>


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
                                                                                    $detalle_seleccionado=$d_3["detalle"];
                                                                                    $detalle=str_replace("<p>", "", $detalle_seleccionado);
                                                                                    $detalle=str_replace("</p>", "", $detalle);
                                                                                    $detalle=  trim($detalle);
                                                                                    $mensaje="<div class='item'>
                                                                                        <div class='glry-w3agile-grids'> 
                                                                                            <img height='200' width='179' src='".base_url()."assets/recursos/images/productos-destacados/".$d_3["imagen_1"]."' alt='img'>
                                                                                            <div class=''>           
                                                                                                <h4><a href='#'>".$d_3["producto"]."</a></h4>
                                                                                                <p>".$d_3["detalle"]."</p>
                                                                                                <p></p>
                                                                                                <p><a class='btn btn-primary' href='#sharp' onclick = 'agregar_producto(".$d_3["codigo"]." , &#39;&#39;, &#39;".$detalle."&#39;, 3,  ".$d_3["precio"].")'>
                                                                                                    <i class='fa fa-cart-arrow-down' aria-hidden='true'> COMPRAR +<br/> $".$d_3["precio"]."</i>
                                                                                                </a></p>


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
                                                                                    $detalle_seleccionado=$d_4["detalle"];
                                                                                    $detalle=str_replace("<p>", "", $detalle_seleccionado);
                                                                                    $detalle=str_replace("</p>", "", $detalle);
                                                                                    $detalle=  trim($detalle);
                                                                                    $mensaje="<div class='item'>
                                                                                        <div class='glry-w4agile-grids'> 
                                                                                            <img height='200' width='179' src='".base_url()."assets/recursos/images/productos-destacados/".$d_4["imagen_1"]."' alt='img'>
                                                                                            <div class=''>           
                                                                                                <h4><a href='#'>".$d_4["producto"]."</a></h4>
                                                                                                <p>".$d_4["detalle"]."</p>
                                                                                                <p></p>
                                                                                                <p><a class='btn btn-primary' href='#sharp' onclick = 'agregar_producto(".$d_4["codigo"]." , &#49;&#49;, &#49;".$detalle."&#49;, 4,  ".$d_4["precio"].")'>
                                                                                                    <i class='fa fa-cart-arrow-down' aria-hidden='true'> COMPRAR +<br/> $".$d_4["precio"]."</i>
                                                                                                </a></p>


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
                                                                                    $detalle_seleccionado=$d_5["detalle"];
                                                                                    $detalle=str_replace("<p>", "", $detalle_seleccionado);
                                                                                    $detalle=str_replace("</p>", "", $detalle);
                                                                                    $detalle=  trim($detalle);
                                                                                    $mensaje="<div class='item'>
                                                                                        <div class='glry-w5agile-grids'> 
                                                                                            <img height='200' width='179' src='".base_url()."assets/recursos/images/productos-destacados/".$d_5["imagen_1"]."' alt='img'>
                                                                                            <div class=''>           
                                                                                                <h4><a href='#'>".$d_5["producto"]."</a></h4>
                                                                                                <p>".$d_5["detalle"]."</p>
                                                                                                <p></p>
                                                                                                <p><a class='btn btn-primary' href='#sharp' onclick = 'agregar_producto(".$d_5["codigo"]." , &#59;&#59;, &#59;".$detalle."&#59;, 5,  ".$d_5["precio"].")'>
                                                                                                    <i class='fa fa-cart-arrow-down' aria-hidden='true'> COMPRAR +<br/> $".$d_5["precio"]."</i>
                                                                                                </a></p>


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
                                                <!-- FIN PRODUCTOS DESTACADOS-->
                                                <?}?>
                                        </div>  
                                </div>  



                    <!-- FIN PRODUCTOS DESTACADOS -->	
                </div>

                            <?php
                                }
                            ?>
                        </div> 
                    </div> 
                    <div class="col-md-12" style="text-align: center;">
                        <ul id="publicidades_horizontal">
                            <?php
                            if($publicidades_horizontal) { 
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
                                        <img src="<?php echo base_url() ?>recursos/images/publicidades/729_90/default.jpg" >
                                    </a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2">
                    <ul id="publicidad_derecha">
                        <?php
                        if($publicidades_vertical_derecho) { 
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
                                    <img src="<?php echo base_url() ?>recursos/images/publicidades/170_638/default.jpg" >
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
	<!-- footer -->
	<?php echo $footer?>
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
        <div class="agileits-modal modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
            <?php echo $modal_ingreso?>
	</div>
        
        <div class="modal fade" id="modal_carga_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">	    
                <div id="datos_carga" class="modal-content">	      
                </div>
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
        <script src="<?php echo base_url(); ?>assets/recursos/js/bootstrap-table.js"></script>
	<script src="<?php echo base_url(); ?>recursos/js/jquery.throttle.js"></script>
	<script src="<?php echo base_url(); ?>recursos/js/jquery.classycountdown.js"></script>
    <script src="<?php echo base_url(); ?>recursos/slippry/src/slippry.min.js"></script>
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
                        
                        function optionsFormatter(value, row, index) {
                            return [        
                                '<a class="btn btn-primary" href="#sharp" onclick = "agregar_producto('+row.codigo+' , &#39&#39, &#39'+row.descripcion+'&#39;, 1, '+row.precio+')";>',
                                    '<i class="fa fa-cart-arrow-down" aria-hidden="true"> + </i>',
                                '</a>',
                                '<a class="btn btn-primary" href="#sharp" onclick = "ver_imagen(&#39'+row.cod_prod+'&#39;)";>',
                                    '<i class="fa fa-search" aria-hidden="true">ver</i>',
                                '</a>'
                            ].join('');
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
                celdaCantEditable.setAttribute('type', "number");
                celdaCantEditable.setAttribute('class', "form-control input-sm");
                celdaCantEditable.setAttribute('size', "10");
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

//                hilera.appendChild(celdaCodigo);
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
            
            function ver_imagen(cod){            
                if(cod !== null){
                    var url = '<?php echo base_url(); ?>index.php/welcome/ver_imagen_producto/';
                    var codigo = cod;

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                              codigo: codigo
                        },

                        beforeSend: function (event){
                        },

                        success: function (data) {
                                      //event.preventDefault();

                                $('#datos_carga').empty().append(data);
                        },

                        error: function (event){

                        },
                    });

                    $('#modal_carga_producto').modal('show');

                }else{

                }			
	   }
            
        </script>
	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="<?php echo base_url(); ?>recursos/js/jquery.menu-aim.js"> </script>
	<script src="<?php echo base_url(); ?>recursos/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 

<script type="text/javascript">
    var publicidades_vertical_izquierdo = new Array();
    var publicidades_vertical_derecho = new Array();
    var publicidades_horizontal = new Array();

    $(window).load(function(){
    // CARGANDO ARREGLO DE PUIBLICIDADES
    <?php
    
        foreach($publicidades_vertical_izquierdo as $publicidad)
        {
    ?>
        publicidades_vertical_izquierdo.push({
            "id":'<?php echo $publicidad["id"] ?>',
            "imagen":'<?php echo $publicidad["imagen"] ?>',
        });
                                    
    <?php
        } 
        
        foreach($publicidades_vertical_derecho as $publicidad)
        {
    ?>
        publicidades_vertical_derecho.push({
            "id":'<?php echo $publicidad["id"] ?>',
            "imagen":'<?php echo $publicidad["imagen"] ?>',
        });
                                    
    <?php
        }
        
        foreach($publicidades_horizontal as $publicidad)
        {
    ?>
        publicidades_horizontal.push({
            "id":'<?php echo $publicidad["id"] ?>',
            "imagen":'<?php echo $publicidad["imagen"] ?>',
        });
                                    
    <?php
        } 
    ?>

    if(publicidades_vertical_izquierdo.length > 0)
    {
        var html_publicidades_izquierda='';

        for(var i=0; i < publicidades_vertical_izquierdo.length;i++)
        {
            
            html_publicidades_izquierda+='<li> \n\
                <a href="<?php echo base_url()?>index.php/welcome/ver_publicidad/'+publicidades_vertical_izquierdo[i]["id"]+'" target="_blank"><img src="<?php echo base_url()?>recursos/images/publicidades/170_638/'+publicidades_vertical_izquierdo[i]["imagen"]+'"></a>\n\
            </li>';
        }

        $("#publicidad_izquierda").html(html_publicidades_izquierda);
    }
    
    if(publicidades_vertical_derecho.length > 0)
    {
        var html_publicidades_derecha='';

        for(var i=0; i < publicidades_vertical_derecho.length;i++)
        {
            
            html_publicidades_derecha+='<li> \n\
                <a href="<?php echo base_url()?>index.php/welcome/ver_publicidad/'+publicidades_vertical_derecho[i]["id"]+'" target="_blank"><img src="<?php echo base_url()?>recursos/images/publicidades/170_638/'+publicidades_vertical_derecho[i]["imagen"]+'"></a>\n\
            </li>';
        }

        $("#publicidad_derecha").html(html_publicidades_derecha);
    }
    

    if(publicidades_horizontal.length > 0)
    {

        var html_publicidades_horizontal_html='';

        for(var i=0; i < publicidades_horizontal.length;i++)
        {
            
            html_publicidades_horizontal_html+='<li> \n\
                <a href="<?php echo base_url()?>index.php/welcome/ver_publicidad/'+publicidades_horizontal[i]["id"]+'" target="_blank"><img src="<?php echo base_url()?>recursos/images/publicidades/729_90/'+publicidades_horizontal[i]["imagen"]+'"></a>\n\
            </li>';
        }

        $("#publicidades_horizontal").html(html_publicidades_horizontal_html);

    }
    correr_publicidades();
});


function correr_publicidades()
{
    $("#publicidad_derecha").slippry({
        "controls":false,
        "hideOnEnd":false,
        "pager":false,
    });

    $("#publicidad_izquierda").slippry({
        "controls":false,
        "hideOnEnd":false,
        "pager":false,
    });

    $("#publicidades_horizontal").slippry({
        "controls":false,
        "hideOnEnd":false,
        "pager":false,
    });
}
</script>
</body>
</html>