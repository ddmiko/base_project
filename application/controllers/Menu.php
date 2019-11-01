<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		
	}

	public function index(){


		$data['title'] ='Menu Management';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu','Menu', 'required');
		
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
				
		}else{

			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">New Menu Added!</div>');
			redirect('menu');
		}

		
	}

	public function submenu()
	{
		$data['title'] ='SubMenu Management';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title','Title', 'required');
		$this->form_validation->set_rules('menu_id','Menu', 'required');
		$this->form_validation->set_rules('url','URL', 'required');
		$this->form_validation->set_rules('icon','icon', 'required');

		
		if($this->form_validation->run() == false){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/submenu', $data);
				$this->load->view('templates/footer');
		} else{
			$data =[
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_submenu',$data);
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">New Sub Menu Added!</div>');
			redirect('menu/submenu');

		}


	}

	public function edit($id){
		$data['title'] ='Edit SubMenu Management';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('Menu_model', 'menu');

		$data['submenu'] = $this->menu->getSubMenuById($id);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title','Title', 'required');
		$this->form_validation->set_rules('menu_id','Menu', 'required');
		$this->form_validation->set_rules('url','URL', 'required');
		$this->form_validation->set_rules('icon','icon', 'required');


		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/edit', $data);
			$this->load->view('templates/footer');
		}else{
			$data =[
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->where('id', $id);
			$this->db->update('user_submenu',$data);
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Sub Menu has been changed!</div>');
			redirect('menu/submenu');

		}
	}

	public function editMenu($id){
		$data['title'] ='Edit Menu Management';
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('Menu_model', 'menu');

		$data['getmenu'] = $this->menu->getMenuById($id);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu','Menu', 'required');
		
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/edit_menu', $data);
			$this->load->view('templates/footer');
				
		}else{
			$data =[
				'menu' => $this->input->post('menu')
			];

			$this->db->where('id', $id);
			$this->db->update('user_menu', $data);
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Menu has been changed!</div>');
			redirect('menu');
		}
	}

	public function removeSubmenu($id)
	{
		$this->db->where('id', $id);
		$deleted = $this->db->delete('user_submenu');
		if($deleted){
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Sub Menu has been removed!</div>');
			redirect('menu/submenu');
		}else{
			$this->session->set_flashdata('message','<div class ="alert alert-danger" role="alert">Something went wrong!</div>');
			redirect('menu/submenu');
		}
	}

	public function removeMenu($id)
	{
		$this->db->where('id', $id);
		$deleted = $this->db->delete('user_menu');
		if($deleted){
			$this->session->set_flashdata('message','<div class ="alert alert-success" role="alert">Menu has been removed!</div>');
			redirect('menu');
		}else{
			$this->session->set_flashdata('message','<div class ="alert alert-danger" role="alert">Something went wrong!</div>');
			redirect('menu');
		}
	}

}