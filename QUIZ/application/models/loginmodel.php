<?php
class loginmodel extends CI_model
{
	public function isvalidate($email,$password)
	{

		$q=$this->db->where([ 'email'=>$email,'password'=>$password ])
		            ->get('users');


		       if($q->num_rows())
		         {
		         	return $q->row()->id;
		         }
		         else
		         {
		         	return false;
		         }
	}
	public function is($email,$password)
	{

		$q=$this->db->where(['email'=>$email,'password'=>$password ])
		            ->get('users');


		       if($q->num_rows())
		         {
		         	return $q->row()->email;
		         }
		         else
		         {
		         	return false;
		         }
	}
	public function insert_user($array)
	{
		return $q=$this->db->insert('users',$array);
	}
    public function fetch2()
	{
		$id=$this->session->userdata('id');
		   	 $q=$this->db->select()
						 ->where(['userid'=>$id])
						 ->get('question');
				 return $q->row();
		

	}
	public function isvalidate1($adminname,$password)
	{

		$q=$this->db->where([ 'adminname'=>$adminname,'password'=>$password ])
		            ->get('company');


		       if($q->num_rows())
		         {
		         	return $q->row()->id;
		         }
		         else
		         {
		         	return false;
		         }
	}
	public function is1($adminname,$password)
	{

		$q=$this->db->where([ 'adminname'=>$adminname,'password'=>$password ])
		            ->get('company');


		       if($q->num_rows())
		         {
		         	return $q->row()->adminname;
		         }
		         else
		         {
		         	return false;
		         }
	}
	public function num_rows()
	{
		$id=$this->session->userdata('id');
		$q=$this->db->select()
				 	->from('companys')
					->where(['user_id'=> $id ])
				 	->get();
				 	return $q->num_rows();
	}
	public function num_rows1()
	{
		$quizname=$this->session->userdata('quizname');
		$q=$this->db->select()
				 	->from('question')
					->where(['quizname'=> $quizname ])
				 	->get();
				 	return $q->num_rows();
	}
	public function num_rows2()
	{
		$q=$this->db->select()
					->distinct('field_name')
					
				 	->from('companys')
				 	->get();
				 	return $q->num_rows();
	}
	public function companyList($limit,$offset)
	{
		$id=$this->session->userdata('id');
		$q=$this->db->select()
					
				 	->from('companys')
					->where(['user_id'=> $id ])
					->limit($limit,$offset)
				 	->get();
				 return $q->result();
				 	
				 	}
	public function companyList1($limit,$offset)
	{
		$quizname=$this->session->userdata('quizname');
		$q=$this->db->select()
				 	->from('question')
					->where(['quizname'=> $quizname ])
					->limit($limit,$offset)
				 	->get();
				 return $q->result();
				 	
				 	}
	public function companyList2($limit,$offset)
	{
		$q=$this->db->select()
					->group_by('field_name')
					->from('companys')
				 	->order_by("created_at","desc")
				 	->limit($limit,$offset)
				 	
				 	->get();
				 return $q->result();
				 	
				 	}
	public function add_company($array)
	{
		return $q=$this->db->insert('companys',$array);
	}
	public function insert_company($array)
	{
		return $q=$this->db->insert('company',$array);
	}
	public function add_company1($array)
	{
		return $q=$this->db->insert('question',$array);
	}
	public function find_company($companyid)
	{
		$q=$this->db->select()
					->where('id',$companyid)
				 	->get('companys');
				 return $q->row();
	}
	public function find_company2($fieldname)
	{
		$q=$this->db->select()
					->where('field_name',$fieldname)
				 	->get('companys');
				 return $q->result();
	}
	public function find_question($questionid)
	{
		$q=$this->db->select()
					->where('qid',$questionid)
				 	->get('question');
				 return $q->row();
	}
	public function find_question2($quiz_name)
	{
		$q=$this->db->select()
					->where('quizname',$quiz_name)
				 	->get('question');
				 return $q->result();
	}
	public function update_company($companyid,Array $company)
	{
		return $this->db->where('id',$companyid)
				        ->update('companys',$company);
	}
	public function update_question($questionid,Array $question)
	{
		return $this->db->where('qid',$questionid)
				        ->update('question',$question);
	}
	public function del($id)
	{
		return $this->db->delete('companys',['id'=>$id]);

	}
	public function delete($qid)
	{
		return $this->db->delete('question',['qid'=>$qid]);

	}
}

?>