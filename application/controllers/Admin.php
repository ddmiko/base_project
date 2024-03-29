<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		
	}

	public function index(){

		$data['title'] ='Dashboard';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function role(){

		$data['title'] ='Role';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('role','Role', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		}else{
			$data =[
				'role' => $this->input->post('role')
			];

			$this->db->insert('user_role', $data);
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Role has been changed!</div>');
			redirect('admin/role');
		}
	}

	public function editRole($id){
		$data['title'] ='Edit Role';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();

		$this->load->model('Role_model', 'role');

		$data['getrole'] = $this->role->getRoleById($id);
		$data['role'] = $this->db->get('user_role')->result_array();
		
		$this->form_validation->set_rules('role','Role', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit-role', $data);
			$this->load->view('templates/footer');
		}else{
			$data =[
				'role' => $this->input->post('role')
			];

			$this->db->where('id', $id);
			$this->db->update('user_role', $data);
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Role has been changed!</div>');
			redirect('admin/role');
		}
	}

	public function roleAccess($role_id){

		$data['title'] ='Role';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role',['id'=>$role_id])->row_array();
		$this->db->where('id !=',1);
		
		$data['menu'] =$this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
		
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' =>$role_id,
			'menu_id' =>$menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);
		}else{
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	public function removeRole($id)
	{
		$this->db->where('id', $id);
		$deleted = $this->db->delete('user_role');
		if($deleted){
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Role has been removed!</div>');
			redirect('menu');
		}else{
			$this->session->set_flashdata('message','<div class ="alert alert-danger" role="alert">Something went wrong!</div>');
			redirect('menu');
		}
	}
}