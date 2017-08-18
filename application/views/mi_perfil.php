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
                <div class="col-md-offset-1 col-md-10">
                    <h2 class="text-center" style="margin-bottom: 30px;">Mis Datos</h2>
                        <form action="<?php echo base_url()?>index.php/Welcome/mi_perfil" method="post" id="formulario_registro" >
                                    <div class="col-md-3">    
                                        <div class="form-group">
                                            <label for="usuario" class="label-registro">Usuario*</label>
                                            <input type="text" class=" form-control" name="usuario" id="usuario"  value="<?php echo $mis_datos["usuario"]?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="password" class="label-registro">Contraseña Actual</label>
                                            <input type="password" class=" form-control" name="pass" id="password"  required="" readonly="" value="<?php echo $mis_datos["pass"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="password" class="label-registro">Nueva contraseña</label>
                                            <input type="password" class=" form-control" name="nueva_password" id="nueva_password"  required="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="password" class="label-registro">Repetir nueva contraseña</label>
                                            <input type="password" class=" form-control" name="nueva_password2" id="nueva_password2"  required="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="correo" class="label-registro">Correo*</label>
                                            <input type="text" class="form-control" name="correo" id="correo" required="" value="<?php echo $mis_datos["correo"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="nombre" class="label-registro">Nombre*</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" required="" value="<?php echo $mis_datos["nombre"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="apellido" class="label-registro">Apellido*</label>
                                            <input type="text" class="form-control" name="apellido" id="apellido"  required="" value="<?php echo $mis_datos["apellido"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="razon-social" class="label-registro">Razon social*</label>
                                            <input type="text" class="form-control" name="razon_social" id="razon-social" required="" value="<?php echo $mis_datos["razon_social"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="nombre-comercial" class="label-registro">Nombre comercial*</label>
                                            <input type="text" class="form-control" name="nombre_comercial" id="nombre-comercial" required="" value="<?php echo $mis_datos["nombre_comercial"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="direccion" class="label-registro">Direccion</label>
                                            <input type="text" class="form-control" name="direccion" id="direccion" required="" value="<?php echo $mis_datos["direccion"]?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="codigo-postal" class="label-registro">Codigo Postal</label>
                                            <input type="text" class="form-control" name="cod_postal" id="codigo-postal" required="" value="<?php echo $mis_datos["cod_postal"]?>">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="celular" class="label-registro">Celular*</label>
                                            <input type="text" class="form-control" name="celular" id="celular" required="" value="<?php echo $mis_datos["celular"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="fijo" class="label-registro">Fijo</label>
                                            <input type="text" class="form-control" name="fijo" id="fijo" required="" value="<?php echo $mis_datos["fijo"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
					<div class="form-group">
						<label for="tipo_iva" class="label-registro">Tipo Iva</label>
						<select class="form-control" name="tipo_iva" id="tipo_iva" required="">
                                                     <?php 
                                                        foreach($tipos_iva as $value)
                                                        {
                                                            if($mis_datos["tipo_iva"] == $value["codigo"] )
                                                            {
                                                                echo "<option value='".$value["codigo"]."' selected>".$value["iva"]."</option>";
                                                            }
                                                            else
                                                            {
                                                              echo "<option value='".$value["codigo"]."'>".$value["iva"]."</option>";
                                                            }
                                                        }
                                                    ?>
						</select>
					</div>
                                    </div>
                                    
                                    <div class="col-md-3"> 
					<div class="form-group">
                                            <p><label for="vendedor" class="label-registro">Vendedor</label></p>
						<select class="form-control js-example-basic-single" name="vendedor" id="vendedor" required="">
                                                    <option value="0">No tengo vendedor</option>
                                                    <?php 
                                                        foreach($vendedores as $value)
                                                        {
                                                            if($mis_datos["vendedor"] == $value["dni"])
                                                            {
                                                                echo "<option value='".$value["dni"]."' selected>".$value["nombre"]." ".$value["apellido"]." - ".$value["dni"]."</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='".$value["dni"]."'>".$value["nombre"]." ".$value["apellido"]." - ".$value["dni"]."</option>";
                                                            }
                                                        }
                                                    ?>
						</select>
					</div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="cuil-cuit-dni" class="label-registro">Cuil - Dni</label>
                                            <input type="text" class="form-control" name="dni_cuil" id="cuil-cuit-dni" required="" value="<?php echo $mis_datos["dni_cuil"]?>">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="pais" class="label-registro">Pais</label>
                                            <select class="form-control" name="pais" id="pais" required="" onchange="cambio_pais()">
                                                <option value="0" selected>Seleccione un pais</option>
                                                <?php 
                                                    foreach($paises as $v)
                                                    {
                                                        if($mis_datos["pais"] == $v["codigo"])
                                                        {
                                                            echo "<option value='".$v["codigo"]."' selected>".$v["descripcion"]."</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='".$v["codigo"]."'>".$v["descripcion"]."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3"> 
                                        <div class="form-group">
						<label for="provincia" class="label-registro">Provincia</label>
                                                <select class="form-control"  name="provincia" id="provincia" onChange="cambio_provincia()">
                                                    <option value="seleccione-provincia" selected>Seleccione una provincia</option>
                                                    
                                                    <?php
                                                        foreach($provincias_de_mi_pais as $value)
                                                        {
                                                            if($mis_datos["provincia"] == $value["id"])
                                                            {
                                                                echo "<option value='".$value["id"]."' selected>".$value["provincia"]."</option>";
                                                            }
                                                            else 
                                                            {
                                                                echo "<option value='".$value["id"]."'>".$value["provincia"]."</option>";
                                                            }
                                                        }
                                                    ?>
						</select>
					</div>
                                    </div>
                                    <div class="col-md-3"> 
					<div class="form-group">
						<label for="localidad" class="label-registro">Localidad</label>
						<select class="form-control" name="localidad" id="localidad">
                                                    <?php 
                                                        foreach($localidades_de_mi_provincia as $value)
                                                        {
                                                            if($mis_datos["localidad"] == $value["codigo"])
                                                            {
                                                                echo "<option value='".$value["codigo"]."' selected>".$value["localidad"]."</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='".$value["codigo"]."'>".$value["localidad"]."</option>";
                                                            }
                                                        }
                                                    ?>
						</select>
					</div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="codigo-masabores" class="label-registro">Codigo Masabores</label>
                                            <input type="text" class="form-control" name="codigo_masabores" id="masabores" value="<?php echo $mis_datos["codigo_masabores"]?>">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-12">
                                        <p style="color: #f00;font-size: 18px;" id="mensaje_error"></p>
                                    </div>
                                    
                                    <div class="col-md-offset-4 col-md-4"> 
                                    <input type="button" class="btn_submit" onClick="boton_guardar()" value="Guardar Cambios">
                                    </div>
                        </form>
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
            
            function boton_guardar()
            {
                
                        
                        
                        
                            var correo = $("#correo").val();
                            var usuario = $("#usuario").val();
                            var password = $("#password").val();
                            var password_2 = $("#password_2").val();
                            var nombre = $("#nombre").val();
                            var apellido = $("#apellido").val();
                            var razon_social = $("#razon-social").val();
                            var nombre_comercial = $("#nombre-comercial").val();
                            var celular = $("#celular").val();
                            
                            var codigo_postal = $("#codigo-postal").val();
                            var fijo = $("#fijo").val();
                            var cuil_cuit_dni = $("#cuil-cuit-dni").val();
                            var direccion = $("#direccion").val();
                            var provincia = parseInt($("#provincia").val());
                            var localidad = parseInt($("#localidad").val());
                            var pais = parseInt($("#pais").val());
                            var vendedor = $("#vendedor").val();
                            var tipo_iva = $("#tipo_iva").val();
                            var nueva_password = $("#nueva_password").val();
                            var nueva_password2 = $("#nueva_password2").val();
                            


                            mensaje_error="";

                            
                                
                            var elementos= new Array();

                            elementos.push(["usuario","* Agregar un usuario<br/>"]);
                            elementos.push(["correo","* Agregar un correo<br/>"]);
                            //elementos.push(["codigo_postal","* Agregar un codigo postal<br/>"]);
                            elementos.push(["nombre","* Agregar un nombre<br/>"]);
                            elementos.push(["celular","* Agregar un celular<br/>"]);
                            //elementos.push(["fijo","* Agregar un fijo<br/>"]);
                            //elementos.push(["cuil_cuit_dni","* Agregar un cuil/cuit/dni<br/>"]);
                            elementos.push(["razon_social","* Agregar una razon social<br/>"]);
                            elementos.push(["nombre_comercial","* Agregar un nombre comercial<br/>"]);
                            elementos.push(["apellido","* Agregar un apellido<br/>"]);
                            //elementos.push(["direccion","* Agregar un direccion<br/>"]);
                            elementos.push(["password","* Agregar un contraseña<br/>"]);

                            encuentra_marca_errores(elementos);

                            var elementos= new Array();

                            elementos.push(["provincia","* Agregar una provincia<br/>"]);
                            elementos.push(["localidad","* Agregar una localidad<br/>"]);
                            elementos.push(["pais","* Agregar un pais<br/>"]);
                            elementos.push(["tipo_iva","* Agregar un tipo iva<br/>"]);

                            //encuentra_marca_errores_tipo_enteros(elementos);

                            if(nueva_password != "" && nueva_password != nueva_password2)
                            {
                                mensaje_error= "* La nueva contraseña no coincide";
                                marcar_error("nueva_password");
                                marcar_error("nueva_password2");
                            }
                            else
                            {
                                desmarcar_error("nueva_password");
                                desmarcar_error("nueva_password2");
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
                                url: "<?php echo base_url()?>index.php/Response_Ajax/getErrorCambioDeDatos",
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
                                    
                                    $("#mensaje_error").html(mensaje_error);

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
</body>
</html>