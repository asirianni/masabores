<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer{
    public function Mailer(){
        require_once("mailer/class.phpmailer.php");
        require_once("mailer/class.smtp.php");
    }
}
/* End of file */
/* Location: ./application/libraries/ */