<?php
class Get_data extends CI_Model {

   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 function data($VESSEL,$VOYAGE,$Master,$House,$Container,$order_by,$order,$type,$start)
 {	 
		if($type == 'IM'){
		$this->db->where("SF_IMTRACKING.JOBCLASS = '".$type."' and SF_IMTRACKING.SUB_SYSNAME = 'SF' ");
	}else{
		$this->db->where("SF_IMTRACKING.JOBCLASS = '".$type."' and SF_IMTRACKING.SUB_SYSNAME = 'SF' ");
	}

	if($start == 'start_with'){
		if($Master != ''){
			$this->db->where("SF_IMTRACKING.MASTERNO like '".$Master."%' ");
		}

		if($House != ''){
			$this->db->where("SF_IMTRACKING.BLNO like '".$House."%' ");
		}

		if($Container != ''){
			$this->db->join('sf_cont' , 'sf_cont.JOBNO = SF_IMTRACKING.JOBNO' , 'left')->where("sf_cont.CTNNO like '".$Container."%' ");
		}

		if($VESSEL !=''){
			$this->db->where("SF_IMTRACKING.VESSEL like '".$VESSEL."%' ");
		}
		
		if($VOYAGE != ''){
			$this->db->where("SF_IMTRACKING.V_VOY like '".$VOYAGE."%' ");
		}
	}
	if($start == 'contain'){
		if($Master != ''){
			$this->db->like('SF_IMTRACKING.MASTERNO',$Master);
		}

		if($House != ''){
			$this->db->like('SF_IMTRACKING.BLNO' , $House);
		}

		if($Container != ''){
			$this->db->join('sf_cont' , 'sf_cont.JOBNO = SF_IMTRACKING.JOBNO' , 'left')->like('sf_cont.CTNNO' , $Container);
		}

		if($VESSEL != ''){
			$this->db->like('SF_IMTRACKING.VESSEL' , $VESSEL);
		}
		
		if($VOYAGE != ''){
			$this->db->like('SF_IMTRACKING.V_VOY',$VOYAGE);
		}
	}
	if($order != '' && $order_by != ''){
		$this->db->order_by($order_by , $order);
	} 
 }
}