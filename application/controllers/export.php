<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Export extends CI_Controller {
	public function __construct()
       {
            parent::__construct();
        
       }
	
	public function index() {
	$session_id['Username'] = $this->session->userdata('Username');
	$session_id['port'] = 'ex';
	$port['port'] = 'export';
	$this->load->view('include/header',$port);
	$this->load->view('page',$session_id);
	$this->load->view('include/footer');
	$this->load->view('include/modal');
	
		}
	public function getdata() {
		$VESSEL =  $_POST['VESSEL'];
		$VOYAGE =  $_POST['VOYAGE'];
		$order_by = $_POST['order_by'];
		$order = $_POST['order'];
		$radio_option = $_POST['radio_option'];
		$page = $_POST['page'];

	
		if(isset($_POST['Master_ch']))
		{
			$Master = $_POST['Master'];
		}else
		{
			$Master = '';
		}
		if(isset($_POST['House_ch']))
		{
			$House = $_POST['House'];
		}else
		{
			$House = '';
		}
		if(isset($_POST['Container_ch']))
		{
			$Container = $_POST['Container'];
		}else
		{
			$Container = '';
		}
		$this->load->model('get_data','bbb');
		$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'EX',$radio_option);
		if($VESSEL != ''){
 			 $res = $this->db->from('SF_IMTRACKING')->limit( '50' , ($page*'50'))->get()->result_array();
						if($res){
							foreach($res as $res2){
						$data['res'][] = $res2;
						}
						}else{
						$data['res'] = 'not';	
							
						}
						$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'EX',$radio_option);
						$row = $this->db->from('SF_IMTRACKING')->get()->num_rows();
						if($row){
						$data['count'] = $row;
						}
		}elseif($VOYAGE != ''){
			 $res = $this->db->from('SF_IMTRACKING')->limit( '50' , ($page*'50'))->get()->result_array();
						if($res){
							foreach($res as $res2){
						$data['res'][] = $res2;
						}
						}else{
						$data['res'] = 'not';	
							
						}
						$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'EX',$radio_option);
						$row = $this->db->from('SF_IMTRACKING')->get()->num_rows();
						if($row){
						$data['count'] = $row;
						}
		}elseif($Master != ''){
			 $res = $this->db->from('SF_IMTRACKING')->limit( '50' , ($page*'50'))->get()->result_array();
						if($res){
							foreach($res as $res2){
						$data['res'][] = $res2;
						}
						}else{
						$data['res'] = 'not';	
							
						}
						$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'EX',$radio_option);
						$row = $this->db->from('SF_IMTRACKING')->get()->num_rows();
						if($row){
						$data['count'] = $row;
						}
		}elseif($House != ''){
			 $res = $this->db->from('SF_IMTRACKING')->limit( '50' , ($page*'50'))->get()->result_array();
						if($res){
							foreach($res as $res2){
						$data['res'][] = $res2;
						}
						}else{
						$data['res'] = 'not';	
							
						}
						$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'EX',$radio_option);
						$row = $this->db->from('SF_IMTRACKING')->get()->num_rows();
						if($row){
						$data['count'] = $row;
						}
 		}else{
				$data['res'] = 'not';
		}
		
		echo json_encode ($data);
			
		}
		public function test() {
		$this->load->model('get_data','bbb');
		$data = array();
		$this->bbb->data('','','','','','','','EX','');
		$res = $this->db->from('SF_IMTRACKING')->limit( '2' , ('1'*'2'))->get()->result_array();
		echo json_encode ($res);
		}
		public function logout() {
		$this->session->unset_userdata('Username');
		redirect('/login');
			}
		
	
}