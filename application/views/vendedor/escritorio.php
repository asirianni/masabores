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
                
                .fila_titulo_producto
                {
                    background-color: #ccc;
                }
                
                .titulo_producto
                {
                    font-size: 15px;font-weight: bold;padding-bottom: 5px;
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
                    <a href="#" id="botonera4" class="btn btn-large btn-danger" onclick="boton_pulsado(4)"><i class="fa fa-plus"></i>4</a>
		</div>
                <div>
                    <h2 class="text-right">Total $<span id="total_venta">0</span></h2>
                    
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
                    <p class="explicacion-paso"><span class="numero-paso">Paso 3:</span> Buscar y seleccionar los productos</p>
                    <div id="buscador">
			<div class="form-group">
                            <label for="producto_buscar">Buscar un producto: </label>
                            <input type="text" class="form-control" id="producto_buscar">
			</div>
			<div class="form-group">
                            <label for="producto_buscar_por">Buscar por: </label>
                            <select class="form-control" id="producto_buscar_por">
                                <option value="codigo">codigo</option>
                                <option value="cod_prod">cod_prod</option>
                                <option value="descripcion">descripcion</option>
                            </select>
			</div>
			<div style="text-align: center">
                            <input type="button" class=" btn btn-large btn-primary" value="Buscar producto" onClick="buscar_producto()">
			</div>
                    </div>
                    
                    <div id="resultados-buscar-producto">
                    </div>
                </div>
        
                <div id="paso4" hidden="true">
                    <p class="explicacion-paso"><span class="numero-paso">Paso 4:</span> Finalizar compra</p>
                    <div class="pull-right">
                        <input type="button" class="btn btn-primary" onClick="registrar_pedido()" value="Registrar"/>
                    </div>
                    <div >
                        <table class="table table-hover table-bordered" id="tabla-de-compra">
                            
                        </table>
                    </div>
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
        var lista_precios_cliente = 0;
        
        var codigos_productos_agregados = new Array();
        
        
        function reiniciar_sistema()
        {
            cliente_seleccionado = 0;
            lista_precios_cliente = 0;
            codigos_productos_agregados = new Array();
            $("#tabla-de-compra").html("");
            $("#resultados-buscar-producto").html("");
            $("#total_venta").text("0");
        }
        
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
        function buscar_producto()
	{
            var texto_buscar = $("#producto_buscar").val();
            var campo = $("#producto_buscar_por").val();
            
            if(texto_buscar != "")
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/Response_Ajax/busquedaProductos",
                    data:{texto:texto_buscar,campo:campo,lista_precio:lista_precios_cliente},
                    beforeSend: function(event){},
                    success: function(data){
                        
                        alert(data);
                        data = JSON.parse(data);
                        
                        if(data)
                        {
                            $("#resultados-buscar-producto").html("");
                            var html_code = "";
                            for(var i=0; i < data.length;i++)
                            {
                            html_code +="<div class='fila-resultado'>"+
                                            "<h3>"+data[i]["descripcion"]+"  <input type='button' class='btn btn-primary' value='+' onclick='seleccionar_producto("+data[i]["codigo"]+",&#39;"+data[i]["descripcion"]+"&#39;,&#39;"+data[i]["precio"]+"&#39;)'/></h3>"+
                                            "codigo: "+data[i]["codigo"]+"<br/>"+
                                            "precio: "+data[i]["precio"]+"<br/>"+
                                    "</div>";
                            }
                            $("#resultados-buscar-producto").html(html_code);
                            /*$("#paso1").attr("hidden","true");
                            $("#paso2").removeAttr("hidden");
                            $("#botonera1").removeClass("btn-primary");
                            $("#botonera1").addClass("btn-danger");
                            $("#botonera2").removeClass("btn-danger");
                            $("#botonera2").addClass("btn-primary");*/
                        }
                        else
                        {
                            alert("No se ha encontrado ningun cliente");
                        }
                    },
                    error: function(event){alert("error");},
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
                    
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/getListaPrecioCliente",
                data:{codigo:id},
                beforeSend: function(event){},
                success: function(data){
                    data = JSON.parse(data);
                    lista_precios_cliente= data;
                    
                    $("#paso2").attr("hidden","true");
                    $("#paso3").removeAttr("hidden");
                    $("#botonera2").removeClass("btn-primary");
                    $("#botonera2").addClass("btn-danger");
                    $("#botonera3").removeClass("btn-danger");
                    $("#botonera3").addClass("btn-primary");
                    
                    
                },
                error: function(event){alert("error");},
             });   
            
	}
        
        function seleccionar_producto(id,descripcion,precio)
        {
            if(arrayBuscarElemento(codigos_productos_agregados,id) != null)// FIJARSE SI SE AGREGO
            {
                var cantidad = parseInt($("#cantidad_"+id).val());
                var precio = parseFloat($("#precio_"+id).val()).toFixed(2);
                var descuento = parseFloat($("#descuento_"+id).val()).toFixed(2);
                
                cantidad+=1;
                
                var total = precio * cantidad;
                
                
                // obteniendo descuento
                descuento = descuento / 100;
                descuento = 1 - descuento;
                
                total*= descuento;
                
                $("#subtotal_"+id).text(total);
                $("#cantidad_"+id).val(cantidad);
                
            }
            else
            {
                var html_code = $("#tabla-de-compra").html();
                html_code += "<div id='codigo_"+id+"'>"+
                                    "<tr id='fila_1_"+id+"' class='fila_titulo_producto'>"+
                                        "<td class='titulo_producto' colspan='2'>"+descripcion+"</td>"+
                                    "</tr>"+
                                    "<tr id='fila_2_"+id+"'>"+
                                        "<td>Cantidad:</td>"+
                                        "<td><input type='number' onChange='cambio_valor("+id+")' id='cantidad_"+id+"' value='1'/></td>"+
                                    "</tr>"+
                                    "<tr id='fila_3_"+id+"'>"+
                                        "<td>Precio</td>"+
                                        "<td><input type='number' onChange='cambio_valor("+id+")' id='precio_"+id+"' value='"+precio+"'/></td>"+
                                    "</tr>"+
                                    "<tr id='fila_4_"+id+"'>"+
                                        "<td>Subtotal:</td>"+
                                        "<td id='subtotal_"+id+"'>"+precio+"</td>"+
                                    "</tr>"+
                                    "<tr id='fila_5_"+id+"'>"+
                                        "<td>Descuento:</td>"+
                                        "<td><input type='number'  onChange='cambio_valor("+id+")' id='descuento_"+id+"' value='0'/></td>"+
                                    "</tr>"+
                                    "<tr id='fila_6_"+id+"'>"+
                                        "<td>Eliminar:</td>"+
                                        "<td><input type='button' class='btn btn-danger' value='X' onClick='eliminar_producto("+id+")'/></td>"+
                                    "</tr>"+
                                "</div>";
                $("#tabla-de-compra").html(html_code);
                
                codigos_productos_agregados.push(id);
            }
            
            actualizar_total();
        }
        
        function boton_pulsado(id)
        {
            for(var i=1; i <= 4;i++)
            {
                $("#botonera"+i).removeClass("btn-primary");
                $("#botonera"+i).addClass("btn-danger");
                $("#paso"+i).removeAttr("hidden");
                $("#paso"+i).attr("hidden","true");
            }
            
            $("#botonera"+id).removeClass("btn-danger");
            $("#botonera"+id).addClass("btn-primary");
            $("#paso"+id).removeAttr("hidden");
            
            if(id == 1 || id == 2)
            {
                alert("reinicio");
                reiniciar_sistema();
            } 
        }
        
        function eliminar_producto(id)
        {
            var posicion = arrayBuscarElemento(codigos_productos_agregados,id);
            delete codigos_productos_agregados[posicion];
            
            var subtotal = parseFloat($("#subtotal_"+id).text()).toFixed(2);
            
            $("#fila_1_"+id).remove();
            $("#fila_2_"+id).remove();
            $("#fila_3_"+id).remove();
            $("#fila_4_"+id).remove();
            $("#fila_5_"+id).remove();
            $("#fila_6_"+id).remove();
            $("#codigo_"+id).remove();
            //$("#codigo_"+id).remove();
            
            var total = parseFloat($("#total_venta").text()).toFixed(2);
            total -= subtotal;
            $("#total_venta").text(total);   
        }
        
        function actualizar_total()
        {
            var total = 0.00;
            
            for(var i=0; i < codigos_productos_agregados.length;i++)
            {
                if(codigos_productos_agregados[i] != undefined)
                {
                    var cantidad = parseInt($("#cantidad_"+codigos_productos_agregados[i]).val());
                    var precio = parseFloat($("#precio_"+codigos_productos_agregados[i]).val()).toFixed(2);
                    var descuento = parseFloat($("#descuento_"+codigos_productos_agregados[i]).val()).toFixed(2);


                    var total_producto = precio * cantidad;


                    // obteniendo descuento
                    descuento = descuento / 100;
                    descuento = 1 - descuento;

                    total_producto*= descuento;

                    total+= total_producto;
                }
            }
            
            $("#total_venta").text(total.toFixed(2));
            
        }
        
        function cambio_valor(id)
        {
            var cantidad = parseInt($("#cantidad_"+id).val());
            var precio = parseFloat($("#precio_"+id).val()).toFixed(2);
            var descuento = parseFloat($("#descuento_"+id).val()).toFixed(2);


            var total_producto = precio * cantidad;


            // obteniendo descuento
            descuento = descuento / 100;
            descuento = 1 - descuento;

            total_producto*= descuento;
            
            $("#subtotal_"+id).text(total_producto);
            actualizar_total();
        }
        
        function registrar_pedido()
        {
            // DATOS PARA REGISTRAR EL PEDIDO
            cliente_seleccionado;
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/registroPedidoPorVendedor",
                data:{cliente:cliente_seleccionado,total:$("#total_venta").text()},
                beforeSend: function(event){},
                success: function(data){
                        
                    data = JSON.parse(data);
                        
                    
                },
                error: function(event){alert("error");},
            });
            
            // REGISTRAR EL PEDIDO DETALLE
            
            var pedido_detalle = new Array();
            
            for(var i=0; i < codigos_productos_agregados.length;i++)
            {
                if(codigos_productos_agregados[i] != undefined)
                {
                    var cantidad = parseInt($("#cantidad_"+codigos_productos_agregados[i]).val());
                    var precio = parseFloat($("#precio_"+codigos_productos_agregados[i]).val()).toFixed(2);
                    var descuento = parseFloat($("#descuento_"+codigos_productos_agregados[i]).val()).toFixed(2);
                    
                    var arreglo = new Array(4);
                    arreglo[0]=codigos_productos_agregados[i];
                    arreglo[1]=cantidad;
                    arreglo[2]=precio;
                    arreglo[3]=descuento;
                    pedido_detalle.push(arreglo);
                }
            }
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Response_Ajax/registroPedidoDetallePorVendedor",
                data:{arreglo:pedido_detalle},
                beforeSend: function(event){},
                success: function(data){
                        
                    data = JSON.parse(data);
                    location.href="<?php echo base_url()?>index.php/Vendedor";
                },
                error: function(event){alert("error");},
            });
    
            /*
            for(var i=0; i < pedido_detalle.length;i++)
            {
                alert(pedido_detalle[i][0] + " "+ pedido_detalle[i][1]+ " "+ pedido_detalle[i][2]);
            }*/
            
            
        }
        
        function arrayBuscarElemento(arreglo,elemento) // DEVUELVE LA POSICION O NULL
        {
            var respuesta = false;
            var posicion = null;
            var i=0;
            while ((respuesta == false) && (i < arreglo.length))
            {
                    if (arreglo[i] == elemento)
                    {
                            respuesta = true;
                            posicion= i;
                    }
                    i++;
            }
            return posicion;
        }
        
	</script>
    
</body>

</html>