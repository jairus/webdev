<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('admin_user'))
		{
			redirect('login');
		}
		else{
			redirect('home');
		}
	}
	 
	public function index()
	{
		$data['main_content'] = "sample_home";
		$this->load->view('template', $data);
	}
}
