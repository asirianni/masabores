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
    
    <!-- CSS MARIO STYLES :D -->
	<style>
		.header{
			background-color: #5ca319;
			border-radius: 20px;
			color: #fff;
		}

		.fila-resultado{
			margin-top: 1px;
			border-top: 2px;
			border-left: 0px;
			border-right: 0px;
			border-bottom: 0px;
			border-color: #000;
			border-style: solid;
		}
		.fila-resultado h3{
			text-decoration: underline;
			color: #337ab7;
			font-weight: bold;
			font-size: 22px;
		}
                #botonera{
                    text-align: center;
                }
                
                #botonera a{
                    width: 50px;
                    height: 50px;
                    color: #fff;
                    font-size: 24px;
                    font-weight: bold;
                }
                
                .numero-paso
                {
                    color: #337ab7;
                    font-size: 24px;
                    font-weight: bold;
                }
                
                .explicacion-paso
                {
                    font-size: 18px;
                    color: #d9534f;
                    font-weight: bold;
                }
    </style>
</head>

<body>
    
    <div class="container-fluid">
		<div class="header">
			<h3 class="text-center">Vendedor</h3>
		</div>

		<div id="botonera">
                    <a href="#" id="botonera1" class="btn btn-large btn-primary" onclick="boton_pulsado(1)"><i class="fa fa-plus"></i>1</a>
                    <a href="#" id="botonera2" class="btn btn-large btn-danger" onclick="boton_pulsado(2)"><i class="fa fa-plus"></i>2</a>
                    <a href="#" id="botonera3" class="btn btn-large btn-danger" onclick="boton_pulsado(3)"><i class="fa fa-plus"></i>3</a>
                    <a href="#" id="botonera3" class="btn btn-large btn-danger" onclick="boton_pulsado(4)"><i class="fa fa-plus"></i>4</a>
		</div>

		<div id="paso1">
                    <p class="explicacion-paso"><span class="numero-paso">Paso 1:</span> Buscar el cliente</p>
			<div id="buscador">
				<div class="form-group">
					<label for="cliente_buscar">Buscar un cliente: </label>
					<input type="text" class="form-control" id="cliente_buscar">
				</div>
				<div class="form-group">
					<label for="cliente_buscar_por">Buscar por: </label>
					<select class="form-control" id="cliente_buscar_por">
                                                <option value="dni_cuil">dni o cuit</option>
						<option value="usuario">usuario</option>
						<option value="correo">correo</option>
                                                <option value="celular">celular</option>
                                                <option value="fijo">telefono</option>
					</select>
				</div>
				<div style="text-align: center">
					<input type="button" class=" btn btn-large btn-primary" value="Buscar cliente" onClick="buscar_cliente()">
				</div>
			</div>
		</div>
        
                <div id="paso2" hidden="true">
                    <p class="explicacion-paso"><span class="numero-paso">Paso 2:</span> Seleccionar el cliente</p>
                    
                    <div id="resultados-buscar-cliente">
				
                    </div>
                </div>
        
                <div id="paso3" hidden="true">
                    <p class="explicacion-paso"><span class="numero-paso">Paso 3:</span> Seleccionar los productos</p>
                    
                </div>
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

	var cliente_seleccionado = 0;

	function buscar_cliente()
	{
            
            
            
            var texto_buscar = $("#cliente_buscar").val();
            var campo = $("#cliente_buscar_por").val();
            
            if(texto_buscar != "")
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_Ajax/busquedaClientes",
                    data:{texto:texto_buscar,campo:campo},

                    beforeSend: function(event){},
                    success: function(data){
                        data = JSON.parse(data);

                        if(data)
                        {
                            $("#resultados-buscar-cliente").html("");

                            var html_code = "";

                            for(var i=0; i < data.length;i++)
                            {

                            html_code +="<div class='fila-resultado'>"+
                                            "<h3 onclick='seleccionar_usuario("+data[i]["codigo"]+")'>"+data[i]["nombre"]+" "+data[i]["apellido"]+"</h3>"+
                                            "dni-cuil: "+data[i]["dni_cuil"]+"<br/>"+
                                            "Usuario: "+data[i]["usuario"]+"<br/>"+
                                            "correo: "+data[i]["correo"]+"<br/>"+
                                            "Direccion: "+data[i]["direccion"]+"<br/>"+
                                            "Celular: "+data[i]["celular"]+"<br/>"+
                                            "Fijo: "+data[i]["fijo"]+"<br/>"+
                                    "</div>";
                            }

                            $("#resultados-buscar-cliente").html(html_code);

                            $("#paso1").attr("hidden","true");
                            $("#paso2").removeAttr("hidden");

                            $("#botonera1").removeClass("btn-primary");
                            $("#botonera1").addClass("btn-danger");

                            $("#botonera2").removeClass("btn-danger");
                            $("#botonera2").addClass("btn-primary");
                        }
                        else
                        {
                            alert("No se ha encontrado ningun cliente");
                        }
                    },
                    error: function(event){},
                });    
            }
            else
            {
                alert("Rellene el campo buscar");
            }
        }

	function seleccionar_usuario(id)
	{
            cliente_seleccionado = id;
            $("#paso2").attr("hidden","true");
            $("#paso3").removeAttr("hidden");
            
            $("#botonera2").removeClass("btn-primary");
            $("#botonera2").addClass("btn-danger");
            
            $("#botonera3").removeClass("btn-danger");
            $("#botonera3").addClass("btn-primary");
            
	}

        function boton_pulsado(ud)
        {
            
        }
	</script>
    
</body>

</html>