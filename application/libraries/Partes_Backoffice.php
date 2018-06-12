<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partes_Backoffice
 *
 * @author mario
 */
class Partes_Backoffice 
{
    //put your code here
    
    public function getMenuLateralAdministrador()
    {
        $html=
        "<div class='navbar-default sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse'>
                    <ul class='nav' id='side-menu'>
                        <!-- 
                        	<li class='sidebar-search'>
                            	<div class='input-group custom-search-form'>
	                                <input type='text' class='form-control' placeholder='Buscar...'>
	                                <span class='input-group-btn'>
	                                	<button class='btn btn-default' type='button'>
	                                    	<i class='fa fa-search'></i>
	                                	</button>
	                            	</span>
                            	</div>
                            
                        	</li><!-- /input-group -->	
                        <li>
                            <a href='".site_url('backoffice/escritorio')."'><i class='fa fa-dashboard fa-fw'></i> Escritorio</a>
                        </li>

                        <li>
                            <a href='".site_url('backoffice/publicidades')."'><i class='fa fa-table fa-mouse-pointer'></i> Publicidades</a>
                        </li>

                        <li>
                            <a href='".site_url('backoffice/videos')."'><i class='fa fa-table fa-mouse-pointer'></i> Videos</a>
                        </li>

<!--                        <li>
                            <a href='".site_url('backoffice/abm_rubros')."'><i class='fa fa-table fa-fw'></i> Home</a>
                        </li>
                        
                        -->
                        <li>
                            <a href='".site_url('backoffice/pedidos/0')."'><i class='fa fa-table fa-fw'></i> Pedidos</a>
                        </li>
                        <li>
                            <a href='".site_url('backoffice/productos')."'><i class='fa fa-table fa-fw'></i> Productos</a>
                        </li>
                        <li>
                            <a href='".site_url('backoffice/clientes')."'><i class='fa fa-table fa-fw'></i> Clientes</a>
                        </li>
                        <li>
                            <a href='".site_url('backoffice/abm_precios_administrador')."'><i class='fa fa-table fa-fw'></i> Precios</a>
                        </li>
<!--                        <li>
                            <a href='".site_url('backoffice/usuarios')."'><i class='fa fa-table fa-fw'></i> Usuarios</a>
                        </li>
                        <li>
                            <a href='".site_url('backoffice/config')."'><i class='fa fa-wrench fa-fw'></i> Configuracion</a>-->
                        <!--</li>-->
                        <li>
                            <a href='".site_url('backoffice/config')."'><i class='fa fa-wrench fa-fw'></i> Configuracion</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>";
        return $html;
    }
}
