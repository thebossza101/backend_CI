<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Webapp_sfrc extends CI_Controller {
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
	public function test()
	{
		//$this->load->view('welcome_message');
		$this->load->model('Webapp2model','Webapp2');
			echo json_encode ( $this->Webapp2->testmoldel('SFRATE'));
	}
      public function search_data()
  {
	$post = json_decode(file_get_contents('php://input'), true);
	$data = $post['data'];
	$PageNumber = $post['PageNumber'];
	$RowspPage = $post['RowspPage'];
    $table = $post['table'];
    $ORDERBY = $post['ORDERBY'];
   //$data['PMKEY'] = "";
   //$PageNumber = "1";
   //$RowspPage = "10";
   //$table = "SFRATE";
   //$ORDERBY = "PMKEY";
    $this->load->model('Webapp2model','Webapp2');
    $totalrows = $this->Webapp2->COUNT_and($data,$table);
    $totalPage = ceil( $totalrows/$RowspPage );
    $res2 = $this->Webapp2->get_searchdata_and($PageNumber,$RowspPage,$table,$data,$ORDERBY);
	$res3['data'] = $res2;
	$res3['totalrows'] = $totalrows;
	$res3['totalPage'] = $totalPage;
	echo json_encode ($res3);
  }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
