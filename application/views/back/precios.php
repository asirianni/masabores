<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administracion - La Fabrica</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/bootstrap.min.css"/> 
    <!-- MetisMenu CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/metisMenu.min.css"/>
    <!-- Timeline CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/timeline.css"/>
	<!-- Table-master CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/bootstrap-table.css"/>   
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/sb-admin-2.css"/>
    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/morris.css"/>
    	
    <!-- Custom Fonts con el primer estilo traemos todos los iconos-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/css/jquery.datetimepicker.css"/>
	
	
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">La Fabrica Admin v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Datos de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Salida</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- 
                        	<li class="sidebar-search">
                            	<div class="input-group custom-search-form">
	                                <input type="text" class="form-control" placeholder="Buscar...">
	                                <span class="input-group-btn">
	                                	<button class="btn btn-default" type="button">
	                                    	<i class="fa fa-search"></i>
	                                	</button>
	                            	</span>
                            	</div>
                            
                        	</li><!-- /input-group -->	
                        <li>
                            <a href='<?php echo site_url('backoffice/escritorio')?>'><i class="fa fa-dashboard fa-fw"></i> Escritorio</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('backoffice/pedidos/0')?>'><i class="fa fa-table fa-fw"></i> Pedidos</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('backoffice/productos')?>'><i class="fa fa-table fa-fw"></i> Productos</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('backoffice/clientes')?>'><i class="fa fa-table fa-fw"></i> Clientes</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('backoffice/usuarios')?>'><i class="fa fa-table fa-fw"></i> Usuarios</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('backoffice/config')?>'><i class="fa fa-wrench fa-fw"></i> Configuracion</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Productos</h1>
                </div>
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/productos')?>'> ABM Productos </a> |
	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/rubros')?>'> ABM Rubros </a> |
	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/subrubros')?>'> ABM Sub Rubros </a> |
	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/actualizar_precios')?>'> Precios </a> |
	            
                
            </div>
            <br>
            <div class="row">
	            <div class="col-lg-6">
                    <div class="well well-sm">
                    	<?php
							$attributes = array('id' => 'form_Lista_1', 'name' => 'formulario_lista_1');
							echo form_open('backoffice/actualizar_fecha', $attributes);
						?>
                        <h4>Fecha vigencia Lista 1</h4>
                        <div class="form-group">
                        	<label></label>
                            <input name="fecha" id="fecha_lista_1" class="form-control" value="<?php echo $lista_1?>">
                            <input name="lista" type="hidden" value="lista_1"/> 
                            <input type="submit" value="actualizar"/>               
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="well well-sm">
                    	<?php
							$attributes = array('id' => 'form_Lista_2', 'name' => 'formulario_lista_2');
							echo form_open('backoffice/actualizar_fecha', $attributes);
						?>
                        <h4>Fecha vigencia Lista 2</h4>
                        <div class="form-group">
                        	<label></label>
                            <input name="fecha" id="fecha_lista_2" class="form-control" value="<?php echo $lista_2?>">
                            <input name="lista" type="hidden" value="lista_2"/> 
                            <input type="submit" value="actualizar"/>               
                        </div>
                        
                    </div>
                    <?php echo form_close();?>
                </div>
        	</div>
            <div class="row">
	            	<div id="dvData">
	            		
	            		<!-- /.col-lg-12<button onclick="$('#table2excel').tableExport({type:'excel',escape:'false'});" class="btn btn-success">Exportar a Excel</button> -->
		                <table id="table2excel"
		                	   data-toggle="table" 
		                	   data-url="<?php echo base_url(); ?>index.php/backoffice/get_listado_precios" 
		                	   data-show-columns="true" 
		                	   data-search="true" 
		                	   data-show-refresh="true" 
		                	   data-show-toggle="true"
		                	   data-pagination="true" 
		                	   data-show-export="true"
		                	   data-export-types= "['json', 'xml', 'csv', 'txt', 'sql', 'excel']"
		                	   >
		               	
						    <thead>
						    <tr class="noExl">
						        <th data-field="cod_web">cod web</th>
						        <th data-field="cod_fab">cod fabrica</th>
						        <th data-field="producto">producto</th>
						        <th data-field="descripcion">descripcion</th>
						        <th data-field="rubro">rubro</th>
						        <th data-field="lista_1">lista 1</th>
						        <th data-field="lista_2">lista 2</th>
						        <th data-field="options" data-formatter='optionsFormatterEntradas'>Accion</th>
						    </tr>
						    </thead>
						</table>
	                </div>
        	</div>
        </div>
        <div class="modal fade" id="myModalActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  		<div class="modal-dialog">
		    	<div class="modal-content">
			      <div class="modal-header">
			      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> Cerrar</button>
			        <h4 class="modal-title"> Actualizar precios </h4>
			      </div>
		      		<div class="modal-body">
		      			<label>Codigo web</label>
			      		<input id="codigo_id" name='codigo' class='form-control'  disabled/>
			      		<label>Producto</label>
			      		<input id="producto_id_2" name='producto' class='form-control'  disabled/>
			      		<label>Lista 1</label>
			      		<input id="lista_1_id" type='number' name='lista_1' class='form-control' required='required' placeholder='lista 1'/>
			      		<label>Lista 2</label>
		          		<input id="lista_2_id" type='number' name='lista_2' class='form-control' required='required' placeholder='lista 2'/>  	
			      		<div class="modal-footer">				
		                    <div class="form-group">
		                        <div class="col-md-12 text-right">
		                            <input onclick="actualizar_precio_producto();" class='btn btn-medium btn-default btn-square' value='Actualizar'/>
		                        </div>
		                    </div> 	
					    </div>
					</div>
				</div>
			</div>
     	</div>
        <!-- /#page-wrapper -->
 <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/metisMenu.min.js"></script>
    
    <!-- Table Master -->
	<script src="<?php echo base_url(); ?>assets/recursos/js/bootstrap-table.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/tableExport.js"></script>
	<script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/jquery.base64.js"></script>
	<script src="<?php echo base_url(); ?>assets/recursos/js/jquery.datetimepicker.js"></script>
    
    <script>
		$( document ).ready(function() {

		});

		jQuery('#fecha_lista_1').datetimepicker({
			 timepicker:false,
			 format:'Y-m-d',
			 mask:true,
			 //minDate:0 // '9999/19/39 29:59' - digit is the maximum possible for a cell
			 
		});
		jQuery('#fecha_lista_2').datetimepicker({
			 timepicker:false,
			 format:'Y-m-d',
			 mask:true,
			 //minDate:0 // '9999/19/39 29:59' - digit is the maximum possible for a cell
			 
		});
    
	</script>
   	<script>
     
	     function optionsFormatterEntradas(value, row, index) {
			return [        
				'<a href="#sharp" onclick = "actualizar('+row.cod_web+', &#39 '+row.producto+'&#39, '+row.lista_1+', '+row.lista_2+')";>',
					'actualizar',
				'</a>'
			].join('');
		 }

		 function actualizar(codigo, desc, lista_1, lista_2){
			 $('#myModalActualizar').modal('show');
			 
			 document.getElementById('codigo_id').value=codigo;
			 document.getElementById('producto_id_2').value=desc;
			 document.getElementById('lista_1_id').value=lista_1;
			 document.getElementById('lista_2_id').value=lista_2;
			 //var direccion= " ?>index.php/backoffice/ver_pedido/"+pedido;
			 //this.location.href=direccion;
		 }
		 function actualizar_precio_producto(){
		 	var url = '<?php echo base_url(); ?>index.php/backoffice/actualizar_precio_producto/';
			
			var codigo = document.getElementById('codigo_id').value;
			var lista_1 = document.getElementById('lista_1_id').value;
			var lista_2 = document.getElementById('lista_2_id').value;
			
			 $.ajax({
				  type: "POST",
				  url: url,
				  data: {
					codigo: codigo,
					lista_1: lista_1,
					lista_2: lista_2
				  },

				  beforeSend: function (event){
				  },

				  success: function (data) {
						event.preventDefault();
						$('#myModalActualizar').modal('hide');
				  },

				  error: function (event){
					
				  },

				});
			 
			 
			 //document.getElementById('codigo_id').value=codigo;
			 //document.getElementById('producto_id_2').value=desc;
			 //document.getElementById('lista_1_id').value=lista_1;
			 //document.getElementById('lista_2_id').value=lista_2;
			 //var direccion= " ?>index.php/backoffice/ver_pedido/"+pedido;
			 //this.location.href=direccion;
		 }
		 
     </script>
</body>

</html>