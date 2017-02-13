<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administracion</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/bootstrap.min.css"/> 
    <!-- MetisMenu CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/metisMenu.min.css"/>
    <!-- Timeline CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/timeline.css"/>
	<!-- Table-master CSS -->
	   
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/sb-admin-2.css"/>
    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/morris.css"/>
    	
    <!-- Custom Fonts con el primer estilo traemos todos los iconos-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/recursos/backoffice/css/style.css"/>
	<!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/css/dataTables.bootstrap.css">
        <?php /*foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; */?>
    
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/select2/css/select2.min.css">
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
                <a class="navbar-brand" href="index.html">Admin v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> Datos de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li> -->	
                        <li><a href='<?php echo site_url('backoffice/salida')?>'><i class="fa fa-sign-out fa-fw"></i> Salida</a>
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
<!--                        <li>
                            <a href='<?php echo site_url('backoffice/abm_rubros')?>'><i class="fa fa-table fa-fw"></i> Home</a>
                        </li>
                        
                        -->
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
                            <a href='<?php echo site_url('backoffice/abm_precios_administrador')?>'><i class="fa fa-table fa-fw"></i> Precios</a>
                        </li>
<!--                        <li>
                            <a href='<?php echo site_url('backoffice/usuarios')?>'><i class="fa fa-table fa-fw"></i> Usuarios</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('backoffice/config')?>'><i class="fa fa-wrench fa-fw"></i> Configuracion</a>-->
                        <!--</li>-->
                        <li>
                            <a href='<?php echo site_url('backoffice/config')?>'><i class="fa fa-wrench fa-fw"></i> Configuracion</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clientes</h1>
                </div>
                <!-- /.navbar-static-side<i class="fa fa-arrow-circle-right"> </i><a href='<?php //echo site_url('backoffice/nuevos_clientes')?>'> Nuevos Clientes </a> | -->
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/clientes')?>'> ABM Clientes </a> |
<!--	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/localidades')?>'> ABM Localidades </a> |-->
	            
                <!-- /.col-lg-12 -->
            </div>
            
    <div class="row">
	            <!--<?php echo $output; ?>-->
        <a style="margin-top: 20px;margin-bottom: 20px;" href="#" class="btn btn-large btn-default" onclick="$('#modal-agregar-cliente').modal('show');"><i class="fa fa-plus"></i> Agregar Cliente</a>
        <div  class="box">
                <div class="box-header">
                    <h3 class="box-title">
                    </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="hidden">codigo</th>
                        <th>Usuario</th>
                        <th class='hidden'>Correo</th>
                        <th>Pass</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th class='hidden'>Razon social</th>
                        <th class='hidden'>Nombre comercial</th>
                        <th class='hidden'>Direccion</th>
                        <th class='hidden'>Provincia</th>
                        <th class='hidden'>Localidad</th>
                        <th class='hidden'>Cod_postal</th>
                        <th class='hidden'>Pais</th>
                        <th class='hidden'>Celular</th>
                        <th class='hidden'>Fijo</th>
                        <th class='hidden'>Tipo iva</th>
                        <th>Estado</th>
                        <th class='hidden'>Lista precios</th>
                        <th class='hidden'>Vendedor</th>
                        <th class='hidden'>Codigo masabores</th>
                        <th>Dni Cuil</th>
                        
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      
                      foreach ($clientes as $l) {
                          echo "<tr>
                            
                            <td class='hidden'>".$l["codigo"]."</td>
                            <td>".$l["usuario"]."</td>
                            <td class='hidden'>".$l["correo"]."</td>
                            <td>".$l["pass"]."</td>
                            <td>".$l["nombre"]."</td>
                            <td>".$l["apellido"]."</td>
                            <td class='hidden'>".$l["razon_social"]."</td>
                            <td class='hidden'>".$l["nombre_comercial"]."</td>
                            <td class='hidden'>".$l["direccion"]."</td>
                            <td class='hidden'>".$l["provincia"]."</td>
                            <td class='hidden'>".$l["localidad"]."</td>
                            <td class='hidden'>".$l["cod_postal"]."</td>
                            <td class='hidden'>".$l["pais"]."</td>
                            <td class='hidden'>".$l["celular"]."</td>
                            <td class='hidden'>".$l["fijo"]."</td>
                            <td class='hidden'>".$l["tipo_iva"]."</td>
                            <td>".$l["estado"]."</td>
                            <td class='hidden'>".$l["lista_precios"]."</td>
                            <td class='hidden'>".$l["vendedor"]."</td>
                            <td class='hidden'>".$l["codigo_masabores"]."</td>
                            <td>".$l["dni_cuil"]."</td>
                            
                            <td>                                                                
                                <a class='btn btn-warning' href='#sharp' onclick = 'abrir_modal_modificar_cliente(".$l["codigo"].")'; >
                                    <i class='fa fa-edit'></i>
                                </a>
                                <a class='btn btn-danger' href='#sharp' onclick = 'abrir_modal_eliminar_cliente(".$l["codigo"].")'; >
                                    <i class='fa   fa-trash-o'></i>
                                </a>
                            </td>
                            
                        </tr>";
                      }
                      
                      
                      
                      ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div>
            
            <!-- /.row -->
            <div class="row">
                
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- MODALES -->
    
    <div class="modal modal-primary" id="modal-agregar-cliente">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Agregar cliente: </h4>
                </div>
                <div class="modal-body">
                    <p style="font-size: 16px;font-weight: bold;color: #F00;" id="mensaje_error_agregar_comprador"></p>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario_agregar">Usuario</label>
                            <input type="text" class="form-control" id="usuario_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="correo_agregar">Correo</label>
                            <input type="text" class="form-control" id="correo_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pass_agregar">Contraseña</label>
                            <input type="text" class="form-control" id="pass_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_agregar">Nombre</label>
                            <input type="text" class="form-control" id="nombre_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido_agregar">Apellido</label>
                            <input type="text" class="form-control" id="apellido_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="razon_social_agregar">Razon social</label>
                            <input type="text" class="form-control" id="razon_social_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_comercial_agregar">Nombre comercial</label>
                            <input type="text" class="form-control" id="nombre_comercial_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direccion_agregar">Direccion</label>
                            <input type="text" class="form-control" id="direccion_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provincia_agregar">Provincia</label>
                            <select class="form-control" id="provincia_agregar" onChange="cambio_provincia(1)">
                                <option value="0">Seleccione una provincia</option>
                                <?php 
                                    foreach($provincias as $value)
                                    {
                                        echo "<option value='".$value["id"]."'>".$value["provincia"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="localidad_agregar">Localidad</label>
                            <select class="form-control" id="localidad_agregar">
                                <option value="0">Seleccione una localidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cod_postal_agregar">Codigo postal</label>
                            <input type="text" class="form-control" id="cod_postal_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pais_agregar">Pais</label>
                            <input type="text" class="form-control" id="pais_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="celular_agregar">Celular</label>
                            <input type="text" class="form-control" id="celular_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fijo_agregar">Fijo</label>
                            <input type="text" class="form-control" id="fijo_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_iva_agregar">Tipo iva</label>
                            <select class="form-control" id="tipo_iva_agregar">
                                <?php
                                    foreach ($tipos_iva as $value) {
                                        echo "<option value='".$value["codigo"]."'>".$value["iva"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado_agregar">Estado</label>
                            <select class="form-control" id="estado_agregar">
                                <option value="confirmado">confirmado</option>
                                <option value="pendiente">pendiente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lista_precios_agregar">Lista precios</label>
                            <input type="text" class="form-control" id="lista_precios_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vendedor_agregar">Vendedor</label>
                            <select class="form-control js-example-basic-single" id="vendedor_agregar">
                                <?php
                                    foreach($vendedores as $value)
                                    {
                                        echo "<option value='".$value["dni"]."'>".$value["nombre"]." ".$value["apellido"]." ".$value["dni"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="codigo_masabores_agregar">Codigo masabores</label>
                            <input type="text" class="form-control" id="codigo_masabores_agregar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dni_cuil_agregar">Dni - Cuil</label>
                            <input type="text" class="form-control" id="dni_cuil_agregar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-outline pull-left"  onClick="$('#modal-agregar-cliente').modal('hide')">Cerrar</button>
                    <button type="button" class="btn btn-outline pull-right"  onClick="agregar_cliente()">Confirmar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>
    
    <div class="modal modal-primary" id="modal-modificar-cliente">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modificar cliente: </h4>
                </div>
                <div class="modal-body">
                    <p style="font-size: 16px;font-weight: bold;color: #F00;" id="mensaje_error_agregar_comprador"></p>
                    <input type="text" id="codigo_modificar_cliente" hidden="true"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario_modificar">Usuario</label>
                            <input type="text" class="form-control" id="usuario_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="correo_modificar">Correo</label>
                            <input type="text" class="form-control" id="correo_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pass_modificar">Contraseña</label>
                            <input type="text" class="form-control" id="pass_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_modificar">Nombre</label>
                            <input type="text" class="form-control" id="nombre_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido_modificar">Apellido</label>
                            <input type="text" class="form-control" id="apellido_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="razon_social_modificar">Razon social</label>
                            <input type="text" class="form-control" id="razon_social_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_comercial_modificar">Nombre comercial</label>
                            <input type="text" class="form-control" id="nombre_comercial_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direccion_modificar">Direccion</label>
                            <input type="text" class="form-control" id="direccion_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pais_modificar">Pais</label>
                            <select class="form-control" id="pais_modificar" onCLick="cambio_pais('_modificar')">
                                <option value='0'>seleccionar pais</option>
                                <?php
                                    foreach($paises as $v)
                                    {
                                        echo "<option value='".$v["codigo"]."'>".$v["descripcion"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provincia_modificar">Provincia</label>
                            <select class="form-control" id="provincia_modificar" onChange="cambio_provincia(2)" readonly="">
                                <option value='0'>seleccionar provincia</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="localidad_fixed_modificar" hidden="true">
                            <label for="localidad_modificar">Localidad</label>
                            <select class="form-control" id="localidad_modificar">
                                <option value='0'>Seleccione localidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cod_postal_modificar">Codigo postal</label>
                            <input type="text" class="form-control" id="cod_postal_modificar">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="celular_modificar">Celular</label>
                            <input type="text" class="form-control" id="celular_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fijo_modificar">Fijo</label>
                            <input type="text" class="form-control" id="fijo_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_iva_modificar">Tipo iva</label>
                            <select class="form-control" id="tipo_iva_modificar">
                                <?php
                                    foreach ($tipos_iva as $value) {
                                        echo "<option value='".$value["codigo"]."'>".$value["iva"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado_modificar">Estado</label>
                            <select class="form-control" id="estado_modificar">
                                <option value="confirmado">confirmado</option>
                                <option value="pendiente">pendiente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lista_precios_modificar">Lista precios</label>
                            <input type="text" class="form-control" id="lista_precios_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vendedor_modificar">Vendedor</label>
                            <select class="form-control" id="vendedor_modificar">
                                <?php
                                    foreach($vendedores as $value)
                                    {
                                        echo "<option value='".$value["dni"]."'>".$value["nombre"]." ".$value["apellido"]." ".$value["dni"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="codigo_masabores_modificar">Codigo masabores</label>
                            <input type="text" class="form-control" id="codigo_masabores_modificar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dni_cuil_modificar">Dni - Cuil</label>
                            <input type="text" class="form-control" id="dni_cuil_modificar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-outline pull-left"  onClick="$('#modal-modificar-cliente').modal('hide')">Cerrar</button>
                    <button type="button" class="btn btn-outline pull-right"  onClick="modificar_cliente()">Confirmar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>
    
    <div class="modal modal-danger" id="modal-eliminar-cliente">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Eliminar cliente: </h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="codigo_eliminar_cliente" hidden="true"/>
                    <p>¿Realmente desea eliminar el cliente seleccionado?</p>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-outline pull-left"  onClick="$('#modal-eliminar-cliente').modal('hide')">Cerrar</button>
                    <button type="button" class="btn btn-outline pull-right"  onClick="eliminar_cliente()">Confirmar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>

    <!-- FIN MODALES -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/metisMenu.min.js"></script>
    
     <!-- Table Master -->
   

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/sb-admin-2.js"></script>
    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery.dataTables.min.js'></script>
    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/dataTables.bootstrap.min.js'></script>
     <?php /*foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; */?>
    
    <!-- SELECT2-->
    
    <script src='<?php echo base_url(); ?>recursos/select2/js/select2.min.js'></script>

    <script type="text/javascript">
            $(document).ready(function() {
              $(".js-example-basic-single").select2();
            });
    </script>
        
    <script>
        
        function cambio_pais(seccion)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/obtenerProvinciasDePais",
                data:{pais:$("#pais"+seccion).val()},
                    
                beforeSend: function(event){},
                success: function(data){
                        
                    data= JSON.parse(data);
                    
                    if(data.length > 0)
                    {
                        var html ="";

                        for(var i=0; i < data.length;i++)
                        {
                            html+="<option value='"+data[i]["id"]+"'>"+data[i]["provincia"]+"</option>";
                        }
                        
                        $("#provincia"+seccion).html(html);
                    }
                    else
                    {
                         $("#provincia"+seccion).html("<option value='0'>Seleccione provincia</option>");
                    }
                        
                    
                    $("#provincia"+seccion).removeAttr("readonly");
                    $("#localidad"+seccion).html("<option value='0'>Seleccione localidad</option>");
                    $("#localidad"+seccion).attr("readonly","");
                   
                },
                error: function(event){alert("error");},
            });
        }
        
        function abrir_modal_eliminar_cliente(codigo)
        {
            $("#codigo_eliminar_cliente").val(codigo);
            $("#modal-eliminar-cliente").modal("show");
        }
        
        
        function eliminar_cliente()
        {
            var codigo = $("#codigo_eliminar_cliente").val();
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/eliminarCliente",
                data:{codigo:codigo},

                beforeSend: function(event){},
                success: function(data){
                    data = JSON.parse(data);

                    if(data== true)
                    { 
                        location.href="<?php echo base_url()?>index.php/backoffice/clientes";
                    }
                    else
                    {
                        $("#mensaje_error_agregar_comprador").text("Ha ocurrido un error");
                    }
                },
                error: function(event){alert("error");},
            });       
        }
        
        function agregar_cliente()
        {
            if(validarCampos(1))
            {
                var usuario = $("#usuario_agregar").val();
                var correo = $("#correo_agregar").val();
                var pass = $("#pass_agregar").val();
                var nombre = $("#nombre_agregar").val();
                var apellido = $("#apellido_agregar").val();
                var razon_social = $("#razon_social_agregar").val();
                var nombre_comercial = $("#nombre_comercial_agregar").val();
                var direccion = $("#direccion_agregar").val();
                var provincia = $("#provincia_agregar").val();
                var localidad = $("#localidad_agregar").val();
                var cod_postal = $("#cod_postal_agregar").val();
                var pais = $("#pais_agregar").val();
                var celular = $("#celular_agregar").val();
                var fijo = $("#fijo_agregar").val();
                var tipo_iva = $("#tipo_iva_agregar").val();
                var estado = $("#estado_agregar").val();
                var lista_precios = $("#lista_precios_agregar").val();
                var vendedor = $("#vendedor_agregar").val();
                var codigo_masabores = $("#codigo_masabores_agregar").val();
                var dni_cuil = $("#dni_cuil_agregar").val();
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_Ajax/agregarCliente",
                    data:{usuario:usuario,correo:correo,pass:pass,nombre:nombre,apellido:apellido,razon_social:razon_social,
                          nombre_comercial:nombre_comercial,direccion:direccion,provincia:provincia,localidad:localidad,
                          cod_postal:cod_postal,pais:pais,celular:celular,fijo:fijo,tipo_iva:tipo_iva,estado:estado,lista_precios:lista_precios,
                          vendedor:vendedor,codigo_masabores:codigo_masabores,dni_cuil:dni_cuil},

                    beforeSend: function(event){},
                    success: function(data){
                        data = JSON.parse(data);

                        if(data)
                        {
                            location.href="<?php echo base_url()?>index.php/backoffice/clientes";
                        }
                    },
                    error: function(event){alert("error");},
                });
            }
            else
            {
                alert("Complete correctamente los campos");
            }
        }
        
        function abrir_modal_modificar_cliente(codigo)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/getCliente",
                data:{codigo:codigo},

                beforeSend: function(event){},
                success: function(data){
                    data = JSON.parse(data);

                    $("#codigo_modificar_cliente").val(data["codigo"]);
                    $("#usuario_modificar").val(data["usuario"]);
                    $("#correo_modificar").val(data["correo"]);
                    $("#pass_modificar").val(data["pass"]);
                    $("#nombre_modificar").val(data["nombre"]);
                    $("#apellido_modificar").val(data["apellido"]);
                    $("#razon_social_modificar").val(data["razon_social"]);
                    $("#nombre_comercial_modificar").val(data["nombre_comercial"]);
                    $("#direccion_modificar").val(data["direccion"]);
                    $("#pais_modificar").val(data["pais"]);
                    carga_selects_valores(data["provincia"],data["localidad"]);
                    $("#cod_postal_modificar").val(data["cod_postal"]);
                    $("#pais_modificar").val(data["pais"]);
                    $("#celular_modificar").val(data["celular"]);
                    $("#fijo_modificar").val(data["fijo"]);
                    $("#tipo_iva_modificar").val(data["tipo_iva"]);
                    $("#estado_modificar").val(data["estado"]);
                    $("#lista_precios_modificar").val(data["lista_precios"]);
                    $("#vendedor_modificar").val(data["vendedor"]);
                    $("#codigo_masabores_modificar").val(data["codigo_masabores"]);
                    $("#dni_cuil_modificar").val(data["dni_cuil"]);
                    
                    $("#modal-modificar-cliente").modal("show");
                    
                },
                error: function(event){alert("error");},
            });  
        }
        
        function carga_selects_valores(provincia,localidad)
        {
            // CARGANDO PROVINCIAS Y SELECCIONANDO
            
            var pais_select = $("#pais_modificar").val();
            
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/obtenerProvinciasDePais",
                data:{pais:pais_select},
                    
                beforeSend: function(event){},
                success: function(data){
                        
                    data= JSON.parse(data);
                    
                        var html ="";
                        
                        
                        $("#provincia_modificar").removeAttr("readonly");
                        
                        for(var i=0; i < data.length;i++)
                        {
                            if(data[i]["id"] == provincia )
                            {
                                alert(true);
                                html+="<option value='"+data[i]["id"]+"' selected>"+data[i]["provincia"]+"</option>";
                            }
                            else
                            {
                                html+="<option value='"+data[i]["id"]+"'>"+data[i]["provincia"]+"</option>";
                            }
                        }
                        
                        
                        $("#provincia_modificar").html(html);
                   
                },
                error: function(event){alert("error");},
            });
    
            // CARGANDO LOCALIDADES Y SELECCIONANDO
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/obtenerLocalidadesDeProvincia",
                data:{provincia:provincia},

                beforeSend: function(event){},
                success: function(data){
                    data = JSON.parse(data);
                    
                    var html = "";
                    
                    for(var i=0; i < data.length;i++)
                    {
                            if(localidad == data[i]["codigo"])
                            {
                                html+="<option value='"+data[i]["codigo"]+"' selected>"+data[i]["localidad"]+"</option>";
                            }
                            else
                            {
                                html+="<option value='"+data[i]["codigo"]+"'>"+data[i]["localidad"]+"</option>";
                            }
                    }
                        
                        $("#localidad_modificar").removeAttr("readonly");
                        $("#localidad_modificar").html(html);
                 },
                error: function(event){alert("error fd");},
            });    
        }
        
        function modificar_cliente()
        {
            if(validarCampos(2))
            {
                var codigo = $("#codigo_modificar_cliente").val();
                var usuario = $("#usuario_modificar").val();
                var correo = $("#correo_modificar").val();
                var pass = $("#pass_modificar").val();
                var nombre = $("#nombre_modificar").val();
                var apellido = $("#apellido_modificar").val();
                var razon_social = $("#razon_social_modificar").val();
                var nombre_comercial = $("#nombre_comercial_modificar").val();
                var direccion = $("#direccion_modificar").val();
                var provincia = $("#provincia_modificar").val();
                var localidad = $("#localidad_modificar").val();
                var cod_postal = $("#cod_postal_modificar").val();
                var pais = $("#pais_modificar").val();
                var celular = $("#celular_modificar").val();
                var fijo = $("#fijo_modificar").val();
                var tipo_iva = $("#tipo_iva_modificar").val();
                var estado = $("#estado_modificar").val();
                var lista_precios = $("#lista_precios_modificar").val();
                var vendedor = $("#vendedor_modificar").val();
                var codigo_masabores = $("#codigo_masabores_modificar").val();
                var dni_cuil = $("#dni_cuil_modificar").val();
                
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_Ajax/modificarCliente",
                    data:{codigo:codigo,usuario:usuario,correo:correo,pass:pass,nombre:nombre,apellido:apellido,razon_social:razon_social,
                          nombre_comercial:nombre_comercial,direccion:direccion,provincia:provincia,localidad:localidad,
                          cod_postal:cod_postal,pais:pais,celular:celular,fijo:fijo,tipo_iva:tipo_iva,estado:estado,lista_precios:lista_precios,
                          vendedor:vendedor,codigo_masabores:codigo_masabores,dni_cuil:dni_cuil},

                    beforeSend: function(event){},
                    success: function(data){
                        data = JSON.parse(data);

                        if(data)
                        {
                            location.href="<?php echo base_url()?>index.php/backoffice/clientes";
                        }
                    },
                    error: function(event){alert("error");},
                });
            }
            else
            {
                alert("Complete correctamente los campos");
            }
        }
        
        function cambio_provincia(tipo_campos)
        {
            var seccion = "";
            
            if(tipo_campos == 1){seccion="_agregar";}
            else{seccion="_modificar";}
            
            var numero_provincia = $("#provincia"+seccion).val();
            
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/obtenerLocalidadesDeProvincia",
                data:{provincia:numero_provincia},

                beforeSend: function(event){},
                success: function(data){
                    data = JSON.parse(data);
                    
                    var html = "";
                    
                    if(tipo_campos == 2)
                    {
                        html="<option value='0'>seleccionar localidad</option>";
                        var select = $("#localidad_fixed"+seccion).val();

                        for(var i=0; i < data.length;i++)
                        {
                            if(select == data[i]["codigo"])
                            {
                                html+="<option value='"+data[i]["codigo"]+"' selected>"+data[i]["localidad"]+"</option>";
                            }
                            else
                            {
                                html+="<option value='"+data[i]["codigo"]+"'>"+data[i]["localidad"]+"</option>";
                            }
                        }
                        
                        $("#localidad_modificar").removeAttr("readonly");
                    }
                    else
                    {
                        html="<option value='0'>seleccionar provincia</option>";
                        

                        for(var i=0; i < data.length;i++)
                        {
                            html+="<option value='"+data[i]["codigo"]+"'>"+data[i]["localidad"]+"</option>";
                            
                        }
                    }
                    
                    $("#localidad"+seccion).html(html);
                    
                },
                error: function(event){alert("error fd");},
            });  
        }
        
        
        function validarCampos(tipo_campos)
        {
            var seccion = "";
            
            if(tipo_campos == 1){seccion="_agregar";}
            else{seccion="_modificar";}
            
            var usuario = $("#usuario"+seccion).val();
            var correo = $("#correo"+seccion).val();
            var pass = $("#pass"+seccion).val();
            var nombre = $("#nombre"+seccion).val();
            var apellido = $("#apellido"+seccion).val();
            var razon_social = $("#razon_social"+seccion).val();
            var nombre_comercial = $("#nombre_comercial"+seccion).val();
            var direccion = $("#direccion"+seccion).val();
            var provincia = $("#provincia"+seccion).val();
            var localidad = $("#localidad"+seccion).val();
            var cod_postal = $("#cod_postal"+seccion).val();
            var pais = $("#pais"+seccion).val();
            var celular = $("#celular"+seccion).val();
            var fijo = $("#fijo"+seccion).val();
            var tipo_iva = $("#tipo_iva"+seccion).val();
            var estado = $("#estado"+seccion).val();
            var lista_precios = $("#lista_precios"+seccion).val();
            var vendedor = $("#vendedor"+seccion).val();
            var codigo_masabores = $("#codigo_masabores"+seccion).val();
            var dni_cuil = $("#dni_cuil"+seccion).val();
            
            var respuesta = false;
            
            if(usuario != "" && correo != "" && pass != "" && nombre != "" && apellido != "" &&
               razon_social != "" && nombre_comercial != "" && direccion != "" && provincia != 0 && localidad != 0 &&
               cod_postal != "" && pais != "" && celular != "" && fijo != "" && tipo_iva != 0 &&
               estado != 0 && lista_precios != "" && vendedor != 0 && codigo_masabores != "" && dni_cuil != "")
            {
                respuesta = true;
            }
            
            
            return respuesta;  
        }
    </script>
    <script>
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
          });
    </script>
</body>

</html>