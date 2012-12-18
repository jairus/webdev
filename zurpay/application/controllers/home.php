<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		
		if($this->session->userdata('admin_user')){
			$session_data = $this->session->userdata('admin_user');
			$data['username'] = $session_data['username'];
			$redirect = $this->load->view("homepage",$data);	
		}
		else{
			redirect(base_url());
		}		
	
	}
	
	public function add()
	{
		if($this->session->userdata('admin_user')){
			$session_data = $this->session->userdata('admin_user');
			$data['username'] = $session_data['username'];
			$redirect = $this->load->view("addpage",$data);	
		}
		else{
			redirect(base_url());
		}	
	}
	
	public function logout()
	{
		$this->session->unset_userdata('admin_user');
		session_destroy();
		redirect(base_url().'login');
	}
		
}
