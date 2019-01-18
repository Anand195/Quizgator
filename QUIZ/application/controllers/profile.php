<?php
class profile extends MY_Controller
{
	public function __constructor()
{
	parent::__constructor();
	if(!$this->session->userdata('enrollment'))
	return redirect('login');
}
public function register()
{
	$this->load->view('users/register');
}
public function welcome()
{
	$this->load->model('loginmodel');
	$question=$this->loginmodel->fetch2();
	$this->load->view('users/profile',compact('question'));	
}
public function logout()
{
	$this->session->unset_userdata('enrollment');
	return redirect('login');
}
public function sendmail()
{
	$this->form_validation->set_rules('enrollment','Enrollment No','required|min_length[9]');
	$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[10]');
	$this->form_validation->set_rules('firstname','Firstname','required|min_length[3]');
	$this->form_validation->set_rules('lastname','Lastname','required|min_length[3]');
	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]|min_length[3]');
	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
	if($this->form_validation->run())
	{
		$post=$this->input->post();
		$this->load->model('loginmodel');
		if($this->loginmodel->insert_user($post))
		{
			$this->session->set_flashdata('user','user added successfully please login');
			$this->session->set_flashdata('user_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('user','user not added successfully');
			$this->session->set_flashdata('user_class','alert-success');
		}
		return redirect('login');
		$this->load->library('email');
		$this->email->from(set_value('email'),set_value('firstname'));
		$this->email->to('akshildhariya@gmail.com');
		$this->email->subject("Register Greeting..");
		$this->email->message("Thank You For Registration");
		$this->email->set_newline("\r \n");
		$this->email->send();
		if(!$this->email->send())
		{
			show_error($this->email->print_debugger());
		}
		else{
			echo "Your e-mail has been sent!";
		}
	}
	else
	{
		$this->load->view('users/register');

	}
}
}
?>