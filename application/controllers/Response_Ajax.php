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
}
