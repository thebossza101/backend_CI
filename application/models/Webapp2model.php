<?php
class Webapp2model extends CI_Model {

   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $CI = &get_instance();
        $this->db2 = $CI->load->database('db2', TRUE);
    }
 function testmoldel($table)
 {
$qry = $this->db2->query("SELECT * FROM ".$table);
return $qry->result();
//return '5555';
 }
 function search_data()
 {
$qry = $this->db2->query("SELECT * FROM SFBOOK");
return $qry->result();
//return '5555';
 }
 function COUNT($text,$table)
{
  $sql = "SELECT COUNT(*) FROM ".$table." ";
  foreach ($text as $key => $value) {
    if($value){
      $text2[$key] = $value;
    }
  }
  if(isset($text2)){
    $sql .= "WHERE ";
    $max = sizeof($text2);
    $i = 1;
    foreach ($text2 as $key => $value) {

      if($i == $max){
      $sql .=  $key." LIKE '%".$value."%' ";
    }else{
      $sql .=  $key." LIKE '%".$value."%' OR ";
    }

      $i = $i + 1;
    }
  }



$qry = $this->db2->query($sql);
$res = json_decode(json_encode($qry->result()), true);
return $res[0]['computed'];
//return $sql;
}
 function COUNT_and($text,$table)
{
  $sql = "SELECT COUNT(*) FROM ".$table." ";
  foreach ($text as $key => $value) {
    if($value){
      $text2[$key] = $value;
    }
  }
  if(isset($text2)){
    $sql .= "WHERE ";
    $max = sizeof($text2);
    $i = 1;
    foreach ($text2 as $key => $value) {

      if($i == $max){
      $sql .=  $key." LIKE '%".$value."%' ";
    }else{
      $sql .=  $key." LIKE '%".$value."%' AND ";
    }

      $i = $i + 1;
    }
  }



$qry = $this->db2->query($sql);
$res = json_decode(json_encode($qry->result()), true);
return $res[0]['computed'];
//return $sql;
}
function get_searchdata($PageNumber,$RowspPage,$table,$text,$ORDERBY)
{
$startrow = ($PageNumber*$RowspPage)-($RowspPage-1);
$endrow = ($PageNumber*$RowspPage)+1;
//return $endrow;
foreach ($text as $key => $value) {
  if($value){
    $text2[$key] = $value;
  }
}
$sql = "SELECT * FROM ";
$sql .= "( SELECT ROW_NUMBER() OVER ( ORDER BY ".$ORDERBY.") ";
$sql .= "AS RowNum, * FROM ".$table." ";
if(isset($text2)){
  $sql .= "WHERE ";
  $max = sizeof($text2);
  $i = 1;
  foreach ($text2 as $key => $value) {

    if($i == $max){
    $sql .=  $key." LIKE '%".$value."%' ";
  }else{
    $sql .=  $key." LIKE '%".$value."%' OR ";
  }

    $i = $i + 1;
  }
}
$sql .= ") AS RowConstrainedResult WHERE   RowNum >=  ".$startrow." AND RowNum < ".$endrow." ORDER BY RowNum";

$qry = $this->db2->query($sql);
return $qry->result();
//return '5555';
}
function get_searchdata_and($PageNumber,$RowspPage,$table,$text,$ORDERBY)
{
$startrow = ($PageNumber*$RowspPage)-($RowspPage-1);
$endrow = ($PageNumber*$RowspPage)+1;
//return $endrow;
foreach ($text as $key => $value) {
  if($value){
    $text2[$key] = $value;
  }
}
$sql = "SELECT * FROM ";
$sql .= "( SELECT ROW_NUMBER() OVER ( ORDER BY ".$ORDERBY.") ";
$sql .= "AS RowNum, * FROM ".$table." ";
if(isset($text2)){
  $sql .= "WHERE ";
  $max = sizeof($text2);
  $i = 1;
  foreach ($text2 as $key => $value) {

    if($i == $max){
    $sql .=  $key." LIKE '".$value."%' ";
  }else{
    $sql .=  $key." LIKE '".$value."%' AND ";
  }

    $i = $i + 1;
  }
}
$sql .= ") AS RowConstrainedResult WHERE   RowNum >=  ".$startrow." AND RowNum < ".$endrow." ORDER BY RowNum";

$qry = $this->db2->query($sql);
return $qry->result();
//return '5555';
}
 function delete_data($table,$keyvalue,$valueinput)
 {
$qry = $this->db2->query("DELETE FROM ".$table." WHERE ".$keyvalue." = '".$valueinput."'");
return $qry;
//return '5555';
 }
  function insert_data($table,$data)
 {
  foreach ($data as $key => $value) {
  if($value){
    $data2[$key] = $value;
  }
} 
$sql = "INSERT INTO ".$table."";
$sql .= " (";
$sql2 = "";
  $max = sizeof($data2);
  $i = 1;
foreach ($data2 as $key => $value){
    if($i == $max){
$sql .= "".$key."";
$sql2 .= "'".$value."'";
    }else{
$sql .= "".$key.",";
$sql2 .= "'".$value."',";
    }
     $i = $i + 1;
}
$sql .= ") VALUES (";
$sql .= $sql2;
$sql .= ");";
$qry = $this->db2->query($sql);
return $qry;
//return '5555';
 }
  function update_data($table,$data,$keyvalue,$valueinput)
 {
     foreach ($data as $key => $value) {
  if($value){
    $data2[$key] = $value;
  }
} 
   $sql = "UPDATE ".$table." ";

   $sql .= "SET ";
$max = sizeof($data2);
  $i = 1;
foreach ($data2 as $key => $value){
    if($i == $max){
$sql .= "".$key." = '".$value."'";
    }else{
$sql .= "".$key." = '".$value."', ";
    }
     $i = $i + 1;
}

$sql .= " WHERE ".$keyvalue." = '".$valueinput."'";
$qry = $this->db2->query($sql);
return $qry;
//return '5555';
 }
  function get_detial($table,$keyvalue,$valueinput)
 {
$qry = $this->db2->query("SELECT DOCNO  FROM ".$table." WHERE ".$keyvalue." = '".$valueinput."'");
return $qry->result();
//return '5555';
 }
 function select($table,$SELECT,$WHERE,$ORDERBY){

$sql = "SELECT ".$SELECT." FROM ".$table;
if($WHERE){
$sql .= " WHERE ".$WHERE;
}
if($ORDERBY){
$sql .= " ORDERBY ".$ORDERBY;
}
$qry = $this->db2->query($sql);
return $qry->result();
 }
 function qrysql($sql,$mode){
$qry = $this->db2->query($sql);
if($mode == '1'){
return $qry->result();
}else{
return $qry;
}

 }


}
