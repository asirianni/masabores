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
            <div class="w3ls-header">
		<?php echo $menu_superior?>
                        
            </div>
            <?php echo $parte_buscador?>
            <div class="header-three">
                <div class="container">
                    <div class="menu" >

                    </div>

                </div>
		
            </div>
	</div>
        <br>
        
        <div class="container">
            <h2 class="light text-center">CONFIRME SU PRESUPUESTO</h2>
        </div>
        <br><br>

        <div class="container">

            <div class="">
                    <div class="row">

                                    <div class="col-sm-5">
                                            <?php
                                                    //if ($nuevo_cliente) {echo "<div class='resumen'> Se registro correctamente, defina la forma de entrega </div><br>";}
                                                    if ($validar_usuario) {
                                                            echo "<label>".$this->session->userdata('nombre')." ".$this->session->userdata('apellido')."</label>";
                                                            echo "<h5>Domicilio: ".$this->session->userdata('direccion')."</h5>";
                                                            echo "<h5>Localidad: ".$this->session->userdata('localidad')."</h5>";
                                                            echo "<h5>Email: ".$this->session->userdata('correo')."</h5>";
//                                                            echo "<h5>cel: ".$this->session->userdata('celular')."</h5>";
//                                                            echo "<h5>tel: ".$this->session->userdata('fijo')."</h5>";

                                                            echo "<br>";
                                                            echo "<label>FORMA DE ENTREGA</label>";
                                                            echo "<h5>Definir la forma de entrega.</h5>";
                                                            echo "<br>";
                                                            echo "<div class='toggle'>";
                                                            echo "	<h3 class='toggle-heading' >Entrega - Reparto</h3>";
                                                            echo "	<div class='toggle-content' style='display: none;' >";
                                                            echo "      <label id='direccion'> DESTINO:</label>";
                                                            echo "		<div class='row'>";
                                                            echo "			<div class='col-md-6'>";
                                                            if ($lista_direcciones!=null) {
                                                                    echo "<select id='lista_direccion_detalle'>";
                                                                            //foreach($lista_direcciones as $d){
                                                                            //	echo "<option value='".$d["codigo"]."'>".$d["direccion"]."</option>";
                                                                            //}

                                                                    echo "<option value='".$this->session->userdata('localidad')."'>".$this->session->userdata('direccion')."</option>";

                                                                    echo "</select>";

                                                            }else{

                                                                    echo "				<select id='lista_direccion_detalle'>";
                                                                    echo "					<option value='".$this->session->userdata('localidad')."'>".$this->session->userdata('direccion')."</option>";
                                                                    echo "				</select>";
                                                            }
                                                            echo "      	</div>";
                                                            echo "			<div class='col-md-6'>";
                                                            //echo "				<input type='submit' class='btn btn-medium btn-default btn-square' value='cambiar direccion' onclick = 'cargar_modal_direccion()';>";
                                                            echo "      	</div>";
                                                            echo "      </div>";
                                                            echo "		<label>ENTREGA</label>";
                                                            echo "		<div class='form-group'>";
                                                            echo "			<input type='text' name='fecha' class='form-control' required='required' placeholder='Fecha' id ='datepicker_delivery' onFocus='activar_seleccion(1);'/>";
                                                            echo "		</div>";
                                                            echo "		<div class='form-group'>";
                                                            //echo "			<input type='text' name='hora' class='form-control' required='required' placeholder='Hora' id ='datepicker_delivery_hora'>";
                                                            echo "			<select name='hora' class='form-control' required='required' id='delivery_hora'>";
                                                            echo " 				<option value='nada'>Seleccione Horario </option>";
                                                            echo "				<option value='10 a 11'> 10 hs a 11 hs </option>";
                                                            echo "				<option value='11 a 12'> 11 hs a 12 hs </option>";
                                                            echo "				<option value='12 a 13'> 12 hs a 13 hs </option>";
                                                            echo "				<option value='13 a 14'> 13 hs a 14 hs </option>";
                                                            echo "				<option value='14 a 15'> 14 hs a 15 hs </option>";
                                                            echo "				<option value='15 a 16'> 15 hs a 16 hs </option>";
                                                            echo "				<option value='16 a 17'> 16 hs a 17 hs </option>";
                                                            echo "				<option value='17 a 18'> 17 hs a 18 hs </option>";
                                                            echo "				<option value='18 a 19'> 18 hs a 19 hs </option>";
                                                            echo "				<option value='19 a 20'> 19 hs a 20 hs </option>";
                                                            echo "				<option value='20 a 21'> 20 hs a 21 hs </option>";
                                                            echo "			</select>";
                                                            echo "		</div>";
                                                            echo "		<label>DETALLE DE ENTREGA</label>";
                                                            echo "		<div class='form-group'>";
                                                            echo "			<textarea rows='4' cols='50' class='form-control' id='detalle_id_envio_entrega' > Borre esta linea e ingrese los datos que completen la entrega. Localidad, direccion transporte</textarea>";
                                                            echo "		</div>";
                                                            echo "	</div>";
                                                            echo "</div>";
                                                            echo "<div class='toggle'>";
                                                            echo "	<h3 class='toggle-heading' >Retira de Local</h3>";
                                                            echo "	<div class='toggle-content' style='display: none;'>";
                                                            echo "		<label>DEFINIR LOCAL</label>";
                                                            echo "		<br>";
                                                            echo "		<select name='local' class='form-group' id='local_id_2'>";
                                                                                            for($i=0;$i<count($locales);$i++) {
                                                                                                    echo "<option value ='".$locales[$i]->cod_web."'>".$locales[$i]->localidad." - ".$locales[$i]->direccion."</option>";
                                                                                            }
                                                            echo "		</select>";
                                                            echo "		<br>";
                                                            echo "		<label>ENTREGA</label>";
                                                            echo "		<div class='form-group'>";
                                                            echo "			<input type='text' name='fecha' class='form-control' required='required' placeholder='Fecha' id ='datepicker_retiro' onFocus='activar_seleccion(2);'/>";
                                                            echo "		</div>";
                                                            echo "		<div class='form-group'>";
                                                            //echo "			<input type='text' name='hora' class='form-control' required='required' placeholder='Hora' id ='datepicker_retiro_hora'>";
                                                            echo "			<select name='hora' class='form-control' required='required' id='retiro_hora'>";
                                                            echo " 				<option value='nada'>Seleccione Horario </option>";
                                                            echo "				<option value='10 a 11'> 10 hs a 11 hs </option>";
                                                            echo "				<option value='11 a 12'> 11 hs a 12 hs </option>";
                                                            echo "				<option value='12 a 13'> 12 hs a 13 hs </option>";
                                                            echo "				<option value='13 a 14'> 13 hs a 14 hs </option>";
                                                            echo "				<option value='14 a 15'> 14 hs a 15 hs </option>";
                                                            echo "				<option value='15 a 16'> 15 hs a 16 hs </option>";
                                                            echo "				<option value='16 a 17'> 16 hs a 17 hs </option>";
                                                            echo "				<option value='17 a 18'> 17 hs a 18 hs </option>";
                                                            echo "				<option value='18 a 19'> 18 hs a 19 hs </option>";
                                                            echo "				<option value='19 a 20'> 19 hs a 20 hs </option>";
                                                            echo "				<option value='20 a 21'> 20 hs a 21 hs </option>";
                                                            echo "			</select>";
                                                            echo "		</div>";
                                                            echo "	</div>";
                                                            echo "</div>";
                                                            echo "<br>";
                                                            echo "<label>FORMA DE PAGO</label>";
                                                            echo "<select id='forma_pago' name='pago' class='form-group'>";
                                                            echo "	<option value='contado'>Contado</option>";
                                                            echo "	<option value='cuenta_corriente'>Cuenta Corriente</option>";
                                                            echo "	<option value='transferencia'>Trasferencia</option>";
                                                            echo "	<option value='cheque 15 dias'>Cheque a 15 dias</option>";
                                                            echo "	<option value='cheque 30 dias'>Cheque a 30 dias</option>";
                                                            echo "	<option value='cheque 60 dias'>Cheque a 60 dias</option>";
                                                            echo "	<option value='cheque 90 dias'>Cheque a 90 dias</option>";
                                                            echo "</select>";
                                                            echo "<br>";
                                                            $attributes = array('id' => 'registar_pedido', 'name' => 'form_regis_pedido');
                                                            echo form_open('welcome/registrar_pedido', $attributes);
                                                                    echo "<input id='cliente_reg_id' type='hidden' name='cliente' value='".$this->session->userdata('codigo')."'>";
                                                                    echo "<input id='direccion_reg_id' type='hidden' name='cod_direccion'>";
                                                                    echo "<input id='localidad_reg_id' type='hidden' name='localidad' value='".$this->session->userdata('localidad')."'>";
                                                                    echo "<input id='local_reg_id' type='hidden' name='cod_local_retiro'>";
                                                                    echo "<input id='total_reg_id' type='hidden' name='total' value='total'>";
                                                                    echo "<input id='estado_reg_id' type='hidden' name='estado' value='1'>";
                                                                    echo "<input id='fecha_reg_id' type='hidden' name='fecha' value='fecha'>";
                                                                    echo "<input id='envio_reg_id' type='hidden' name='envio' value='envio'>";
                                                                    echo "<input id='pago_reg_id' type='hidden' name='pago' value='contado'>";
                                                                    echo "<input id='pedido_reg_id' type='hidden' name='pedido' value='pedido'>";
                                                                    echo "<input id='detalle_envio_reg_id' type='hidden' name='detenvio'>";
                                                                    echo "<button type='button' class='btn btn-medium btn-default btn-square' 
                                                                            onclick='validar_form_registrar();'>Proceder a la compra</button>";
                                                            echo form_close();
                                                    }
                                                    //else{
//                                                            echo "<div class='toggle'>";
//                                                            echo "	<h3 class='toggle-heading'>Tengo cuenta ingresar</h3>";
//                                                            echo " 	<div class='toggle-content' style='display: none;'>";
//                                                                    $attributes = array('id' => 'regcliente');
//                                                            echo form_open('welcome/verificar_cliente', $attributes);
//                                                            echo "		<label>Ingreso de usuario</label>";
//                                                            echo "		<h5>Carga tus datos para continuar con tu compra.</h5>";
//                                                            echo "		<div class='form-group'>";
//                                                            echo "			<input type='email' name='email' class='form-control' required='required' placeholder='Email'>";
//                                                            echo "        	<label id='error_nombre_id_reg'>".$error_usuario."</label>";
//                                                            echo "		</div>";
//                                                            echo "		<div class='form-group'>";
//                                                            echo "			<input type='password' name='password' class='form-control' required='required' placeholder='Password'>";
//                                                            echo "        	<label id='error_nombre_id_reg'>".$error_pass."</label>";
//                                                            echo "		</div>";
//                                                            echo "		<div class='form-group'>";
//                                                            echo "			<input type='submit' class='btn btn-medium btn-dark btn-square' value='Login'>";
//                                                            echo "			<a onClick='recuperar_datos()'> Olvido sus datos ? </a>";
//                                                            echo form_close();
//                                                            echo "		</div>";
//                                                            echo "	</div>";
//                                                            echo "</div>";
//                                                            echo "<div class='toggle'>";
//                                                            echo "	<h3 class='toggle-heading'>No tengo cuenta</h3>";
//                                                            echo "	<div class='toggle-content' style='display: none;'>";
//                                                                     $attributes = array('id' => 'newcliente');
//                                                            echo form_open('welcome/alta_cliente', $attributes);
//                                                            echo "		<label>REGISTRATE</label>";
//                                                            echo "		<h5>Si no estas registrado, hacelo para continuar con tu compra.</h5>";
//                                        echo "  	<div class='form-group'>";
//                                        echo "        <input type='text' id='nombre_id_reg' name='nombre' class='form-control' required='required' placeholder='Nombre'>";
//                                        echo "        <label id='error_nombre_id_reg'></label>";
//                                        echo "   </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='apellido_id_reg' name='apellido' class='form-control' required='required' placeholder='Apellido'>";
//                                        echo "        <label id='error_apellido_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='email' id='user_id_reg' name='correo' class='form-control' required='required' placeholder='Email'>";
//                                        echo "       <label id='error_user_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='pass_id_reg' name='pass' class='form-control' required='required' placeholder='Password'>";
//                                        echo "         <label id='error_pass_id_reg'></label>";
//                                        echo "    </div>";	                        
//                                        echo "    <div class='form-group'>";
//                                        echo "        <select class='form-control' name='sexo' id='sexo_id_reg' required='required'>";
//                                                        echo "          <option>Seleccione Sexo </option>";
//                                                        echo "          <option>Masculino</option>";
//                                                        echo "          <option>Femenino</option>";
//                                                        echo "      	</select>";
//                                                        echo "      	<label id='error_sexo_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='datepicker' name='nacimiento' class='form-control' required='required' placeholder='Fecha Nac.'>";
//                                        echo "        <label id='error_datepicker_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='cel_id_reg' name='celular' class='form-control' required='required' placeholder='Celular'>";
//                                        echo "        <label id='error_cel_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='fijo_id_reg' name='fijo' class='form-control' required='required' placeholder='Tel. Fijo'>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='dni_id_reg' name='dni' class='form-control' required='required' placeholder='CUIT/CUIL/DNI'>";
//                                        echo "        <label id='error_dni_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='direccion_id_reg' name='direccion' class='form-control' required='required' placeholder='Direccion'>";
//                                        echo "        <label id='error_direccion_id_reg'></label>";
//                                        echo "    </div>";
//                                        echo "    <div class='form-group'>";
//                                        echo "        <input type='text' id='localidad_id_reg' name='localidad' class='form-control' required='required' placeholder='Localidad'>";
////				                    echo "        <select class='form-control' name='localidad' id='localidad_id_reg'>";
////                                                    echo "          <option>Localidad</option>";
////                                                                        for($i=0;$i<count($localidades);$i++) {
////                                                                                //echo "<option value //='".$localidades[$i]->codigo."'>".$localidades[$i]->descripcion."</option>";
////                                                                                echo "<option value =".$localidades[$i]->codigo.">".$localidades[$i]->descripcion."</option>";
////                                                                        }				
////
////                                                    echo "         </select>";
//                                        echo "      <label id='error_localidad_id_reg'></label>";
//                                        echo "    </div>";
//                                            echo "    <div class='form-group'>";
//                                        echo "        <input type='submit' class='btn btn-medium btn-dark btn-square' value='Registrate' onclick='validar_formulario_registrar_cliente();'/>";
//                                        echo "    </div>";   
//                                                            echo form_close();
//                                                            echo "</div>";
//                                                            echo "</div>";
//                                                    } 

                                            ?>
                </div>
            <div class="col-sm-6 col-sm-offset-1">
                    <div class="resumen">
                    <label>RESUMEN</label>
                                    <table class="table table-hover">
                          <thead>
                                  <tr>
                                    <th><h5>CODIGO</h5></th>
                                    <th><h5>PRODUC.</h5></th>
                                    <th><h5>PRECIO</h5></th>
                                    <th><h5>TOTAL</h5></th>
                                  </tr>
                          </thead>

                        <tbody id="table_body">

                        </tbody>

                        <tfoot>
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="hidden-xs text-center"><strong><strong>Total $<span id="total_final">0</span></strong></strong></td>
                                  </tr>
                        </tfoot>
                      </table>
                  </div>
                </div>

            <?php
            /*
            if($validar_usuario) {
                    echo "<div class='modal fade' id='modal_direccion' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                            echo "	  <div class='modal-dialog' role='document'>";
                            echo "	    <div class='modal-content'>";
                            echo "	      <div class='modal-header'>";
                            echo "	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span> </button>";
                            echo "	      </div>";
                            echo "	      <div class='modal-body'>";
                            echo "			<input id='cliente_id_direccion' type='hidden' value='".$this->session->userdata('codigo')."'>";
                            echo "        	<input type='text' id='direccion_nueva' name='' class='form-control' required='required' placeholder='Direccion'>";
                            echo "		  	<label>DEFINIR LOCALIDAD</label>";
                            echo "			<select name='localidad' class='form-control' required='required' id='localidad_id'>";
                            echo "				<option value='nada'>seleccione localidad</option>";
                                                                    for($i=0;$i<count($localidades);$i++) {
                                                                            echo "<option value ='".$localidades[$i]->codigo."'>".$localidades[$i]->descripcion."</option>";
                                                                    }
                            echo "			</select>";
                            echo "		  	<label>DEFINIR LOCAL</label>";
                            echo "			<select name='local' class='form-control' required='required' id='local_id_1'>";
                            echo "				<option value='nada'>seleccione local</option>";
                            echo "			</select>";
                            echo "			<label>SELECCIONE ZONA | COSTO DE ENVIO</label>";
                            echo "				<select name='costo' class='form-control' required='required' id='envio_id_1'>";
                            echo "					<option value='nada'>seleccione costo</option>";
                            echo "				</select>";
                            echo "        <br>";
                            echo "				<button class='btn btn-medium btn-default btn-square' onclick = 'enviar_datos_ajax()';>Seleccionar</button>";
                    echo "        </div>";
                            echo "     </div>";
                            echo "   </div>";
                            echo "   </div>";
            }
            */
    ?>

    <?php
//			
//	        	if($validar_usuario) {
//		        	echo "<div class='modal fade' id='modal_direccion' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
//					echo "	  <div class='modal-dialog' role='document'>";
//					echo "	    <div class='modal-content'>";
//					echo "	      <div class='modal-header'>";
//					echo "	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span> </button>";
//					echo "	      </div>";
//					echo "	      <div class='modal-body'>";
//					echo "			<input id='cliente_id_direccion' type='hidden' value='".$this->session->userdata('codigo')."'>";
//					echo "        	<input type='text' id='direccion_nueva' name='' class='form-control' required='required' placeholder='Direccion'>";
//					echo "		  	<label>DEFINIR LOCALIDAD</label>";
//					echo "			<select name='localidad' class='form-control' required='required' id='localidad_id'>";
//					echo "				<option value='nada'>seleccione localidad</option>";
//										for($i=0;$i<count($localidades);$i++) {
//											echo "<option value ='".$localidades[$i]->codigo."'>".$localidades[$i]->descripcion."</option>";
//										}
//					echo "			</select>";
//					//echo "		  	<label>ZONA ENTREGA</label>";
//					//echo "			<select name='zona' class='form-control' required='required' id='zona_id_1'>";
//					//echo "				<option value='nada'>Costo entrega</option>";
//					//echo "			</select>";
//					
//					echo "        <br>";
//					echo "				<button class='btn btn-medium btn-default btn-square' onclick = 'registrar_direccion_ajax()';>Seleccionar</button>";
//		        	echo "        </div>";
//					echo "     </div>";
//					echo "   </div>";
//					echo "   </div>";
//	        	}else{
//	        		echo "<div class='modal fade' id='recuperar_datos' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
//					echo "	  <div class='modal-dialog' role='document'>";
//					echo "	    <div class='modal-content'>";
//					echo "	      <div class='modal-header'>";
//					echo "	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span> </button>";
//					echo "	      </div>";
//					echo "	      <div class='modal-body'>";
//					echo "			<input id='correo_id_recuperacion' type='email' class='form-control' required='required' placeholder='Introduzca su correo electronico'>";
//					echo "        <br>";
//					echo "			<button class='btn btn-medium btn-default btn-square' onclick = 'verificar_correo_recuperacion();';>Recuperar</button>";
//					echo "        </div>";
//					echo "     </div>";
//					echo "   </div>";
//					echo "   </div>";
//	        	}
//	        	
//        	?>



                            </div>

                    </div>
        </div>
       
        <br><br><br>
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