<?php
class company extends MY_Controller
{
public function welcome()
{
		if(!$this->session->userdata('adminname'))
		{return redirect('clogin');}
	else
	{
		$this->load->model('loginmodel');
		$this->load->library('pagination');
		$config=[
			'base_url'=>base_url('index.php/company/welcome'),
			'per_page'=>2,
			'total_rows'=>$this->loginmodel->num_rows(),
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' =>"<li class='page-item'>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li class='page-item'>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li class='page-item'>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='page-item active'><a>",
			'cur_tag_close'=>"</a></li>"
			];
			$this->pagination->initialize($config);
			$companys=$this->loginmodel->companyList($config['per_page'],$this->uri->segment(2));
			$this->load->view('company/dashbord',['companys'=>$companys]);}}
public function logout()
{
	$this->session->unset_userdata('adminname');
	return redirect('login');
}
	public function sendmail()
{
	 $this->form_validation->set_rules('adminname','Admin Name','required|alpha|min_length[3]|max_length[10]');
	$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[10]');
	$this->form_validation->set_rules('firstname','Firstname','required|min_length[3]');
	$this->form_validation->set_rules('lastname','Lastname','required|min_length[3]');
	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]|min_length[3]');
	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
	if($this->form_validation->run())
	{
		$post=$this->input->post();
		$this->load->model('loginmodel');
		if($this->loginmodel->insert_company($post))
		{
			$this->session->set_flashdata('company','admin added successfully please login');
			$this->session->set_flashdata('company_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('company','admin not added successfully');
			$this->session->set_flashdata('company_class','alert-success');
		}
		return redirect('clogin');
		$this->load->library('email');
		$this->email->from('akshildhariya99@gmail.com');
		$this->email->to(set_value('email'),set_value('firstname'));
		$this->email->subject("Registration successfully..");
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
		$this->load->view('company/register');

	}
}
	public function register()
{
	$this->load->view('company/register');
}
public function adduser()
{
	if(!$this->session->userdata('id'))
		{return redirect('clogin');}
	else
	{
	$this->load->view('company/add_company_field');}
}
public function uservalidation()
{
	if($this->form_validation->run('add_company_rules'))
	{
		$post=$this->input->post();
		$quizname=$this->input->post('quizname');
		$this->session->set_userdata('quizname',$quizname);
	    $field_name=$this->input->post('field_name');
		$this->session->set_userdata('field_name',$field_name);
		$this->load->model('loginmodel');
		if($this->loginmodel->add_company($post))
		{
		$this->load->view('company/quiz');
		}
		else
		{
			$this->load->view('company/add_company_field');
		}
	}
	else
	{
		$this->load->view('company/add_company_field');

	}
}
public function createquiz()
{
	if($this->form_validation->run('add_company_rules1'))
	{
		$post=$this->input->post();
		$this->load->model('loginmodel');
		if($this->loginmodel->add_company1($post))
			{
			$this->session->set_flashdata('msg','Question added successfully ');
			$this->session->set_flashdata('msg_class','alert-success');
			return redirect('company/cquiz');
			}
		else
		{
			$this->session->set_flashdata('msg','Question not added successfully ');
			$this->session->set_flashdata('msg_class','alert-success');
			return redirect('company/quiz');
		}
		
	}
	else
	{
		$this->load->view('company/add_company_field');

	}
}
public function cquiz()
{
		if(!$this->session->userdata('adminname'))
		{return redirect('clogin');}
	else
	{
		$this->load->model('loginmodel');
		$this->load->library('pagination');
		$config=[
			'base_url'=>base_url('index.php/company/cquiz'),
			'per_page'=>2,
			'total_rows'=>$this->loginmodel->num_rows1(),
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' =>"<li class='page-item'>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li class='page-item'>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li class='page-item'>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='page-item active'><a>",
			'cur_tag_close'=>"</a></li>"
			];
			$this->pagination->initialize($config);
			$question=$this->loginmodel->companyList1($config['per_page'],$this->uri->segment(2));
			$this->load->view('company/dashbord1',['question'=>$question]);}}
			public function quiz()
			{
				$this->load->view('company/quiz');
			}
public function updatecompany($company_id)
{
	if($this->form_validation->run('add_company_rules'))
	{
		$post=$this->input->post();
		$this->load->model('loginmodel');
		if($this->loginmodel->update_company($company_id,$post))
		{
			$this->session->set_flashdata('msg','quiz edit successfully ');
			$this->session->set_flashdata('msg_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('msg','quiz  not edit please try again');
			$this->session->set_flashdata('msg_class','alert-danger');
		}
		return redirect('company/cquiz');
	}
	else
	{
		$this->load->view('company/edituser');

	}

}
public function updatequestion($question_id)
{
	if($this->form_validation->run('add_company_rules1'))
	{
		$post=$this->input->post();
		$this->load->model('loginmodel');
		if($this->loginmodel->update_question($question_id,$post))
		{
			$this->session->set_flashdata('msg','Question edit successfully ');
			$this->session->set_flashdata('msg_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('msg','Question  not edit please try again');
			$this->session->set_flashdata('msg_class','alert-danger');
		}
		return redirect('company/cquiz');
	}
	else
	{
		$this->load->view('company/editquestion');

	}

}

public function delcompany()
{
	$id=$this->input->post('id');
	$this->load->model('loginmodel');
		if($this->loginmodel->del($id))
		{
			$this->session->set_flashdata('msg','company field delete successfully ');
			$this->session->set_flashdata('msg_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('msg','company field  not delete please try again');
			$this->session->set_flashdata('msg_class','alert-danger');
		}
		return redirect('company/welcome');
}
public function delquestion()
{
	$qid=$this->input->post('qid');
	$this->load->model('loginmodel');
		if($this->loginmodel->delete($qid))
		{
			$this->session->set_flashdata('msg','question delete successfully ');
			$this->session->set_flashdata('msg_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('msg','question not delete please try again');
			$this->session->set_flashdata('msg_class','alert-danger');
		}
		return redirect('company/cquiz');
}
public function edituser($id)
{	
	$this->load->model('loginmodel');
	$companys=$this->loginmodel->find_company($id);
	$this->load->view('company/edit_company',['companys'=>$companys]);
}
public function editquestion($qid)
{	
	$this->load->model('loginmodel');
	$question=$this->loginmodel->find_question($qid);
	$this->load->view('company/edit_question',['question'=>$question]);
}
}
?>