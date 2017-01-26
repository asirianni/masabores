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
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Escritorio</h1>
                    <a href='<?php echo site_url('backoffice/escritorio')?>' class="btn btn-large"><i class="fa fa-arrow-circle-right"> </i> REFRESCAR DATOS</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $clientes?></div>
                                    <div>Clientes Pendientes!</div>
                                </div>
                            </div>
                        </div>
                        <a href='<?php echo site_url('backoffice/clientes')?>'>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $pedidos?></div>
                                    <div>Descargue Pedidos!</div>
                                </div>
                            </div>
                        </div>
                        <a href='<?php echo site_url('backoffice/generar_pedidos_texto')?>'>
                            <div class="panel-footer">
                                <span class="pull-left">Descargar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $delivery?></div>
                                    <div>Reparto - Entrega!</div>
                                </div>
                            </div>
                        </div>
                        <a href='<?php echo site_url('backoffice/pedidos/2')?>'>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $retiro?></div>
                                    <div>Pendientes de Retiro!</div>
                                </div>
                            </div>
                        </div>
                        <a href='<?php echo site_url('backoffice/pedidos/1')?>'>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- /.row -->
            <div class="row">
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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

</body>

</html>