<?php 
class Home extends MY_Controller
{
	public function index()
	{
		$this->load->model('loginmodel');
		$this->load->library('pagination');
		$config=[
			'base_url'=>base_url('index.php/home/index'),
			'per_page'=>6,
			'total_rows'=>$this->loginmodel->num_rows2(),
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
			$companys=$this->loginmodel->companyList2($config['per_page'],$this->uri->segment(3));
			$this->load->view('home/home',['companys'=>$companys]);}
	public function editfield($field_name)
{	
	$this->load->model('loginmodel');
	$companys=$this->loginmodel->find_company2($field_name);
	$this->load->view('home/edit_field',['companys'=>$companys]);
}
public function quiz($quizname)
{	
	$this->load->model('loginmodel');
	$question=$this->loginmodel->find_question2($quizname);
	$this->load->view('home/details',['question'=>$question]);
}
}
?>