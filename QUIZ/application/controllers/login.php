<?php
class login extends MY_Controller
{
	public function __construct()
	{
	parent::__construct();
	if($this->session->userdata('enrollment'))
	return redirect('profile/welcome');
	}
	public function index()
	{
    $this->form_validation->set_rules('email','Email','required|min_length[3]');
	$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[10]');
	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
	if($this->form_validation->run())
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$this->load->model('loginmodel');
		$email=$this->loginmodel->is($email,$password);		
		$login_id=$this->loginmodel->isvalidate($email,$password);
		if($login_id)
		{
			$this->session->set_userdata('id',$login_id);
			$this->session->set_userdata('email',$email);
			return redirect('profile/welcome');
		}
		else
		{
			$this->session->set_flashdata('Login_failed','Invalid Email No. or password');
			return redirect('login');
		}
	}
	else
	{
		$this->load->view('users/login');

	}

	}
	
}
?>