<?php
class Webapp extends CI_Model {

   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $CI = &get_instance();
        $this->db2 = $CI->load->database('db2', TRUE);
    }
 function testmoldel()
 {
$qry = $this->db2->query("SELECT * FROM SMEMPL");
return $qry->result();
//return '5555';
 }
  function COUNT($text)
 {
$qry = $this->db2->query("SELECT COUNT(*) FROM SMEMPL WHERE EMPCODE LIKE '%".$text."%'");
return $qry->result();
//return '5555';
 }
 function get_EMPCODE($PageNumber,$RowspPage,$text)
 {
$startrow = ($PageNumber*$RowspPage)-($RowspPage-1);
$endrow = ($PageNumber*$RowspPage)+1;
//return $endrow;
$qry = $this->db2->query("SELECT * FROM ( SELECT ROW_NUMBER() OVER ( ORDER BY EMPCODE) AS RowNum, * FROM SMEMPL WHERE EMPCODE LIKE '%".$text."%') AS RowConstrainedResult WHERE   RowNum >= ".$startrow." AND RowNum < ".$endrow." ORDER BY RowNum");
return $qry->result();
//return '5555';
 }

 function get_EMPCODE_EMPDESC($text)
 {
$qry = $this->db2->query("SELECT EMPCODE,EMPDESC  FROM SMEMPL WHERE EMPCODE LIKE '%".$text."%' OR EMPDESC LIKE '%".$text."%'");
return $qry->result();
//return '5555';
 }
 function get_EMPCODE_detial($EMPCODE)
 {
$qry = $this->db2->query("SELECT *  FROM SMEMPL WHERE EMPCODE = '".$EMPCODE."'");
return $qry->result();
//return '5555';
 }
 function delete_EMPCODE($text)
 {
$qry = $this->db2->query("DELETE FROM SMEMPL WHERE EMPCODE = '".$text."'");
return $qry;
//return '5555';
 }
 function insert_data($EMPCODE,$EMPDESC,$CUSTCODE,$VENDCODE,$POSITION,$CTCADR1,$CTCADR2,$EMAIL,$GROUPID)
 {
$qry = $this->db2->query("INSERT INTO SMEMPL (LOCK,INACTIVE,EMPCODE,EMPDESC,CUSTCODE,VENDCODE,POSITION,CTCADR1,CTCADR2,EMAIL,GROUPID) VALUES (1,1,'".$EMPCODE."','".$EMPDESC."','".$CUSTCODE."','".$VENDCODE."','".$POSITION."','".$CTCADR1."','".$CTCADR2."','".$EMAIL."','".$GROUPID."');");
return $qry;
//return '5555';
 }
 function update_data($EMPCODE,$EMPDESC,$CUSTCODE,$VENDCODE,$POSITION,$CTCADR1,$CTCADR2,$EMAIL,$GROUPID)
 {
   $sql = "UPDATE SMEMPL ";
   $sql .= "SET EMPDESC = '".$EMPDESC."', CUSTCODE = '".$CUSTCODE."', VENDCODE = '".$VENDCODE."', POSITION = '".$POSITION."', CTCADR1 = '".$CTCADR1."', CTCADR2 = '".$CTCADR2."', EMAIL = '".$EMAIL."', GROUPID = '".$GROUPID."' ";
   $sql .= " WHERE EMPCODE = '".$EMPCODE."'";
$qry = $this->db2->query($sql);
return $qry;
//return '5555';
 }
 
}
