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
</head>

<body>
    <div class="container">
        <div class="col-md-offset-2 col-md-8 col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Seleccion de cliente</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tabla-clientes" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                          <th style='display: none;'>Codigo</th>
                          <th style="display: none;">Usuario</th>
                          <th style="display: none;">Correo</th>
                          <th>Nombre</th>
                          <th style="display: none;">Dni - Cuil</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach($clientes as $value)
                        {
                           echo "<tr>
                                    <td style='display: none;'>".$value["codigo"]."</td>
                                    <td style='display: none;'>".$value["usuario"]."</td>
                                    <td style='display: none;'>".$value["correo"]."</td>
                                    <td>".$value["nombre"]." ".$value["apellido"]."</td>
                                    <td style='display: none;'>".$value["dni_cuil"]."</td>
                                </tr>"; 
                        }
                        ?>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    
    
    
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery.dataTables.min.js'></script>
    <!-- DataTables -->

    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery.dataTables.min.js'></script>

    <script>
    $("#tabla-clientes").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": true
    });
    </script>
</body>

</html>