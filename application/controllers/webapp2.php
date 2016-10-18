<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Webapp2 extends CI_Controller {
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
			echo json_encode ( $this->Webapp2->testmoldel());
	}
  public function search_data()
  {
	$post = json_decode(file_get_contents('php://input'), true);
	$data = $post['data'];
	$PageNumber = $post['PageNumber'];
	$RowspPage = $post['RowspPage'];
    $table = $post['table'];
    $ORDERBY = $post['ORDERBY'];
   // $data['DOCNO'] = "";
   // $data['DOCDATE'] = "";
   // $data['DOCSTAT'] = "";
   // $data['MASTERNO'] = "";
   // $data['BOOKNO'] = "";
   // $data['ETD'] = "";
   // $data['FEEDER'] = "";
   // $data['VESSEL'] = "";
   // $data['DELPORT'] = "";
   // $data['SHIPPERNAME'] = "";
   // $data['LINERNAME'] = "";
   // $PageNumber = "1";
  //  $RowspPage = "10";
   // $table = "SFBOOK";
   // $ORDERBY = "DOCNO";
    //$this->load->view('welcome_message');
    $this->load->model('Webapp2model','Webapp2');
    //$this->Webapp2->testmoldel();
    $totalrows = $this->Webapp2->COUNT($data,$table);
    $totalPage = ceil( $totalrows/$RowspPage );
    $res2 = $this->Webapp2->get_searchdata($PageNumber,$RowspPage,$table,$data,$ORDERBY);
	$res3['data'] = $res2;
	$res3['totalrows'] = $totalrows;
	$res3['totalPage'] = $totalPage;
	echo json_encode ($res3);
  }
  public function delete_data()
	{
		$post = json_decode(file_get_contents('php://input'), true);
		$table = $post['table'];
		$key = $post['key'];
		$value = $post['value'];
		//$table = "SFBOOK";
		//$key = "DOCNO";
		//$value = "";
		//$this->load->view('welcome_message');
		$this->load->model('Webapp2model','Webapp2');
			echo json_encode ( $this->Webapp2->delete_data($table,$key,$value));

	}
public function insert_data()
	{
$post = json_decode(file_get_contents('php://input'), true);
$data = $post['data'];
$table = $post['table'];
// $data['LOCK'] = 1;
// $data['DOCNO'] = "a001";
//$data['JOBNO'] = "SE13010001";
// $data['SUB_SYSNAME'] = "SF";
// $data['JOBCLASS'] = "EX";
// $data['DOCDATE'] = "Jan 7 2014 12:00AM";
// $data['DOCSTAT'] = "Close";
//$data['USERID'] = "ACHARA_CL";
//$data['GROUPID'] = "CS";
//$data['BOOKNO'] = "SITGBKSG018333";
//$data['ORDERNO'] = " ";
//$data['REFCSJOB'] = null;
//$data['EXPSTAT'] = null;
//$data['ETA'] = "Jan 14 2014 12:00AM";
//$data['ETD'] = "Jan 12 2013 12:00AM";
//$data['ETDETA'] = "Jan 12 2013 12:00AM";
//$data['COLOAD'] = "120385";
//$data['SALENO'] = "JEE";
//$data['COLOADNAME'] = "SITC CONTAINER LINES (THAILAND) CO.; LTD.";
//$data['SALENAME'] = "ACHARA DUANYAI";
//$data['SHIPPER'] = "110351";
//$data['SHIPPERNAME'] = "CARGO FOCUS INTERNATIONAL CO.;LTD.";
//$data['CONSIGNEE'] = "N/A";
//$data['CONSIGNEENAME'] = "N/A";
//$data['AGENTNO'] = "N/A";
//$data['AGENTNAME'] = "N/A";
//$data['LINERNO'] = "120385";
//$data['LINERNAME'] = "SITC CONTAINER LINES (THAILAND) CO.; LTD.";
//$data['SHED'] = null;
//$data['FEEDER'] = "JAKARTA BRIDGE ";
//$data['F_VOY'] = "A097N";
//$data['VESSEL'] = " ";
//$data['V_VOY'] = " ";
//$data['RECPORT'] = "THBKK";
//$data['LOADPORT'] = "THBKK";
//$data['DELPORT'] = "VNSGN";
//$data['DISPORT'] = "VNSGN";
//$data['FINALPORT'] = "VNSGN";
//$data['TRANPORT'] = " ";
//$data['CFSPLACE'] = " ";
//$data['CYTERM'] = "CY/CY";
//$data['CYPLACE'] = "CDS STORAGE 1 BANGNA-TRAD K.M.6 BANGNKAEW / CTC :K.PIM T:02-7403166;083-6852785";
//$data['RETURNPLACE'] = "PAT TER 1 (0251) TARUA RD; KLONGTOEY / CTC :K.MAI;K.TEE T:02-2495122;081-4483859";
//$data['CYDATE'] = "Jan 8 2014 12:00AM";
//$data['CFSDATE'] = null;
//$data['RETURNDATE'] = "Jan 9 2014 12:00AM";
//$data['LOADDATE'] = "Jan 10 2014 12:00AM";
//$data['CCNAME'] = " ";
//$data['CTCNAME'] = "K. MAM";
//$data['FROMNAME'] = " ";
//$data['REMARK'] = null;
//$data['DOCCURR'] = "USD";
//$data['DOCRATE'] = "33.000000";
//$data['OPTION1'] = " ";
//$data['OPTION2'] = " ";
//$data['GW'] = "0.00000";
//$data['NW'] = "0.00000";
//$data['CTNSIZE'] = null;
//$data['CTNQTY'] = null;
//$data['PKGUNIT'] = " ";
//$data['PKGQTY'] = "0.0000";
//$data['CBM'] = "0.00000";
//$data['PAYTYPE'] = 2;
//$data['CRDAY'] = 15;
//$data['REVISENO'] = " ";
//$data['PAYABLEAT'] = " ";
//$data['STUFFDATE'] = null;
//$data['STUFFPLACE'] = " ";
//$data['LOADTIME'] = "24.00 HRS.";
//$data['BLTYPE'] = " ";
//$data['GOODS'] = " ";
//$data['LOADTYPE'] = "FCL";
//$data['CHGTERM'] = "PP";
//$data['AIRPORT2'] = null;
//$data['AIRPORT3'] = null;
//$data['AIRLINE2'] = null;
//$data['AIRLINENAME2'] = null;
//$data['AIRLINE3'] = null;
//$data['AIRLINENAME3'] = null;
//$data['FLIGHT2'] = null;
//$data['FLIGHT3'] = null;
//$data['FLIGHTDATE2'] = null;
//$data['FLIGHTDATE3'] = null;
//$data['SFSERV'] = 0;
//$data['AFSERV'] = 0;
//$data['CSSERV'] = 0;
//$data['VOL'] = null;
//$data['DWID'] = null;
//$data['DLEN'] = null;
//$data['DHIG'] = null;
//$data['TEL'] = " ";
//$data['MASTERNO'] = " ";
//$data['CTNWORD'] = " ";
//$data['DMEMO'] = null;
//$data['BLNO'] = " ";
//$data['CONO'] = "110351";
//$data['CONAME'] = "CARGO FOCUS INTERNATIONAL CO.;LTD.";
//$data['REMARK2'] = " ";
//$data['EDITBY'] = "ACHARA_CL";
//$data['EDITDATE'] = "Jan 7 2014 10:45AM";
//$data['CONFBY'] = "Conf By KWANRUAN_CL";
//$data['CONFDATE'] = "Jan 7 2014 12:00AM";
//$data['INVNO'] = null;
//$data['DEPTIME1'] = null;
//$data['ARRTIME1'] = null;
//$data['DEPTIME2'] = null;
//$data['ARRTIME2'] = null;
//$data['DEPTIME3'] = null;
//$data['ARRTIME3'] = null;
//$data['PICKUPDATE'] = null;
//$data['PICKUPTIME'] = " ";
//$data['FORMLIST'] = "00000000000";
//$data['PICKPLACE1'] = null;
//$data['PICKPKG1'] = null;
//$data['PICKPLACE2'] = null;
//$data['PICKPKG2'] = null;
//$data['PICKPLACE3'] = null;
//$data['PICKPKG3'] = null;
//$data['PICKREMARK'] = " ";
//$data['CTCNAME2'] = " ";
//$data['CCNAME2'] = null;
//$data['MAWBNO'] = null;
//$data['SCRNO'] = null;
//$data['RATECLASS'] = null;
//$data['S_ADD'] = null;
//$data['C_ADD'] = null;
//$data['A_ADD'] = null;
//$data['TEMP1'] = null;
//$data['OPTION3'] = " ";
//$data['OPTION4'] = " ";
//$data['REFQTNO'] = " ";
//$data['ISCREDITAPP'] = null;
//$data['CREDITAPPBY'] = null;
//$data['CREDITAPPDATE'] = null;
//$data['CTN20'] = 1;
//$data['CTN40'] = 0;
//$data['CTN40HC'] = 0;
//$data['CTN45'] = 0;
//$data['TEL2'] = " ";
//$data['FAX2'] = " ";
//$data['INCOTERM'] = " ";
//$data['OPTCHECK1'] = 1;
//$data['JOBOWNER'] = "FREEHAND";
//$data['OPTION5'] = " ";
//$data['CTCNAME3'] = null;
//$data['OPTION6'] = " ";
//$data['OPTION7'] = " ";
//$data['OPTION8'] = " ";
//$data['OPTION9'] = " ";
//$data['OPTION10'] = " ";
//$data['SHIPNAME'] = " ";
//$data['SHIPPLACE'] = " ";
//$data['SHIPCTC'] = " ";
//$data['SHIPTEL'] = " ";
//$data['SHIPFAX'] = " ";
//$data['SHIPBY'] = "|||||";
//$data['SHIPTYPE'] = " ";
//$data['TRUCKBY'] = null;
//$data['TRUCKTYPE'] = null;
//$data['TRUCKPERSON'] = null;
//$data['TRUCKREGNO'] = null;
//$data['TRUCKTEL'] = null;
//$data['REMARK3'] = "||||||||||";
//$data['SHIPPINGBY'] = null;
//$data['OTHSERV'] = 0;
//$data['BLFORMCODE'] = " ";
//$data['COMP_NAME'] = "HIT_CONSOL11";
//$data['SHIPPERLOAD'] = "400633";
//$data['SHIPPERLOADNAME'] = "EUROG";
//$data['CTN20TY'] = " ";
//$data['CTN40TY'] = " ";
//$data['CTN40HCTY'] = " ";
//$data['CTN45TY'] = " ";
//$data['CLEARDATE'] = null;
//$data['ISPROAPP'] = 1;
//$data['PROAPPBY'] = "KWANRUAN_CL";
//$data['PROAPPDATE'] = "Jan 7 2014 12:00AM";
//$data['MARGINPCN'] = 14.14;
//$data['CHGTERMMBL'] = "PP";
//$data['BLTYPEMBL'] = " ";
//$data['SHIPREM'] = " ";
//$data['VESSEL2'] = " ";
//$data['V_VOY2'] = " ";
//$data['REFTSJOB'] = null;
//$table = "SFBOOK";
		$this->load->model('Webapp2model','Webapp2');
	$status = 	$this->Webapp2->insert_data($table,$data);
	echo json_encode ($status);

	}
public function edit_data()
	{
		$post = json_decode(file_get_contents('php://input'), true);
		$data = $post['data'];
		$key = $post['key'];
		$value = $post['value'];
		$table = $post['table'];
		//$data['LOCK'] = 1;
		//$data['JOBNO'] = "5555";
		//$data['SUB_SYSNAME'] = "SF";
		//$data['JOBCLASS'] = "EX";
		//$key = 'DOCNO';
		//$value = 'atest0001';
		//$table = "SFBOOK";
		$this->load->model('Webapp2model','Webapp2');
	$status = 	$this->Webapp2->update_data($table,$data,$key,$value);
			echo json_encode ($status);

			//echo json_encode ($_POST);
	}
public function get_detial()
	{
		$key = $_POST['key'];
		$value = $_POST['value'];
		$table = $_POST['table'];
		//$key = 'DOCNO';
		//$value = 'atest0001';
		//$table = "SFBOOK";
		$this->load->model('Webapp2model','Webapp2');
			echo json_encode ( $this->Webapp2->get_detial($table,$key,$value));
			//echo json_encode ($text2);
	}	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
