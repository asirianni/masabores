<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Response_Ajax
 *
 * @author mario
 */
class Response_Ajax extends CI_Controller
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function busquedaClientes()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model("Cliente_model");
            
            $texto= $this->input->post("texto");
            $campo= $this->input->post("campo");
            
            $clientes = $this->Cliente_model->getBusquedaClientesPorCampo($texto,$campo);
            
            echo json_encode($clientes);
        }
    }
    
    public function getListaPrecioCliente()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model("Cliente_model");
            
            $codigo= $this->input->post("codigo");
            
            $lista_precio = $this->Cliente_model->getListaPreciosCliente($codigo);
            
            echo json_encode($lista_precio);
        }
    }
    
    public function busquedaProductos()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model("Productos_model");
            
            $texto= $this->input->post("texto");
            $campo= $this->input->post("campo");
            $lista_precio= $this->input->post("lista_precio");
            
            $productos = $this->Productos_model->buscarProductosPorCampo($texto,$campo,$lista_precio);
            
            echo json_encode($productos);
        }
    }
    
    public function getPrecioProductoSegunLista()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model("Productos_model");
            
            $lista_precio= $this->input->post("lista_precio");
            
            $precio = $this->Productos_model->getPrecioProductoSegunLista($lista_precio);
            
            echo json_encode($precio);
        }
    }
    
    public function registroPedidoPorVendedor()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Pedido_model");
            
            $cliente= $this->input->post("cliente");
            $total= $this->input->post("total");
            $arreglo= $this->input->post("arreglo");
            
            $respuesta = $this->Pedido_model->registroPedidoPorVendedor($cliente,$total,$arreglo);
            
            echo json_encode($respuesta);
        } 
    }
    
    public function registroPedidoDetallePorVendedor()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Pedido_model");
            
            $arreglo= $this->input->post("arreglo");
            
            $respuesta = $this->Pedido_model->registroPedidoDetallePorVendedor($arreglo);
            
            
            echo json_encode($respuesta);
        } 
    }
    
    public function obtenerLocalidadesDeProvincia()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Provincias_model");
            
            $provincia= $this->input->post("provincia");
            $respuesta = $this->Provincias_model->getLocalidadesDeProvincia($provincia);
            
            echo json_encode($respuesta);
        } 
    }
    
    public function obtenerProvinciasDePais()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Provincias_model");
            
            $pais= $this->input->post("pais");
            $respuesta = $this->Provincias_model->getProvinciasPorPais($pais);
            
            echo json_encode($respuesta);
        } 
    }
    
    public function eliminarCliente()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Cliente_model");
            
            $cliente= $this->input->post("codigo");
            
            $respuesta = $this->Cliente_model->eliminar_cliente($cliente);
            
            echo json_encode($respuesta);
        } 
    }
    
    public function agregarCliente()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Cliente_model");
            
            
            
            $respuesta = $this->Cliente_model->registrarClientePorPost($this->input->post());
            
            echo json_encode($respuesta);
        } 
    }
    
    public function modificarCliente()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Cliente_model");
            
            
            
            $respuesta = $this->Cliente_model->modificarCliente($this->input->post("codigo"),$this->input->post("usuario"),$this->input->post("correo"),$this->input->post("pass"),$this->input->post("nombre"),$this->input->post("apellido"),$this->input->post("razon_social"),$this->input->post("nombre_comercial"),
                                   $this->input->post("direccion"),$this->input->post("provincia"),$this->input->post("localidad"),$this->input->post("cod_postal"),$this->input->post("pais"),$this->input->post("celular"),$this->input->post("fijo"),$this->input->post("tipo_iva"),
                                   $this->input->post("estado"),$this->input->post("lista_precios"),$this->input->post("vendedor"),$this->input->post("codigo_masabores"),$this->input->post("dni_cuil"));
            
            echo json_encode($respuesta);
        } 
    }
    
    public function getCliente()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Cliente_model");
            
            $cliente= $this->input->post("codigo");
            
            $respuesta = $this->Cliente_model->getCliente($cliente);
            
            echo json_encode($respuesta);
        } 
    }
    
    
}