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
        <!-- CSS MARIO -->
        <link href="<?php echo base_url(); ?>recursos/css/agregado-estilos.css" rel="stylesheet"> 
        <!-- SELECT2-->
        <link href="<?php echo base_url(); ?>recursos/select2/css/select2.min.css" rel="stylesheet"> 
        
        
        <style>
            .label-registro{font-weight: normal;color: #000000;};
        </style>
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
            <?php echo $modal_ingreso?>
	</div>
	<script>
            <?php 
                /*if($this->session->userdata("ingresado")){

                }else{
                    echo "$('#myModal88').modal('show');";  
                }*/
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
                            <?php echo $menu_principal?>
			</div>
		</div>
	</div>
	<!-- //header -->
        <!-- sign up-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Registrese en masabores</h3>  
			<div class="login-body" style="width: 100% !important;">
				<form action="<?php echo base_url()?>index.php/Welcome/registrarse" method="post" id="formulario_registro" >
                                    <div class="col-md-4">    
                                        <div class="form-group">
                                            <label for="usuario" class="label-registro">Usuario*</label>
                                            <input type="text" class="user" name="usuario" id="usuario" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="password" class="label-registro">Contraseña*</label>
                                            <input type="password" class="user" name="pass" id="password"  required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="password" class="label-registro">Repetir contraseña*</label>
                                            <input type="password" class="user" name="pass" id="password_2"  required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="correo" class="label-registro">Correo*</label>
                                            <input type="text" class="user" name="correo" id="correo" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="nombre" class="label-registro">Nombre*</label>
                                            <input type="text" class="user" name="nombre" id="nombre" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="apellido" class="label-registro">Apellido*</label>
                                            <input type="text" class="user" name="apellido" id="apellido"  required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="razon-social" class="label-registro">Razon social*</label>
                                            <input type="text" class="user" name="razon_social" id="razon-social" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="nombre-comercial" class="label-registro">Nombre comercial*</label>
                                            <input type="text" class="user" name="nombre_comercial" id="nombre-comercial" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="direccion" class="label-registro">Direccion*</label>
                                            <input type="text" class="user" name="direccion" id="direccion" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="pais" class="label-registro">Pais*</label>
                                            <select class="form-control" name="pais" id="pais" required="" onchange="cambio_pais()">
                                                <option value="0" selected>Seleccione un pais</option>
                                                <?php 
                                                    foreach($paises as $v)
                                                    {
                                                        echo "<option value='".$v["codigo"]."'>".$v["descripcion"]."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4"> 
                                        <div class="form-group">
						<label for="provincia" class="label-registro">Provincia*</label>
                                                <select class="form-control"  name="provincia" id="provincia" onChange="cambio_provincia()" readonly="readonly">
                                                    <option value="seleccione-provincia" selected>Seleccione una provincia</option>
                                                    
						</select>
					</div>
                                    </div>
                                    <div class="col-md-4"> 
					<div class="form-group">
						<label for="localidad" class="label-registro">Localidad*</label>
						<select class="form-control" name="localidad" id="localidad" readonly="readonly">
						</select>
					</div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="codigo-postal" class="label-registro">Codigo Postal*</label>
                                            <input type="text" class="user" name="cod_postal" id="codigo-postal" required="">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="celular" class="label-registro">Celular*</label>
                                            <input type="text" class="user" name="celular" id="celular" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="fijo" class="label-registro">Fijo*</label>
                                            <input type="text" class="user" name="fijo" id="fijo" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
					<div class="form-group">
						<label for="tipo_iva" class="label-registro">Tipo Iva*</label>
						<select class="form-control" name="tipo_iva" id="tipo_iva" required="">
                                                     <?php 
                                                        foreach($tipos_iva as $value)
                                                        {
                                                            echo "<option value='".$value["codigo"]."'>".$value["iva"]."</option>";
                                                        }
                                                    ?>
						</select>
					</div>
                                    </div>
                                    
                                    <div class="col-md-4"> 
					<div class="form-group">
                                            <p><label for="vendedor" class="label-registro">Vendedor</label></p>
						<select class="form-control js-example-basic-single" name="vendedor" id="vendedor" required="">
                                                    <option value="0">No tengo vendedor</option>
                                                    <?php 
                                                        foreach($vendedores as $value)
                                                        {
                                                            echo "<option value='".$value["dni"]."'>".$value["nombre"]." ".$value["apellido"]." - ".$value["dni"]."</option>";
                                                        }
                                                    ?>
						</select>
					</div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="cuil-cuit-dni" class="label-registro">Cuil - Dni*</label>
                                            <input type="text" class="user" name="dni_cuil" id="cuil-cuit-dni" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label for="codigo-masabores" class="label-registro">Codigo Masabores</label>
                                            <input type="text" class="user" name="codigo_masabores" id="masabores">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12" style="text-align:center;">
                                        <div class="col-md-offset-3 col-md-6">
                                            <?php echo $cap['image'];?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-offset-3 col-md-6">
                                            <p class="label-registro">Codigo Captcha<p>
                                            <input type="text" name="captcha" id="captcha" style="width: 50%" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <p style="color: #f00;font-size: 18px;" id="mensaje_error"></p>
                                    </div>
                                    <input type="button" class="btn_submit" onClick="boton_registro()" value="Registrarme">
					<!--<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>-->
				</form>
			</div>  
                        <h6>Usted ya posee una cuenta? <a href="#" onclick="$('#myModal88').modal('show');">Inicie sesion</a> </h6>  
		</div>
	</div>
	<!-- //sign up-page --> 
	
	<!-- coming soon -->
	<!--<div class="soon">
		<div class="container">
			<h3></h3>
			<h4>Genere su presupuesto</h4>  
<!--			<div id="countdown1" class="ClassyCountdownDemo"></div>
		</div> 
	</div>-->
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
	<?php echo $siganos_en?>
	<!-- //subscribe --> 
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
        <!-- SELECT2-->
        <script src="<?php echo base_url(); ?>recursos/select2/js/select2.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
              $(".js-example-basic-single").select2();
            });
        </script>
        
        <script>
            var mensaje_error = "";
            
            function boton_registro()
            {
                var captcha= $("#captcha").val();
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_ajax/validar_captcha_registro",
                    data: {captcha:captcha},

                    beforeSend: function(event){},
                    success: function(data)
                    {
                        data = JSON.parse(data);
                        
                        
                            var correo = $("#correo").val();
                            var usuario = $("#usuario").val();
                            var codigo_postal = $("#codigo-postal").val();
                            var nombre = $("#nombre").val();
                            var celular = $("#celular").val();
                            var fijo = $("#fijo").val();
                            var cuil_cuit_dni = $("#cuil-cuit-dni").val();
                            var razon_social = $("#razon-social").val();
                            var nombre_comercial = $("#nombre-comercial").val();
                            var apellido = $("#apellido").val();
                            var direccion = $("#direccion").val();

                            var provincia = parseInt($("#provincia").val());
                            var localidad = parseInt($("#localidad").val());
                            var pais = parseInt($("#pais").val());
                            var vendedor = $("#vendedor").val();
                            var tipo_iva = $("#tipo_iva").val();

                            var password = $("#password").val();
                            var password_2 = $("#password_2").val();


                            mensaje_error="";

                            if(data == false)
                            {
                                mensaje_error="* Codigo captcha incorrecto<br/>";
                            }
                                
                            var elementos= new Array();

                            elementos.push(["usuario","* Agregar un usuario<br/>"]);
                            elementos.push(["correo","* Agregar un correo<br/>"]);
                            elementos.push(["codigo_postal","* Agregar un codigo postal<br/>"]);
                            elementos.push(["nombre","* Agregar un nombre<br/>"]);
                            elementos.push(["celular","* Agregar un celular<br/>"]);
                            elementos.push(["fijo","* Agregar un fijo<br/>"]);
                            elementos.push(["cuil_cuit_dni","* Agregar un cuil/cuit/dni<br/>"]);
                            elementos.push(["razon_social","* Agregar una razon social<br/>"]);
                            elementos.push(["nombre_comercial","* Agregar un nombre comercial<br/>"]);
                            elementos.push(["apellido","* Agregar un apellido<br/>"]);
                            elementos.push(["direccion","* Agregar un direccion<br/>"]);
                            elementos.push(["password","* Agregar un contraseña<br/>"]);

                            encuentra_marca_errores(elementos);

                            var elementos= new Array();

                            elementos.push(["provincia","* Agregar una provincia<br/>"]);
                            elementos.push(["localidad","* Agregar una localidad<br/>"]);
                            elementos.push(["pais","* Agregar un pais<br/>"]);
                            elementos.push(["tipo_iva","* Agregar un tipo iva<br/>"]);

                            encuentra_marca_errores_tipo_enteros(elementos);

                            if(password != password_2)
                            {
                                mensaje_error= "* Las contraseñas no coinciden";
                            }

                            if(validarEmail(correo) && correo != "")
                            {
                                mensaje_error+= "* Ingrese un correo valido";
                                mensaje_error+="* Usuario existente<br/>"
                                marcar_error("correo");
                            }
                            else
                            {
                                desmarcar_error("correo");
                            }
                            // BUSCANDO ERRORES DE DATABASE

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url()?>index.php/Response_Ajax/getErrorRegistro",
                                data: {usuario:usuario,correo:correo},

                                beforeSend: function(event){},
                                success: function(data)
                                {
                                    data = JSON.parse(data);

                                    if(data["usuario_existente"])
                                    {
                                        mensaje_error+="* Usuario existente<br/>"
                                        marcar_error("usuario");
                                    }
                                    else
                                    {
                                        desmarcar_error("usuario");
                                    }

                                    if(data["correo_existente"])
                                    {
                                        mensaje_error+="* Correo existente<br/>"
                                        marcar_error("correo");
                                    }
                                    else
                                    {
                                        desmarcar_error("correo");
                                    }


                                    $("#mensaje_error").html(mensaje_error);

                                },
                                    error: function(event){alert(event.responseText);},
                              });


                            if(mensaje_error == "")
                            {
                                $("#formulario_registro").submit();
                            }
                        
                    },
                        error: function(event){alert(event.responseText);},
                  });
            }
            
            function encuentra_marca_errores_tipo_enteros(elementos)
            {
                for(var i=0; i < elementos.length;i++)
                {
                    var id = elementos[i][0];
                    var valor= parseInt($("#"+id).val());
                    
                    if(valor == "" || isNaN(valor))
                    {
                        marcar_error(id);
                        mensaje_error+= elementos[i][1];
                    }
                    else
                    {
                        desmarcar_error(id);
                    }
                }
            }
            
            function encuentra_marca_errores(elementos)
            {
                for(var i=0; i < elementos.length;i++)
                {
                    var id = elementos[i][0];
                    var valor= $("#"+id).val();
                    
                    if(valor == "")
                    {
                        marcar_error(id);
                        mensaje_error+= elementos[i][1];
                    }
                    else
                    {
                        desmarcar_error(id);
                    }
                }
            }
            
            function marcar_error(id)
            {
                $("#"+id).css("border-width","1px");
                $("#"+id).css("border-style","solid");
                $("#"+id).css("border-color","#f00");
            }
            
            function desmarcar_error(id)
            {
                $("#"+id).css("border-color","#ccc");
            }
            
            function validarEmail(valor) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
                 return true;
                } else {
                 return false;
                }
            }

            function cambio_provincia()
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_Ajax/obtenerLocalidadesDeProvincia",
                    data:{provincia:$("#provincia").val()},
                    
                    beforeSend: function(event){},
                    success: function(data){
                        
                        data= JSON.parse(data);
                        var html ="";
                        
                        for(var i=0; i < data.length;i++)
                        {
                            html+="<option value='"+data[i]["codigo"]+"'>"+data[i]["localidad"]+"</option>";
                        }
                        
                        $("#localidad").html(html);
                        $("#localidad").removeAttr("readonly");
                    },
                    error: function(event){alert("error");},
                });
            }
            
            function cambio_pais()
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_Ajax/obtenerProvinciasDePais",
                    data:{pais:$("#pais").val()},
                    
                    beforeSend: function(event){},
                    success: function(data){
                        
                        data= JSON.parse(data);
                        var html ="<option value='0'>Seleccione una provincia</option>";
                        
                        for(var i=0; i < data.length;i++)
                        {
                            html+="<option value='"+data[i]["id"]+"'>"+data[i]["provincia"]+"</option>";
                        }
                        
                        $("#provincia").html(html);
                        $("#localidad").html("<option value='0'>Seleccione una localidad</option>");
                        $("#localidad").attr("readonly","");
                        $("#provincia").removeAttr("readonly");
                    },
                    error: function(event){alert("error");},
                });
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