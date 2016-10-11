<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(E_ALL ^ E_NOTICE);

class Test extends CI_Controller {

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
	$this->load->view('search2');
}

public function import(){
	$this->load->view('insert_form');
}

/*public function add(){
	$this->load->database();

	$data = array(
		'JOBNO' => $_POST['job'] ,
		'RECPORT' => $_POST['port'] , 
		'VESSEL' => $_POST['vessel'] ,
		'V_VOY' => $_POST['voyage'] ,
		'ETA' => $_POST['eta'] ,
		'ETD' => $_POST['do_'] ,
		'SHED' => $_POST['shed'] ,
		'MASTERNO' => $_POST['master'] ,
		'BLNO' => $_POST['bl']
	);
	
	$query = $this->db->insert('SF_IMTRACKING', $data);

	if($query){
		echo 'Insert Success';
	}else{
		echo 'Insert Fail';
	}
}*/

public function edit(){
	$this->load->database();
	
	$data = array(
		'ETA' => $_POST['eta']
	);

	//print_r($_POST);
	
	$this->db->where('PMKEY' , $_POST['id']);
	$query = $this->db->update('SF_IMTRACKING' , $data);
	if($query){
		echo 'Edit Success';
	}else{
		echo 'Edit Fail';
	}
}

public function del(){
	$this->load->database();
	$this->db->where('PMKEY', $_POST['id']);
	$query = $this->db->delete('SF_IMTRACKING'); 
	if($query){
		echo 'Delete Success';
	}else{
		echo 'Delete Fail';
	}
}

public function getedit(){
	$this->load->database();
	$row = $this->db->from('SF_IMTRACKING')->where('PMKEY' , $_GET['id'])->get()->result_array();
	echo json_encode($row);
}

public function objSearch(){
	$this->load->database();
	//$this->output->enable_profiler(TRUE);

	$perpage = 45;
	$page = (empty($_GET['page']))? 0 : $_GET['page'];

	$this->buildSearch();
	
	if($_GET['order'] != '' && $_GET['order_by'] != ''){
		$this->db->order_by($_GET['order_by'] , $_GET['order']);
	}

	$row = $this->db->from('SF_IMTRACKING');
	
	$res = $row->limit( $perpage , ($page*$perpage))->get()->result_array();

	$this->buildSearch();
	$foundSearch = $this->db->from('SF_IMTRACKING')->count_all_results();
	
	$data = array();
	$data['res'] = array();
	foreach($res as $val){
		$data['res'][] = $val;
	}

	$data['foundSearch'] = $foundSearch;
	echo json_encode($data);
}


/*********** Contain **************/

protected function buildSearch(){
		
	if($_GET['type'] == 'im'){
		$this->db->where("SF_IMTRACKING.JOBCLASS = '".$_GET['type']."' and SF_IMTRACKING.SUB_SYSNAME = 'SF' ");
	}else{
		$this->db->where("SF_IMTRACKING.JOBCLASS not like '".$_GET['type']."' and SF_IMTRACKING.SUB_SYSNAME = 'SF' ");
	}

	if($_GET['start'] == 'start_with'){
		if($_GET['master'] != ''){
			$this->db->where("SF_IMTRACKING.MASTERNO like '".$_GET['master']."%' ");
		}

		if($_GET['house'] != ''){
			$this->db->where("SF_IMTRACKING.BLNO like '".$_GET['house']."%' ");
		}

		if($_GET['container'] != ''){
			$this->db->join('sf_cont' , 'sf_cont.JOBNO = SF_IMTRACKING.JOBNO' , 'left')->where("sf_cont.CTNNO like '".$_GET['container']."%' ");
		}

		if($_GET['vesel_name'] !=''){
			$this->db->where("SF_IMTRACKING.VESSEL like '".$_GET['vesel_name']."%' ");
		}
		
		if($_GET['voyage_no'] != ''){
			$this->db->where("SF_IMTRACKING.V_VOY like '".$_GET['voyage_no']."%' ");
		}
	}



	if($_GET['start'] == 'contain'){
		if($_GET['master'] != ''){
			$this->db->like('SF_IMTRACKING.MASTERNO',$_GET['master']);
		}

		if($_GET['house'] != ''){
			$this->db->like('SF_IMTRACKING.BLNO' , $_GET['house']);
		}

		if($_GET['container'] != ''){
			$this->db->join('sf_cont' , 'sf_cont.JOBNO = SF_IMTRACKING.JOBNO' , 'left')->like('sf_cont.CTNNO' , $_GET['container']);
		}

		if($_GET['vesel_name'] != ''){
			$this->db->like('SF_IMTRACKING.VESSEL' , $_GET['vesel_name']);
		}
		
		if($_GET['voyage_no'] != ''){
			$this->db->like('SF_IMTRACKING.V_VOY',$_GET['voyage_no']);
		}
	}


}

/*****************************/


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */