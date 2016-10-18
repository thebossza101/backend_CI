<?php
class Webapp2model extends CI_Model {

   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $CI = &get_instance();
        $this->db2 = $CI->load->database('db2', TRUE);
    }
 function testmoldel()
 {
$qry = $this->db2->query("SELECT * FROM SFBOOK");
return $qry->result();
//return '5555';
 }


}
