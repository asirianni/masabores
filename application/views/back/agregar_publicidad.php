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


    <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/select2/css/select2.min.css">
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
                    <h2 class="text-center">Datos Basicos</h2>
                  <br>

                  <form id="formulario" enctype="multipart/form-data">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="descripcion" id="label_descripcion">Descripcion</label>
                        <input class="form-control" type="text" name="descripcion">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tamaño_imagen_a_subir">Tamaño imagen a subir</label>
                        <select class="form-control"  id="tamanio_imagen_a_subir" name="tipo_tamanio_imagen" onChange="cambio_tamanio_imagen()" >
                          <option value="0">Seleccionar</option>
                          <option value="1">170 x 638</option>
                          <option value="2">729 x 90</option>

                        </select>
                        <input type="hidden" name="width" value="0">
                        <input type="hidden" name="height" value="0">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="url" id="label_url">Url</label>
                        <input class="form-control"  type="text" name="url">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mostrar">Mostrar</label>
                        <select class="form-control"  id="mostrar" name="mostrar">
                          <option value="si">Si</option>
                          <option value="no">No</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="imagen" id="label_imagen">Imagen</label>
                        <input type="file" name="imagen" id="imagen">
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <h2 class="text-center">Sectores de visibilidad</h2>

                    <div id="contenedores_sectores_agregados" hidden>

                    </div>
                  </form>
                  <br>

                  <button class="btn btn-sm btn-primary" onclick="abrir_modal_agregar()"><i class="fa fa-plus"></i></button>

                  <div class="clearfix"></div>

                  <br>

                  <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>TIPO DE SECTOR</th>
                          <th>RUBRO</th>
                          <th>SUBRUBRO</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="cuerpo_sectores">
                        
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-offset-4 col-md-4" style="text-align: center !important;">
                    <div class="form-group">
                      <button class="btn btn-primary" onclick="guardar()"><i class="fa fa-save"></i> Guardar</button>
                    </div>
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

<?php echo $modal_alert?>
<?php echo $modal_loading?>

<div class="modal modal-default modal_agregar" id="modal_agregar_sector">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar a Sector:</h4>
            </div>
            <div class="modal-body">
                   <!-- BOTONERA -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-md-4">
                        <button class="btn btn-primary form-control" onclick="cambio_tipo_sector('busqueda_sector_web')">Solo Sector Web</button> 
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary form-control" onclick="cambio_tipo_sector('busqueda_rubro')">Sector y Rubro</button> 
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary form-control" onclick="cambio_tipo_sector('busqueda_subrubro')">Sector y Subrubro</button> 
                      </div>
                    </div>
                  </div>

                  <div class="clearfix"></div>
                  <br><br>

                  <div class="col-md-12" id="busqueda_sector_web" hidden>
                    <div class="form-group">
                      <label for="option_sector_web"  id="label_option_sector_web">Sector Web</label>
                      <select class="form-control" id="option_sector_web">
                        <option value="0">Seleccionar</option>
                        <?php
                        

                        for($i=0; $i < count($sectores_web_publicitarios);$i++)
                        {
                          echo "<option value='".$sectores_web_publicitarios[$i]["id"]."'>".$sectores_web_publicitarios[$i]["nombre_sector"]."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12" id="busqueda_rubro" hidden >
                    <div class="form-group">
                      <label for="option_sector_web_rubro"  id="label_option_sector_web_rubro">Sector Web</label>
                      <select class="form-control" id="option_sector_web_rubro">
                        <option value="0">Seleccionar</option>
                        <?php
                        

                        for($i=0; $i < count($sectores_web_publicitarios);$i++)
                        {
                          if($sectores_web_publicitarios[$i]["id"] != 1 && $sectores_web_publicitarios[$i]["id"] != 2 && $sectores_web_publicitarios[$i]["id"] != 3)
                          {
                            echo "<option value='".$sectores_web_publicitarios[$i]["id"]."'>".$sectores_web_publicitarios[$i]["nombre_sector"]."</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="" id="label_select_busqueda_rubro">Seelccionar Rubro</label>
                      <select class="form-control" id="select_busqueda_rubro" style="width: 100%;">
                        <option value="0">Seleccionar</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12" id="busqueda_subrubro" hidden>
                    <div class="form-group">
                      <label for="option_sector_web_subrubro"  id="label_option_sector_web_subrubro">Sector Web</label>
                      <select class="form-control" id="option_sector_web_subrubro">
                        <option value="0">Seleccionar</option>
                        <?php
                        

                        for($i=0; $i < count($sectores_web_publicitarios);$i++)
                        {
                          if($sectores_web_publicitarios[$i]["id"] != 1 && $sectores_web_publicitarios[$i]["id"] != 2 && $sectores_web_publicitarios[$i]["id"] != 3)
                          {
                            echo "<option value='".$sectores_web_publicitarios[$i]["id"]."'>".$sectores_web_publicitarios[$i]["nombre_sector"]."</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="" id="label_select_busqueda_subrubro">Subrubro</label>
                      <select class="form-control" id="select_busqueda_subrubro" style="width: 100%;">
                        <option value="0">Seleccionar</option>
                      </select>
                    </div>
                  </div>

                  <input type="hidden" id="id_referencia_agregar">
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_agregar_sector').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-primary pull-right" onClick="agregar_sector()"><i class='fa fa-save'></i> Agregar</button>
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

    <script src='<?php echo base_url(); ?>recursos/select2/js/select2.min.js'></script>

<script>
      
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

function validar_input_file(f,es_requerido,extensiones=false){
    var ext=null;

    if(!extensiones)
    {
      ext= ['jpg','jpeg'];
    }
    else
    {
      ext= extensiones;
    }

    var v=f.value.split('.').pop().toLowerCase();

    if(!es_requerido && f.value == "")
    {
      return true;
    }

    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v)
            return true;
    }
    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    return false;
}

var proximo_id_sectores = 0;

$(document).ready(function(){
  var html_option ="";


  $("#select_busqueda_rubro").select2({        
    ajax: {
        url: "<?=base_url()?>index.php/backoffice/get_rubro_busqueda_select2",
        dataType: 'json',
        type: 'post',
        delay: 250,
        data: function (params) {
            return {
                q: params.term 
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 1
  });

  $("#select_busqueda_subrubro").select2({        
    ajax: {
        url: "<?=base_url()?>index.php/backoffice/get_subrubro_sin_id_rubro_busqueda_select2",
        dataType: 'json',
        type: 'post',
        delay: 250,
        data: function (params) {
            return {
                q: params.term 
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 1
  });
});

function abrir_modal_agregar()
{
  resetar_selecciones();
  cambio_tipo_sector("busqueda_sector_web");
  $("#modal_agregar_sector").modal("show");
}
function cambio_tipo_sector(id)
{
  ocultar_busquedas();
  resetar_selecciones();
  
  $("#"+id).css("display","block");
}

function resetar_selecciones()
{
  $("#option_sector_web").val(0);
  $("#option_sector_web_rubro").val(0);
  $("#select_busqueda_rubro").val(0).trigger("change");
  $("#option_sector_web_subrubro").val(0);
  $("#select_busqueda_subrubro").val(0).trigger("change");
}

function ocultar_busquedas()
{
  $("#busqueda_sector_web").css("display","none");
  $("#busqueda_rubro").css("display","none");
  $("#busqueda_subrubro").css("display","none");
}

function agregar_sector()
{
  // OBTENIENDO SECTOR

  var seguir = true;

  var id_sector =0;
  var id_rubro =0;
  var id_subrubro =0;
  var html_tabla="";

  if($("#busqueda_sector_web").css("display") =="block")
  {
    id_sector = $("#option_sector_web").val();

    if(id_sector == 0)
    {
      alert("Por favor complete todos los datos");
      seguir=false;
    }
    else
    {
      var desc_sector = $("#option_sector_web :selected").text();

      html_tabla="<tr id='id_tr_"+proximo_id_sectores+"'> \n\
        <td>"+desc_sector+"</td> \n\
        <td></td> \n\
        <td></td> \n\
        <td> \n\
          <button class='btn btn-danger' onclick='sacar_sector("+proximo_id_sectores+")'><i class='fa fa-close'></i></button> \n\
        </td> \n\
      </tr>";
    }
  }
  else if($("#busqueda_rubro").css("display") =="block")
  {
    id_sector = $("#option_sector_web_rubro").val();
    id_rubro = parseInt($("#select_busqueda_rubro").val());

    if(id_sector == 0 || isNaN(id_rubro) || id_rubro <= 0)
    {
      alert("Por favor complete todos los datos");
      seguir=false;
    }
    else
    {
      var desc_sector = $("#option_sector_web_rubro :selected").text();
      var desc_rubro = $("#select_busqueda_rubro :selected").text();
      html_tabla="<tr id='id_tr_"+proximo_id_sectores+"'> \n\
        <td>"+desc_sector+"</td> \n\
        <td>"+desc_rubro+"</td> \n\
        <td></td> \n\
        <td> \n\
          <button class='btn btn-danger' onclick='sacar_sector("+proximo_id_sectores+")'><i class='fa fa-close'></i></button> \n\
        </td> \n\
      </tr>";
    }

  }else if($("#busqueda_subrubro").css("display") =="block")
  {
    id_sector = $("#option_sector_web_subrubro").val();
    id_subrubro = parseInt($("#select_busqueda_subrubro").val());

    if(id_sector == 0 || isNaN(id_subrubro) || id_subrubro <= 0)
    {
      alert("Por favor complete todos los datos");
      seguir=false;
    }
    else
    {
      var desc_sector = $("#option_sector_web_rubro :selected").text();
      var desc_subrubro = $("#select_busqueda_subrubro :selected").text();
      html_tabla="<tr id='id_tr_"+proximo_id_sectores+"'> \n\
        <td>"+desc_sector+"</td> \n\
        <td></td> \n\
        <td>"+desc_subrubro+"</td> \n\
        <td> \n\
          <button class='btn btn-danger' onclick='sacar_sector("+proximo_id_sectores+")'><i class='fa fa-close'></i></button> \n\
        </td> \n\
      </tr>";
    }
  }

  if(seguir)
  {
    var html_name="<div id='contenedor_name_sector_"+proximo_id_sectores+"'> \n\
    <input type='text' name='id_sector[]' value='"+id_sector+"'> \n\
    <input type='text' name='id_rubro[]' value='"+id_rubro+"'> \n\
    <input type='text' name='id_subrubro[]' value='"+id_subrubro+"'> \n\
    </div>";

    $("#contenedores_sectores_agregados").append(html_name);

    $("#cuerpo_sectores").append(html_tabla);

    proximo_id_sectores++;

    $("#modal_agregar_sector").modal("hide");
  }
}

function sacar_sector(id)
{
  $("#contenedor_name_sector_"+id).remove();
  $("#id_tr_"+id).remove();
}

function cambio_tamanio_imagen()
{
  var valor = $("#tamanio_imagen_a_subir").val();

  if(valor==0)
  {
    $("[name=width]").val(0);
    $("[name=height]").val(0);
  }
  else if(valor == 1)
  {
    $("[name=width]").val(170);
    $("[name=height]").val(638);
  }
  else if(valor == 2)
  {
    $("[name=width]").val(729);
    $("[name=height]").val(90);
  }
}

function guardar()
{
  var descripcion = $.trim($("[name=descripcion]").val());
  var url = $.trim($("[name=url]").val());
  var imagen = document.getElementById("imagen");

  var seguir = true;

  if(descripcion == ""){
    activar_error_label("label_descripcion");seguir=false;
  }else{
    desactivar_error_label("label_descripcion");
  }

  if(!isValidUrl(url,1,0)){
    activar_error_label("label_url");seguir=false;
  }else{
    desactivar_error_label("label_url");
  }

  if(!validar_input_file(imagen,true,new Array("jpg","png","gif","jpeg")))
  {
    activar_error_label("label_imagen");seguir=false;
  }else{
    desactivar_error_label("label_imagen");
  }


  if(seguir)
  {
    var d = $("#formulario");
    formdata = new FormData();
    
    // En el formdata colocamos todos los archivos que vamos a subir
    for (var i = 0; i < (d.find('input[type=file]').length); i++) { 
        // buscará todos los input con el valor "file" y subirá cada archivo. Serán diferenciados en el PHP gracias al "name" de cada uno.
        formdata.append((d.find('input[type="file"]').eq(i).attr("name")),((d.find('input[type="file"]:eq('+i+')')[0]).files[0]));            
    }
            
    for (var i = 0; i < (d.find('input').not('input[type=file]').not('input[type=submit]').length); i++) { 
        // buscará todos los input menos el valor "file" y "sumbit . Serán diferenciados en el PHP gracias al "name" de cada uno.
        formdata.append( (d.find('input').not('input[type=file]').not('input[type=submit]').eq(i).attr("name")),(d.find('input').not('input[type=file]').not('input[type=submit]').eq(i).val()) );            
        formdata.append( (d.find('select').not('select[type=file]').not('select[type=submit]').eq(i).attr("name")),(d.find('select').not('select[type=file]').not('select[type=submit]').eq(i).val()) );            
    }

    $.ajax({
      url: "<?php echo base_url()?>index.php/backoffice/agregar_publicidad_post",
      type: "POST",
      contentType: false,
      data:formdata,
      processData:false,
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

          if(data["respuesta"])
          {
            location.href="<?php echo base_url()?>index.php/backoffice/publicidades";
          }
          else
          {
            $("#mensaje_alert").text(data["mensaje"]);
            $("#modal_alert").modal("show");
          }
        }
        catch(e)
        {
          $("#mensaje_alert").text("Ha ocurrido un error");
          $("#modal_alert").modal("show");
        }
      },
      error: function(event){
        $("#modal_loading").modal("hide");
        $("#mensaje_alert").text("Ha ocurrido un error");
        $("#modal_alert").modal("show");
      },
    });  
  }
}

    </script>
</body>

</html>