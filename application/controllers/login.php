<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct()
       {
            parent::__construct();
        
       }
	
	public function index() {
	$this->load->view('login');
		}
	public function check() {
		$user = $_GET['user'];
		$pass = $_GET['pass'];
		$this->load->model('logincheck','login');
		$data = $this->login->login_check($user,$pass);
		if($data)
			{
			$this->session->set_userdata('Username',$data['Username']);
			echo "<font color=Green>Successful</font>";
			}else{
			echo "<font color=red>** Username & Password is wrong</font>";	
			}
		}
			
}