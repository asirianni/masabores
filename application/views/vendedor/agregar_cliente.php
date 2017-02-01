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
    <link rel='stylesheet' href='<?php echo base_url(); ?>recursos/css/bootstrap-table.css'/>
    <!-- DataTables -->
    <link rel='stylesheet' href='<?php echo base_url(); ?>recursos/css/dataTables.bootstrap.css'>
    <!-- JQUERY MOBILE -->
    <link rel='stylesheet' href='<?php echo base_url(); ?>recursos/js/jquery-mobile/demos.css'>
    <link rel='stylesheet' href='<?php echo base_url(); ?>recursos/js/jquery-mobile/jquery.mobile-1.4.5.min.css'>
    
    <!-- CSS MARIO STYLES :D -->
	<style>
		.header{
			background-color: #3388cc;
			border-radius: 20px;
			color: #fff;
		}
    </style>
</head>

<body>
    
    <div class="container-fluid">
		<div class="header">
			<h3 class="text-center">Vendedor</h3>
		</div>
        
                <div class="pull-left">
                    <a href="<?php echo base_url()?>index.php/Vendedor" class="ui-btn ui-icon-arrow-l ui-btn-icon-left">Volver</a>
                </div>
                <div class="clearfix"></div>
                
                <h3>Datos del cliente:</h3>
                
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="usuario" class="ui-hidden-accessible">Usuario:</label>
                        <input id="usuario" name="usuario" placeholder="Usuario" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="correo" class="ui-hidden-accessible">Correo:</label>
                        <input id="correo" name="correo" placeholder="Correo" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="pass" class="ui-hidden-accessible">Contraseña:</label>
                        <input id="pass" name="pass" placeholder="Contraseña" value="" type="password">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="ui-hidden-accessible">Nombre:</label>
                        <input name="nombre" id="nombre" placeholder="Nombre" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="ui-hidden-accessible">Apellido:</label>
                        <input name="apellido" id="apellido" placeholder="Apellido" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="razon_social" class="ui-hidden-accessible">Razon social:</label>
                        <input name="razon_social" id="razon_social" placeholder="Razon social" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="nombre_comercial" class="ui-hidden-accessible">Nombre comercial:</label>
                        <input name="nombre_comercial" id="nombre_comercial" placeholder="Nombre comercial" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="ui-hidden-accessible">Direccion:</label>
                        <input name="direccion" id="direccion" placeholder="Direccion" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="provincia" class="select">Provincia:</label>
                        <select name="provincia" id="provincia" data-native-menu="false">
                            <?php 
                                foreach($provincias as $value)
                                {
                                    echo "<option value='".$value["id"]."'>".$value["provincia"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="localidad" class="select">Localidad:</label>
                        <select name="localidad" id="localidad" data-native-menu="false">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cod_postal" class="ui-hidden-accessible">Codigo postal:</label>
                        <input name="cod_postal" id="cod_postal" placeholder="Codigo postal" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="pais" class="ui-hidden-accessible">Pais:</label>
                        <input name="pais" id="pais" placeholder="Text input" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="celular" class="ui-hidden-accessible">Celular:</label>
                        <input name="celular" id="celular" placeholder="Celular" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="fijo" class="ui-hidden-accessible">Fijo:</label>
                        <input name="fijo" id="fijo" placeholder="Fijo" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="tipo_iva" class="select">Tipo Iva:</label>
                        <select name="tipo_iva" id="select-choice-a" data-native-menu="false">
                            <?php 
                                foreach($tipos_iva as $value)
                                {
                                    echo "<option value='".$value["codigo"]."'>".$value["iva"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo_iva" class="select">Vendedor:</label>
                        <div class="ui-input-search ui-body-inherit ui-corner-all ui-shadow-inset ui-input-has-clear">
                            <input data-type="search" data-enhanced="true" data-inset="false" id="pre-rendered-example-input" placeholder="Buscar vendedores..." value="">
                        </div>
                        <div data-role="controlgroup" data-enhanced="true" data-filter="true" data-filter-reveal="true" data-input="#pre-rendered-example-input" class="ui-controlgroup ui-controlgroup-vertical ui-corner-all">
                            <div class="ui-controlgroup-controls">
                                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-shadow ui-screen-hidden">no tengo vendedor</a>
                                <?php 
                                    foreach($vendedores as $value)
                                    {
                                        echo "<a href='#' class='ui-btn ui-corner-all ui-shadow ui-shadow ui-screen-hidden'>".$value["nombre"]."</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dni_cuil" class="ui-hidden-accessible">Dni - cuil:</label>
                        <input name="dni_cuil" id="dni_cuil" placeholder="Dni - cuil" value="" type="text">
                    </div>
                    <input type="submit" class="ui-btn ui-btn-active" value="Subir datos"/>
                    
                </form>
	</div> <!-- end container -->

	
    
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery.dataTables.min.js'></script>
    <!-- DataTables -->

    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery.dataTables.min.js'></script>
    
    <!-- JQUERY MOBILE -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery-mobile/index.js'></script>
    <script src='<?php echo base_url(); ?>recursos/js/jquery-mobile/jquery.mobile-1.4.5.min.js'></script>

    <script>
    /*$("#tabla-clientes").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": true
    });*/
    </script>
    
    <script>
	$("#provincia").change(function(){
            var html = "<option value='1'>jaja</option>";
            
            $("#localidad").html(html);
        });
    </script>
    
</body>

</html>