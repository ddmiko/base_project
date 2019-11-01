<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Role_model extends CI_Model
{
	public function getRoleById($id)
	{
		 
		$query = $this->db->query("SELECT a.* FROM user_role a WHERE a.id='$id'")->result_array();
		return $query[0];
	}

}