<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Onload{
	private $d;
	public function __construct()
       {
          $this->d =& get_instance();
       }
	public function checklogin()
       {
		   $controller=$this->d->router->class;
		   $method=$this->d->router->method;
		   $Username=$this->d->session->userdata('Username');
		   if($controller=='login' and $method='index')
		   {
			   if($Username)
			    {
						header( 'Location:import' );
						exit();
				}	
		   }
		    else
			{
				if($Username)
			    {
						
				}
				else{
					echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Please Login')
    window.location.href='login';
    </SCRIPT>");
					
					}		
				
						
							
				
			}
			 		
		  
		   
	   }
}