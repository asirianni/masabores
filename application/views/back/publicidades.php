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
            </div>
            <div class="row">
	            <div class="col-md-12">
                    <a href="<?php echo base_url() ?>/index.php/backoffice/agregar_publicidad" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Agregar
                    </a>
                    <br><br>
                    <table id="listado" class="table table-bordered table-hover" style="text-align: center !important;">
                    <thead>
                      <tr > 
                        <th style="text-align: center;">Descripcion</th>
                        <th style="text-align: center;">Imagen</th>
                        <th style="text-align: center;">Visitas</th>
                        <th style="text-align: center;">Usuario</th>
                        <th style="text-align: center;">Ancho</th>
                        <th style="text-align: center;">Altura</th>
                        <th style="text-align: center;">Mostrar</th>
                        <th style="text-align: center;">Url</th>
                        <th style="text-align: center;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($publicidades as $value)
                      {
                        echo "
                        <tr>
                          <td>".$value["descripcion"]."</td>
                          <td>
                            <button class='btn btn-sm btn-primary' onclick='abrir_modal_ver_imagen(&#39;".base_url()."recursos/images/publicidades/".$value["width"]."_".$value["height"]."/".$value["imagen"]."&#39;)'>
                              <i class='fa fa-eye'></i>
                            </button>
                          </td>
                          <td>".$value["visitas"]."</td>
                          <td>".$value["empleados_usuario"]."</td>
                          <td>".$value["width"]."</td>
                          <td>".$value["height"]."</td>
                          <td>".$value["mostrar"]."</td>
                          <td><a target='_blank' href='".$value["url"]."'>".$value["url"]."</a></td>

                          <td>
                            <a href='".base_url()."index.php/backoffice/editar_publicidad/".$value["id"]."' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-sm btn-danger' onclick='abrir_modal_eliminar(".$value["id"].")'><i class='fa fa-trash-o'></i></button>
                          </td>
                        </tr>";
                      }?>
                    </tbody>
                  </table>
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


<div class="modal modal-default modal_eliminar" id="modal_eliminar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Eliminar publicidad:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Rubros/eliminar_rubro" method="post" id="formulario_eliminar">
                    <input type='text' id='id_eliminar' name="id_eliminar" hidden="">
                    <div class="col-md-12">
                        <p style="font-size: 17px;font-weight: bold;text-align: center;">¿Seguro desea eliminar la publicidad?</p>
                    </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_eliminar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-danger pull-right" onClick="eliminar()"><i class='fa fa-trash-o'></i> Eliminar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


    <div class="modal modal-default modal_agregar" id="modal_ver_imagen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Imagen:</h4>
                </div>

                <div class="modal-body">
                      <div class="col-md-12">
                        <img style="margin: 0 auto;" src="" id="src_modal_ver_imagen" class="img-responsive">
                      </div>

                      <div class="clearfix"></div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-12">
                        <div class="form-group" style="text-align: center;">
                          <br>
                            <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_ver_imagen').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/recursos/backoffice/js/sb-admin-2.js"></script>
      <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/jquery.dataTables.min.js'></script>
    <!-- DataTables -->
    <script src='<?php echo base_url(); ?>recursos/js/dataTables.bootstrap.min.js'></script>

<script type="text/javascript">
        
$(document).ready(function(){
    $('#listado').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true
  });
});


var id_trabajando=0;
  

function abrir_modal_ver_imagen(url)
{
  $("#src_modal_ver_imagen").attr("src",url);
  $("#modal_ver_imagen").modal("show");
}

function abrir_modal_eliminar(id)
{
    id_trabajando=id;
    $("#modal_eliminar").modal("show");
}


function eliminar()
{
  $.ajax({
      url: "<?php echo base_url()?>index.php/backoffice/eliminar_publicidad",
      type: "POST",
      data:{id:id_trabajando},
      success: function(data)
      {
        data= JSON.parse(data);

        if(data["respuesta"])
        {
          location.reload();
        }
        else
        {
          alert("No se ha podido eliminar");
        }

        $("#modal_eliminar").modal("hide");
         
      },
      error: function(event){
        alert("No se ha podido eliminar");
      },
  });
}
</script>
</body>

</html>