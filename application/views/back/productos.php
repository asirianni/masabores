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
	
	<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
    

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

            <?php echo $this->partes_backoffice->getMenuLateralAdministrador();?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Productos</h1>
                </div>
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/productos')?>'> ABM Productos </a> |
<!--                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/rubros')?>'> ABM Rubros </a> |-->
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/imagenes')?>'> ABM Imagenes </a> |
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/tabla_destacados')?>'> ABM Tabla Destacados </a> |
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/productos_destacados')?>'> ABM Productos Destacados </a> |
<!--	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/subrubros')?>'> ABM Sub Rubros </a> |
	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/talles')?>'> ABM Talles </a> |
	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/colores')?>'> ABM Colores </a> |
	            <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/cantidades')?>'> ABM Cantidades </a> |-->
	        <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/abm_grupos')?>'> ABM Grupos </a> |
                <i class="fa fa-table fa-fw"></i><a href='<?php echo site_url('backoffice/abm_grupos_padres')?>'> ABM Grupos Padres </a> |
                <i class="fa fa-table fa-fw"></i><a href='#' onclick="actualizar_imagenes()"> Cargar imagenes </a>  
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
	            <?php echo $output; ?>
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
    <?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

   <script>
       function actualizar_imagenes()
       {
           if(confirm("Desea cargar las imagenes a la tabla?"))
           {
               location.href="<?php echo base_url()?>index.php/backoffice/cargar_imagenes_server";
           }
       }
   </script>
</body>

</html>