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
                    <button class="btn btn-primary" onclick="$('#modal_agregar').modal('show');">
                        <i class="fa fa-plus"></i> Agregar
                    </button>
                    <br><br>
                    <table id="listado" class="table table-bordered table-hover" style="text-align: center !important;">
                    <thead>
                      <tr > 
                        <th style="text-align: center;">Titulo</th>
                        <th style="text-align: center;">Link</th>
                        <th style="text-align: center;">Mostrar</th>
                        <th style="text-align: center;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($videos as $value)
                      {
                        echo "
                        <tr>
                          <td>".$value["titulo"]."</td>
                           <td><a target='_blank' href='".$value["link"]."'>".$value["link"]."</a></td>
                          <td>".$value["mostrar"]."</td>
                          <td>
                            <button class='btn btn-sm btn-primary' onclick='abrir_modal_editar(".$value["id"].")'><i class='fa fa-edit'></i></button>
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
                <h4 class="modal-title">Eliminar video:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Rubros/eliminar_rubro" method="post" id="formulario_eliminar">
                    <div class="col-md-12">
                        <p style="font-size: 17px;font-weight: bold;text-align: center;">¿Seguro desea eliminar el video?</p>
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

<div class="modal modal-default modal_agregar" id="modal_agregar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar video:</h4>
            </div>
            <div class="modal-body">
                   <!-- BOTONERA -->
                    <div class="col-md-12">
                        <div class="form-group">
                          <label id="label_titulo_agregar">Titulo</label>
                          <input type="text" class="form-control" id="titulo_agregar">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label id="label_link_agregar">Link: https://www.youtube.com/watch?v=</label>
                          <input type="text" class="form-control" id="link_agregar">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label id="label_mostrar_agregar">Mostrar</label>
                          <select class="form-control" id="mostrar_agregar">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                          </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_agregar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-primary pull-right" onClick="agregar()"><i class='fa fa-save'></i> Agregar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default modal_editar" id="modal_editar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar video:</h4>
            </div>
            <div class="modal-body">
                   <!-- BOTONERA -->
                    <div class="col-md-12">
                        <div class="form-group">
                          <label id="label_titulo_editar">Titulo</label>
                          <input type="text" class="form-control" id="titulo_editar">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label id="label_link_editar">Link: https://www.youtube.com/watch?v=</label>
                          <input type="text" class="form-control" id="link_editar">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label id="label_mostrar_editar">Mostrar</label>
                          <select class="form-control" id="mostrar_editar">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                          </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_editar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-primary pull-right" onClick="editar()"><i class='fa fa-save'></i> Agregar</button>
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

var id_trabajando =0;

    function abrir_modal_editar(id)
    {
       id_trabajando=id;

        $.ajax({
          url: "<?php echo base_url()?>index.php/backoffice/get_video_post",
          type: "POST",
          data:{id:id},

          beforeSend: function(data)
          {},
          success: function(data)
          {
            data = JSON.parse(data);

            $("#titulo_editar").val(data["titulo"]);
            $("#link_editar").val(data["link"]);
            $("#mostrar_editar").val(data["mostrar"]);
            $("#modal_editar").modal("show");
          },
          error: function(event){},
        });
    }

    function agregar()
    {
        var titulo = $.trim($("#titulo_agregar").val());
        var link = $.trim($("#link_agregar").val());
        var mostrar = $("#mostrar_agregar").val();

        var seguir = true;

        if(titulo == "")
        {
            activar_error_label("label_titulo_agregar");
            seguir = false;
        }
        else
        {
            desactivar_error_label("label_titulo_agregar");
        }

        if(link =="")
        {
            activar_error_label("label_link_agregar");
            seguir = false;
        }
        else
        {
            desactivar_error_label("label_link_agregar");
        }

        if(seguir)
        {
            $.ajax({
              url: "<?php echo base_url()?>index.php/backoffice/agregar_video_post",
              type: "POST",
              data:{titulo:titulo,link:link,mostrar:mostrar},

              beforeSend: function(data)
              {
                $("#texto_loading").text("Subiendo, por favor espere ...");
                $("#modal_loading").modal("show");
              },
              success: function(data)
              {
                $("#modal_loading").modal("hide");
                
                try
                {
                  data= JSON.parse(data);

                  if(data)
                  {
                    location.href="<?php echo base_url() ?>index.php/backoffice/videos"
                  }
                  else
                  {
                    $("#mensaje_alert").text("Ha ocurrido un error");
                    $("#modal_alert").modal("show");
                  }
                }
                catch(e)
                {
                  $("#mensaje_alert").text("Ha ocurrido un error");
                  $("#modal_alert").modal("show");
                }
              },
              error: function(event){},
            });
        }
    }

    function editar()
    {
        var titulo = $.trim($("#titulo_editar").val());
        var link = $.trim($("#link_editar").val());
        var mostrar = $("#mostrar_editar").val();

        var seguir = true;

        if(titulo == "")
        {
            activar_error_label("label_titulo_editar");
            seguir = false;
        }
        else
        {
            desactivar_error_label("label_titulo_editar");
        }

        if(link == "")
        {
            activar_error_label("label_link_editar");
            seguir = false;
        }
        else
        {
            desactivar_error_label("label_link_editar");
        }

        if(seguir)
        {
            $.ajax({
              url: "<?php echo base_url()?>index.php/backoffice/editar_video_post",
              type: "POST",
              data:{id:id_trabajando,titulo:titulo,link:link,mostrar:mostrar},

              beforeSend: function(data)
              {
                $("#texto_loading").text("Subiendo, por favor espere ...");
                $("#modal_loading").modal("show");
              },
              success: function(data)
              {
                $("#modal_loading").modal("hide");
                
                try
                {
                  data= JSON.parse(data);

                  if(data)
                  {
                    location.href="<?php echo base_url() ?>index.php/backoffice/videos"
                  }
                  else
                  {
                    $("#mensaje_alert").text("Ha ocurrido un error");
                    $("#modal_alert").modal("show");
                  }
                }
                catch(e)
                {
                  $("#mensaje_alert").text("Ha ocurrido un error");
                  $("#modal_alert").modal("show");
                }
              },
              error: function(event){$("#mensaje_alert").text("Ha ocurrido un error");
              $("#modal_alert").modal("show");},
            });
        }
    }  

    function abrir_modal_eliminar(id)
    {
        id_trabajando=id;
        $("#modal_eliminar").modal("show");
    } 

    function eliminar()
    {
        $.ajax({
          url: "<?php echo base_url()?>index.php/backoffice/eliminar_video_post",
          type: "POST",
          data:{id:id_trabajando},

          beforeSend: function(data)
          {},
          success: function(data)
          {
            try
            {
              data= JSON.parse(data);

              if(data)
              {
                location.href="<?php echo base_url() ?>index.php/backoffice/videos"
              }
              else
              {
                $("#mensaje_alert").text("Ha ocurrido un error");
                $("#modal_alert").modal("show");
              }
            }
            catch(e)
            {
              $("#mensaje_alert").text("Ha ocurrido un error");
              $("#modal_alert").modal("show");
            }
          },
          error: function(event){$("#mensaje_alert").text("Ha ocurrido un error");
              $("#modal_alert").modal("show");},
        });
    }

function activar_error_label(id)
{
  $("#"+id).css("color","#d9534f");
}

function desactivar_error_label(id)
{
  $("#"+id).css("color","#000");
}

function isValidUrl(url,obligatory,ftp)
{
    if(obligatory==undefined)
        obligatory=0;
    if(ftp==undefined)
        ftp=0;
    if(url=="" && obligatory==0)
        return true;
    if(ftp)
        var pattern = /^(http|https|ftp)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    else
        var pattern = /^(http|https)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    if(url.match(pattern))
        return true;
    else
        return false;
}

</script>
</body>
</html>