<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendedor
 *
 * @author mario
 */
class Vendedor extends CI_Controller
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        $this->load->helper("url");
    }
    
    public function index()
    {
        if($this->verificarAcceso())
        {
            $this->load->model("Cliente_model");
            $this->load->model("Productos_model");
            
            $salida["clientes"]= $this->Cliente_model->getClientes();
            $salida["productos"]= $this->Productos_model->getProductos();
            
            $this->load->view("vendedor/escritorio",$salida);
        }
        else
        {
            redirect("Welcome/acceso");
        }
    }
    
    public function agregar_cliente()
    {
        if($this->verificarAcceso())
        {
            if(!$this->input->post())
            {
                $this->load->model("Cliente_model");
                $this->load->model("Provincias_model");
                $this->load->model("Vendedor_model");
                $this->load->model("Iva_model");

                $salida["provincias"]= $this->Provincias_model->getProvincias();
                $salida["vendedores"]=$this->Vendedor_model->getVendedores();
                $salida["tipos_iva"]=$this->Iva_model->getTiposIva();

                $this->load->view("vendedor/agregar_cliente",$salida);
            }
            else
            {
                $this->load->model("Cliente_model");
                $respuesta = $this->Cliente_model->registrarClientePorPost($this->input->post());
            }
        }
        else
        {
            redirect("Welcome/acceso");
        }
    }
    
    private function verificarAcceso()
    {
        if($this->session->userdata("ingresado") == true &&
           $this->session->userdata("tipo_usuario") == "2" &&
           $this->session->userdata("operativo") == "si")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
