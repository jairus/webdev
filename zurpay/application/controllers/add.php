<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {
	
	/*initialize constructor*/
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Mod_login','',TRUE);
	}
	
	/*Index Page*/
	public function index()
	{
		$data['error'] = "";
		$data['main_content'] = "addpage";
		$this->load->view("template", $data);
	}
	
	
	/*form validation*/
	public function action()
	{
		$data['error'] = "";
		
		$this->load->library('form_validation');
		
		$config = array(

		array(

			 'field'   => 'username', 

			 'label'   => 'Username', 

			 'rules'   => 'trim|required|min_length[5]|max_length[20]'

		  ),

		array(

			 'field'   => 'password', 

			 'label'   => 'Password', 

			 'rules'   => 'trim|required|min_length[5]|max_length[20]|callback_check_database'

		  )

		);
		
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE)

			{
				$data['main_content'] = "loginpage";
				$this->load->view("template", $data);
			}
			else
			{
				 redirect(base_url().'home','refresh');
				
			}
	}
		function check_database($password){
				
				$username = $this->input->post('username');
				//$password = $this->input->post("password");
				
				$user = $this->Mod_login->getUser($username, $password);
				
				if($user)
				{
					
					
					//$result = $user->row();
					
					$sess_array = array();
					foreach($user as $row){
					
					$sess_data = array(
							'id' => $row->id,
							'username' => $row->username
					);
					
					$this->session->set_userdata('admin_user', $sess_data);
					}
					
					return TRUE;
					
					//redirect(base_url()."home");
				}
				else
				{
					/*$data['error'] = TRUE;
					$data['main_content'] = "loginpage";
					$this->load->view("template", $data);*/
					
					$this->form_validation->set_message('check_database', 'Invalid Username or Password');
					
					return FALSE;	
				}	
			
		}
	
	}

