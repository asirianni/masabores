<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exportar_obra_detalle
 *
 * @author mario
 */
class Exportar_pedido extends TCPDF{
    //put your code here
    
    public $html="";
    
    function __construct()
    {
         parent::__construct('P', 'mm', 'A4', true, 'UTF-8', false);
    }
    
    public function setHtml($datos_cliente,$pedido,$tipo_entrega,$fecha_entrega,$datos_local,$detalle)
    {
        $this->html=
        "
        <style type=text/css>
        th{ font-size:11px;}
        td{font-size:11px;}
        
        </style>
        <h1 style='text-align: center;'>Datos del cliente</h1>
        <table>
            <tr>
                <th>Numero</th>
                <td>".$datos_cliente["codigo"]."</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>".$datos_cliente["correo"]."</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>".$datos_cliente["nombre"]."</td>
            </tr>
            <tr>
                <th>Apellido</th>
                <td>".$datos_cliente["apellido"]."</td>
            </tr>
            <tr>
                <th>Celular</th>
                <td>".$datos_cliente["celular"]."</td>
            </tr>
            <tr>
                <th>Fijo</th>
                <td>".$datos_cliente["fijo"]."</td>
            </tr>
            <tr>
                <th>CUIL/DNI</th>
                <td>".$datos_cliente["dni"]."</td>
            </tr>
        </table>
        <h1 style='text-align: center;'>Datos del pedido</h1>
        <table>
            <tr>
                <th>Pedido</th>
                <td>".$pedido['numero']."</td>
            </tr>
            <tr>
                <th>Fecha recibido</th>
                <td>".$pedido['fecha']."</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>".$pedido['total']."</td>
            </tr>
            <tr>
                <th>Pago</th>
                <td>".$pedido['pago']."</td>
            </tr>
            <tr>
                <th>Tipo Entrega</th>
                <td>".$tipo_entrega."</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>".$fecha_entrega."</td>
            </tr>";
        
            if($tipo_entrega=="entrega"){
$this->html.="<tr>
	        <th>Direccion</th>
		<td>".$pedido['direccion_entrega']."</td>
	    </tr>
            <tr>
	        <th>Localidad</th>
		<td>".$pedido['localidad']."</td>
	    </tr>
            <tr>
	        <th>Detalle</th>
		<td>".$pedido['detenvio']."</td>
	    </tr>";
            }else{
$this->html.="<tr>
                <th>Local</th>
		<td>".$datos_local['cod_web']."</td>
	    </tr>
            <tr>
	        <th>Direccion</th>
		<td>".$datos_local['dire']."</td>
	    </tr>
            <tr>
	        <th>Localidad</th>
		<td>".$datos_local['localidad']."</td>
	    </tr>";
            }
            
$this->html.="</table>
        <h1>Detalle del pedido</h1>
        <table>
            <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cant</th>
                <th>Pre</th>
                <th>Desc</th>
            </tr>";
                           	
        foreach ($detalle as $d){
$this->html.="<tr>
	        <td>".$d['codigo']."</td>
                <td>".$d['producto']."</td>
                <td>".$d['cantidad']."</td>
                <td>".$d['precio']."</td>
                <td>".$d['descuento']."</td>    
            </tr>";
        }  
            
$this->html.="</table>";
    }
    
    public function getPdf()
    {
        $this->SetCreator(PDF_CREATOR);
        $this->SetAuthor('TinkaLaWinka');
        $this->SetTitle('Datos de obra');
        $this->SetSubject('');
        $this->SetKeywords('');
 
        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $this->SetHeaderData(null, 0, "Masabores", "Exportacion de pedido", array(0, 0, 0), array(0, 64, 128));
        $this->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->SetFooterMargin(PDF_MARGIN_FOOTER);

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //relación utilizada para ajustar la conversión de los píxeles
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // establecer el modo de fuente por defecto
        $this->setFontSubsetting(true);

        // Establecer el tipo de letra

        //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
        // Helvetica para reducir el tamaño del archivo.
        $this->SetFont('freemono', '', 14, '', true);

        // Añadir una página
        // Este método tiene varias opciones, consulta la documentación para más información.
        $this->AddPage();
 
        //fijar efecto de sombra en el texto
        $this->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        
        // Imprimimos el texto con writeHTMLCell()
        $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $this->html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
        // ---------------------------------------------------------
        // Cerrar el documento PDF y preparamos la salida
        // Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Localidades de EntreRios.pdf");
        $this->Output($nombre_archivo, 'I');
    }
}
