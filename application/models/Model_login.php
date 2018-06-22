<?php

/**
* 
*/
class Model_login extends CI_Model
{


	function LoginUser(){

		$user_name = $this->input->post('user_name');
		$password = sha1($this->input->post('password'));

		$this->db->where('user_name',$user_name);
		$this->db->where('password',$password);

		$respond = $this->db->get('user');

		if ($respond->num_rows()==1) {
				return $respond->row(0);
			}

		else{

			return FALSE;

		}
	}

}