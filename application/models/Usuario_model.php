<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_model
 *
 * @author adrians
 */
class Usuario_model extends CI_Model{
    
    public function __construct() {
        parent::__construct ();
        $this->load->database();
        $this->load->library("Usuario");
    }
    
    public function get_usuario($usua, $pass) {
        
        $usuario= new Usuario();
        $usuario->setExiste(false);
        
        $sql="SELECT * FROM empleados WHERE usuario = ? and pass = ?";
        $query = $this->db->query($sql,Array($usua,$pass));
        $valor_obtenido=$query->row_array();
        
        if ($valor_obtenido!=null) {
            $usuario->setExiste(true);
            $usuario->setDni($valor_obtenido["dni"]);
            $usuario->setCorreo($valor_obtenido["correo"]);
            $usuario->setUsuario($valor_obtenido["usuario"]);
            $usuario->setPass($valor_obtenido["pass"]);
            $usuario->setNombre($valor_obtenido["nombre"]);
            $usuario->setApellido($valor_obtenido["apellido"]);
            $usuario->setTelefono($valor_obtenido["telefono"]);
            $usuario->setMovil($valor_obtenido["movil"]);
            $usuario->setTipo_usuario($valor_obtenido["tipo_usuario"]);
            $usuario->setDireccion($valor_obtenido["direccion"]);
            $usuario->setCod_sucursal($valor_obtenido["cod_sucursal"]);
            $usuario->setCod_localidad($valor_obtenido["cod_localidad"]);
            $usuario->setImagen($valor_obtenido["imagen"]);
            $usuario->setInicio($valor_obtenido["inicio"]);
            $usuario->setOperativo($valor_obtenido["operativo"]);
        }
        return $usuario;
    }
    
    public function getUsuarioPorCorreo($correo)
    {
        $query = $this->db->query("select * from cliente where correo = '$correo'");
        return $query->row_array();
    }
    
    public function existe_usuario($correo) {
        $validacion=false;
        $query = $this->db->query("select correo from empleados where correo = '$correo' ");
        $valor_obtenido=$query->row_array();
        if ($valor_obtenido) {
            $validacion=true;
        }
        return $validacion;
    }
    
    function obtener_pass($correo, $pass) {
        $query = $this->db->query("SELECT * FROM empleados where correo = ".$correo."and pass=".$pass);
        return $query->row_array();
    }
    
    // Devuelve todos los datos del usuario, pero relacionados.
    function getDatosRelacionados($dni)
    {
        $query = $this->db->query("SELECT dni, correo, usuario, pass, nombre, apellido, telefono, movil,"
                                        . "tipo_usuario.tipo as tipo_usuario, empleados.direccion,"
                                        . "sucursales.descripcion as sucursal, localidades.descripcion as localidad,"
                                        . "empleados.imagen,empleados.inicio,empleados.operativo from empleados "
                                        . "INNER JOIN tipo_usuario on empleados.tipo_usuario = tipo_usuario.codigo "
                                        . "INNER JOIN sucursales on empleados.cod_sucursal = sucursales.numero "
                                        . "INNER JOIN localidades on empleados.cod_localidad = localidades.cod_localidad "
                                        . "where dni =".$dni);
        return $query->row_array();
    }
    
    // Cambia los datos del usuario, donde sus CF estan relacionadas
    function actualizaDatosUsuario($dni,$usuario,$pass,$nombre,$apellido,$telefono,$movil,$direccion,$correo,$imagen)
    {
        if($imagen =="")
        {
            $query = $this->db->query("SELECT imagen FROM empleados where dni = ".$dni);
            $query = $query->row_array();
            $imagen = $query["imagen"];
            
        }
        
        $data = array(
            'dni' => $dni,
            'usuario' => $usuario,
            'pass' => $pass,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'movil' => $movil,
            'direccion' => $direccion,
            'correo' => $correo,
            'imagen' =>$imagen
        );
        
        $this->db->where('dni', $dni);
        
        $respuesta =  $this->db->update('empleados', $data);
        
        var_dump($respuesta);
        // Si no quiso cambiar la imagen
        if($imagen == ""){}
    }
    
    public function obtenerUsuarioPorUsuario($usuario)
    {
        $r = $this->db->query("select * from cliente where usuario = '$usuario'");
        return $r->row_array();
    }
    
    public function obtenerUsuarioPorCorreo($correo)
    {
        $r = $this->db->query("select * from cliente where correo = '$correo'");
        return $r->row_array();
    }
    
    public function obtenerUsuarioPorUsuarioExcepto($usuario,$codigo)
    {
        $r = $this->db->query("select * from cliente where usuario = '$usuario' and codigo <> $codigo");
        return $r->row_array();
    }
    
    public function obtenerUsuarioPorCorreoExcepto($correo,$codigo)
    {
        $r = $this->db->query("select * from cliente where correo = '$correo' and codigo <> $codigo");
        return $r->row_array();
    }
}
