<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {
	public function __construct()
       {
            parent::__construct();
        
       }
	
	public function index() {
	$session_id['Username'] = $this->session->userdata('Username');
	$this->load->view('include/header');
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
		$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'im',$radio_option);
		$res = $this->db->from('SF_IMTRACKING')->limit( '50' , ($page*'50'))->get()->result_array();
		if($res){
			foreach($res as $res2){
		$data['res'][] = $res2;
		}
		}else{
		$data['res'] = 'not';	
			
		}
		$this->bbb->data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,'im',$radio_option);
		$row = $this->db->from('SF_IMTRACKING')->get()->num_rows();
		if($row){
		$data['count'] = $row;
		}
		
		echo json_encode ($data);
			
		}
		public function test() {
		$order_by = $_POST['order_by'];
		$order = $_POST['order'];
		$this->load->model('get_data','bbb');
		$data = array();
		$res = $this->bbb->data('','','','','',$order_by,$order);
		foreach($res as $res2){
		$data['res'][] = $res2;
		}
		echo json_encode ($data);
		}
		public function logout() {
		$this->session->unset_userdata('Username');
		redirect('/login');
			}
		
	
}