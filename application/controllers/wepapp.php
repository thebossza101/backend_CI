<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Wepapp extends CI_Controller {
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
		$this->load->model('mTestapp','mTestapp');
			echo json_encode ( $this->mTestapp->testmoldel());

	}
    	public function test2()
	{
		//$this->load->view('welcome_message');
		$this->load->model('webapp','mTestapp');
			$text = $_POST['EMPCODE'];
			$PageNumber = $_POST['PageNumber'];
			$RowspPage = $_POST['RowspPage'];
			$res = $this->mTestapp->COUNT($text);
            $array = json_decode(json_encode($res), true);
            $totalrows =  $array[0]['computed'];
            //echo json_encode ($array);
			$totalPage = ceil( $totalrows/$RowspPage );
			$res2 = $this->mTestapp->get_EMPCODE($PageNumber,$RowspPage,$text);
			$res3['totalPage'] = $totalPage;
			$res3['totalrows'] = $totalrows;
			$res3['data'] = $res2;
        echo json_encode ( $res3); 
           

	}
	public function get_EMPCODE_EMPDESC()
	{
			//$text = 	$request->text;
		$text =   $_POST['text'];
		//$text2 =   $_POST['aaa'];
		//$this->load->view('welcome_message');
		$this->load->model('mTestapp','mTestapp');
			echo json_encode ( $this->mTestapp->get_EMPCODE_EMPDESC($text));
			//echo json_encode ($text2);

	}
	public function get_EMPCODE_detial()
	{
			//$text = 	$request->text;
		$EMPCODE =   $_POST['EMPCODE'];
		//$text2 =   $_POST['aaa'];
		//$this->load->view('welcome_message');
		$this->load->model('mTestapp','mTestapp');
			echo json_encode ( $this->mTestapp->get_EMPCODE_detial($EMPCODE));
			//echo json_encode ($text2);

	}
	public function delete_EMPCODE()
	{

		$EMPCODE =   $_POST['text'];
		//$this->load->view('welcome_message');
		$this->load->model('mTestapp','mTestapp');
			echo json_encode ( $this->mTestapp->delete_EMPCODE($EMPCODE));

	}
	public function insert()
	{

		$EMPCODE = $_POST['EMPCODE'];
		$EMPDESC = $_POST['EMPDESC'];
		$CUSTCODE = $_POST['CUSTCODE'];
		$VENDCODE = $_POST['VENDCODE'];
		$POSITION = $_POST['POSITION'];
		$CTCADR1 = $_POST['CTCADR1'];
		$CTCADR2 = $_POST['CTCADR2'];
		$EMAIL = $_POST['EMAIL'];
		$GROUPID = $_POST['GROUPID'];

		//$this->load->view('welcome_message');
		$this->load->model('mTestapp','mTestapp');
	$status = 	$this->mTestapp->insert_data($EMPCODE,$EMPDESC,$CUSTCODE,$VENDCODE,$POSITION,$CTCADR1,$CTCADR2,$EMAIL,$GROUPID);
			echo json_encode ($status);

	}
	public function edit()
	{

		$EMPCODE = $_POST['EMPCODE'];
		$EMPDESC = $_POST['EMPDESC'];
		$CUSTCODE = $_POST['CUSTCODE'];
		$VENDCODE = $_POST['VENDCODE'];
		$POSITION = $_POST['POSITION'];
		$CTCADR1 = $_POST['CTCADR1'];
		$CTCADR2 = $_POST['CTCADR2'];
		$EMAIL = $_POST['EMAIL'];
		$GROUPID = $_POST['GROUPID'];

		//$this->load->view('welcome_message');
		$this->load->model('mTestapp','mTestapp');
	$status = 	$this->mTestapp->update_data($EMPCODE,$EMPDESC,$CUSTCODE,$VENDCODE,$POSITION,$CTCADR1,$CTCADR2,$EMAIL,$GROUPID);
			echo json_encode ($status);

	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
