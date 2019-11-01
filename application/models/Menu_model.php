<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Menu_model extends CI_Model
{
	
	public function getSubMenu()
	{
		 $query = "SELECT `user_submenu`.*,`user_menu`.`menu`
			       FROM `user_submenu` JOIN `user_menu`
			       ON `user_submenu`.`menu_id` = `user_menu`.`id`
		 ";
		return $this->db->query($query)->result_array();
	}

	public function getSubMenuById($id)
	{
		 
		$query = $this->db->query("SELECT a.*, b.menu FROM user_submenu a LEFT JOIN user_menu b ON a.menu_id=b.id WHERE a.id='$id'")->result_array();
		return $query[0];
	}

	public function getMenuById($id)
	{
		 
		$query = $this->db->query("SELECT a.* FROM user_menu a WHERE a.id='$id'")->result_array();
		return $query[0];
	}
}