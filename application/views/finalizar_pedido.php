<!DOCTYPE html>
<html lang="en">
    <script>
        var envio_seleccionado=0;       
    </script>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>recursos/css/fajar.css"/>
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>recursos/images/t_.ico"/>
        <!-- //Custom Theme files -->
        <!-- font-awesome icons -->
        <link href="<?php echo base_url(); ?>recursos/css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->
        <!-- js -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>recursos/css/bootstrap-table.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/css/jquery.datetimepicker.css"/>
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
            
            <div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
                                    <h1><a href="<?php echo base_url(); ?>"><span><img src='<?php echo base_url(); ?>assets/recursos/images/logo_1.png' alt='img'></span></a></h1>
                                        <br>
					<h6></h6> 
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

<!--					<div class="cart">
                                            <a href="<?php echo base_url(); ?>index.php/welcome/busqueda_rubro/0" >
                                                <h3> 
                                                    <div class="total">
                                                          <span class="simpleCart_total"></span>	(<span id="simpleCart_quantity" class="simpleCart_quantity"></span> )
                                                       <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> $ <span id="total_final_menu">0</span>
                                                    </div>
                                                </h3>
                                            </a>
					</div>-->
					
				</div> 
				
			</div>		
		</div>
		
	</div>
	
        
        <div class="container">
            <h2 class="light text-center">NOS PONDREMOS EN CONTACTO POR SU PRESUPUESTO!</h2>
        </div>
        <br><br>

        
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
                                                                <th style="">CODIGO</th>  
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
		                            	echo form_open('welcome/ver_pedido', $attributes);
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
        
        <div class="modal fade" id="modal_carga_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">	    
                <div id="datos_carga" class="modal-content">	      
                </div>
            </div>
        </div>
        
        
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>2016 Desarrollado por <a href="https://www.facebook.com/Ordene-su-negocio-737763829635258/"> Adrian Sirianni.</a></p>
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
        <script src="<?php echo base_url(); ?>assets/recursos/js/plugins.js"></script>
	<script src="<?php echo base_url(); ?>assets/recursos/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/recursos/js/jquery.datetimepicker.js"></script>
        
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
                                
                                jQuery('#datepicker_delivery').datetimepicker({
                                        timepicker:false,
                                        format:'Y-m-d',
                                        mask:true,
                                        minDate:0 // '9999/19/39 29:59' - digit is the maximum possible for a cell

                               });

                               jQuery('#datepicker_delivery_hora').datetimepicker({
                                        datepicker:false,
                                        format:'H:i',
                                        mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
                               });

                               jQuery('#datepicker_retiro').datetimepicker({
                                        timepicker:false,
                                        format:'Y-m-d',
                                        mask:true,
                                        minDate:0/// '9999/19/39 29:59' - digit is the maximum possible for a cell
                               });

                               jQuery('#datepicker_retiro_hora').datetimepicker({
                                        datepicker:false,
                                        format:'H:i',
                                        mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
                               });

			});
                        
                        function optionsFormatter(value, row, index) {
                            return [        
                                '<a class="btn btn-primary" href="#sharp" onclick = "agregar_producto('+row.codigo+' , &#39'+row.cod_prod+'&#39;, &#39'+row.descripcion+'&#39;, 1, '+row.precio+')";>',
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

                hilera.appendChild(celdaCodigo);
                hilera.appendChild(celdaDesc);
                //hilera.appendChild(celdaCant);
                hilera.appendChild(celdaPrec);
                hilera.appendChild(celdaTot);
                //hilera.appendChild(celdaEliminar);
                //hilera.appendChild(celdaMas);
                //hilera.appendChild(celdaMenos);

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
                               location.href= "<?php echo base_url()."index.php/welcome/checkout"?>";
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
           
           function activar_seleccion(seleccion){
                //cuando el usuario selecciona la opcion de delyveri, trae la seleccion numero 1
                //con ese dato procede a validar el envio de datos a la hora de comprar.
                envio_seleccionado=seleccion;
            }
           
           function validar_form_registrar() {	
                if(envio_seleccionado!=0){
                        if(envio_seleccionado==1){
                                if(document.getElementById('datepicker_delivery').value!=""){
                                        if(document.getElementById('delivery_hora').value!="nada"){
                                                document.getElementById('direccion_reg_id').value=$('#lista_direccion_detalle option:selected').text();
                                                document.getElementById('localidad_reg_id').value=document.getElementById('lista_direccion_detalle').value;
                                                document.getElementById('detalle_envio_reg_id').value=document.getElementById('detalle_id_envio_entrega').value;
                                                fecha=document.getElementById('datepicker_delivery').value;
                                                hora=document.getElementById('delivery_hora').value;
                                                dia=fecha+" "+hora;
                                                document.getElementById('fecha_reg_id').value=dia;
                                                document.getElementById('envio_reg_id').value=envio_seleccionado;//document.getElementById('envio_id_1').value;
                                                enviar_formulario_registracion_pedido();
                                        }else{alert("Complete el campo hora de entrega");}
                                }else{alert("Complete el campo fecha de entrega");}				
                        }else{
                                if(document.getElementById('datepicker_retiro').value!=""){
                                        if(document.getElementById('retiro_hora').value!="nada"){
                                                document.getElementById('local_reg_id').value=document.getElementById('local_id_2').value;
                                                fecha=document.getElementById('datepicker_retiro').value;
                                                hora=document.getElementById('retiro_hora').value;
                                                dia=fecha+" "+hora;
                                                document.getElementById('fecha_reg_id').value=dia;
                                                enviar_formulario_registracion_pedido();
                                        }else{alert("Complete el campo hora de retiro");}
                                }else{alert("Complete el campo fecha de retiro");}
                        }

                }else{
                        alert("Seleccione fecha de entrega o fecha de retiro");
                }
					
            }
            
            function enviar_formulario_registracion_pedido(){
                document.getElementById('total_reg_id').value=total;
                var pedido_json = JSON.stringify(pedido);
                document.getElementById('pedido_reg_id').value=pedido_json;
                document.getElementById('pago_reg_id').value=document.getElementById('forma_pago').value;
                document.form_regis_pedido.submit();
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
</body>
</html>