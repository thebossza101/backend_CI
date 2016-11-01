<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Moblieapi extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
    public function get_data()
	{
        $table = "MBDATA";
        $SELECT = "*";
        $WHERE = "";
        $ORDERBY = "";
    $this->load->model('Webapp2model','Webapp2model');
     $res = $this->Webapp2model->select($table,$SELECT,$WHERE,$ORDERBY);
     echo json_encode ($res);
	}
	     public function qrysql()
	{
       $post = json_decode(file_get_contents('php://input'), true);
	   $sql = $post['sql'];
	   $mode = $post['mode'];
	 
    $this->load->model('Webapp2model','Webapp2model');
     $res = $this->Webapp2model->qrysql($sql,$mode);
     echo json_encode ($res);
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
