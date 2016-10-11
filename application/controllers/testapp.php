<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testapp extends CI_Controller {
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
	public function push()
	{

			$tokens = array("fCvvsUyKbUU:APA91bErwNVJUBoVKuEEHBZg3TWVio8ex9Bar5bBlpbZBqXANVBp6_CqcvBBz6CQsSnE6FF36cRMYy6T4AVhXMo93-xB_LSR35_uLFJC9RvPZVvzxFeRF4tq37COcKj_tvXMAvvLW7NW","cBGx2rc6SI8:APA91bHbq9RvQqMh9WpyrQzhb16S1crRrVxh0WNb04GtYlwLVpazC-udRCSNqao6V369sxZRNowv01eZf_v_-SvQHkqWqFEFryIwdyxtsoE8TyoBPcBtW_CQ-sO2GyQaTzLdW114jlSN");
		$msg = array('message' => 'Hello World!', 'title' => 'test notification');
		$fields = array('tokens' => $tokens, 'profile' => 'test_push', 'notification' => $msg);
		  $headers = array(
		    "Content-Type:application/json",
		    "Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJlMGJlMzAxMC1jMzQ2LTQ0MTAtYWIyYS0xN2ZhYjE2ZWRjNTEifQ.rK7EpG8nECn0FexZs4AagvhdsO794eT1NaonlRKvz00"
		  );
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL, "https://api.ionic.io/push/notifications");
		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		  $result = curl_exec($ch);
		  if($result == false) {
		    echo('Curl failed: ' . curl_error($ch));
		  }
		  curl_close($ch);
		  $rtn["code"] = "000";//means result OK
		  $rtn["msg"] = "OK";
		  $rtn["result"] = $result;
			print_r($rtn);
		  return($rtn);


	}
	public function push2($title,$message)
	{


		$tokens = array("fCvvsUyKbUU:APA91bErwNVJUBoVKuEEHBZg3TWVio8ex9Bar5bBlpbZBqXANVBp6_CqcvBBz6CQsSnE6FF36cRMYy6T4AVhXMo93-xB_LSR35_uLFJC9RvPZVvzxFeRF4tq37COcKj_tvXMAvvLW7NW","cBGx2rc6SI8:APA91bHbq9RvQqMh9WpyrQzhb16S1crRrVxh0WNb04GtYlwLVpazC-udRCSNqao6V369sxZRNowv01eZf_v_-SvQHkqWqFEFryIwdyxtsoE8TyoBPcBtW_CQ-sO2GyQaTzLdW114jlSN");
	$msg = array('message' => $message, 'title' => $title);
	$fields = array('tokens' => $tokens, 'profile' => 'test_push', 'notification' => $msg);
		$headers = array(
			"Content-Type:application/json",
			"Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJlMGJlMzAxMC1jMzQ2LTQ0MTAtYWIyYS0xN2ZhYjE2ZWRjNTEifQ.rK7EpG8nECn0FexZs4AagvhdsO794eT1NaonlRKvz00"
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.ionic.io/push/notifications");
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if($result == false) {
			echo('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		$rtn["code"] = "000";//means result OK
		$rtn["msg"] = "OK";
		$rtn["result"] = $result;
		print_r($rtn);
		return($rtn);


	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
