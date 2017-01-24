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
            
            $salida["clientes"]= $this->Cliente_model->getClientes();
            
            $this->load->view("vendedor/escritorio",$salida);
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
