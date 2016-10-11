<?php
class Login extends CI_Model {

   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 function login_check($username,$password)
 {

// 		 $query = $this -> db -> where('Username',$username)
//  					   		  -> where('Password',md5($password))
//					   		  -> get('SF_account');
 		 $query = $this -> db -> where('Username',$username)
  					   		  -> where('Password',$password)
					   		  -> get('SF_account');


  					if($query -> num_rows() >= 1)
  						{
	  
   							return $query->row_array();

  						} else{
   							return false;
  								}
 }
}