<?php
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
            
            $respuesta = $this->Pedido_model->registroPedidoPorVendedor($cliente,$total);
            
            echo json_encode($respuesta);
        } 
    }
    
    public function registroPedidoDetallePorVendedor()
    {
       if($this->input->is_ajax_request())
        {
            $this->load->model("Pedido_model");
            
            $pedido= $this->Pedido_model->getUltimoIdPedido();
            $arreglo= $this->input->post("arreglo");
            
            $respuesta = $this->Pedido_model->registroPedidoDetallePorVendedor($pedido,$arreglo);
            
            
            echo json_encode($respuesta);
        } 
    }
}