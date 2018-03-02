<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

function __construct()
{
	parent::__construct();
	$this->load->model('loginmodel');
	$this->load->model('salesmodel');
	$this->load->helper('url');
	$this->load->library('session');

}

public function home()
{
	$username=$this->input->post('username');
	$password=md5($this->input->post('pwd'));


	$result = $this->loginmodel->login($username,$password);

	 $msg=$result['msg'];

	if($result['status']=='Deactive')
	{
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', 'Account Deactivated');
		redirect('welcome/login');
	}

	if($result['status']=='notRegistered')
	{
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', 'Invalid Login');
		redirect('welcome/login');
	}
	if($result['status']=='emailverfiy')
	{
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', 'You have to Verify your Email to login');
		redirect('welcome/login');
	}

	$user_type=$this->session->userdata('user_role');
	 $user_type1=$result['user_role'];

		if($result['status']=='Y')
		{
			switch($user_type1)
			{
				case '1':
				     $user_name=$result['user_name'];$msg=$result['msg'];$mobile_no=$result['mobile_no'];$email_id=$result['email_id'];$status=$result['status'];$id=$result['id'];$user_role=$result['user_role'];

					$datas= array("user_name"=>$user_name, "msg"=>$msg,"mobile_no"=>$mobile_no,"email_id"=>$email_id,"status"=>$status,"id"=>$id,"user_role"=>$user_role,);
					//$this->session->userdata($user_name);
					$session_data=$this->session->set_userdata($datas);
					redirect('adminlogin/dashboard');
				break;
				case '2':
				     $user_name=$result['user_name'];$msg=$result['msg'];$mobile_no=$result['mobile_no'];$email_id=$result['email_id'];$status=$result['status'];$id=$result['id'];$user_role=$result['user_role'];

					$datas= array("user_name"=>$user_name, "msg"=>$msg,"mobile_no"=>$mobile_no,"email_id"=>$email_id,"status"=>$status,"id"=>$id,"user_role"=>$user_role,);
					//$this->session->userdata($user_name);
					$session_data=$this->session->set_userdata($datas);


					$this->load->view('admin_header',$datas);
					$this->load->view('welcome/home',$datas);
					$this->load->view('admin_footer');

				break;
				case '3':
				     $user_name=$result['user_name'];$msg=$result['msg'];$mobile_no=$result['mobile_no'];$email_id=$result['email_id'];$status=$result['status'];$id=$result['id'];$user_role=$result['user_role'];

					$datas= array("user_name"=>$user_name, "msg"=>$msg,"mobile_no"=>$mobile_no,"email_id"=>$email_id,"status"=>$status,"id"=>$id,"user_role"=>$user_role,);
					//$this->session->userdata($user_name);
					$session_data=$this->session->set_userdata($datas);




				break;
				case '4':
				  $user_name=$result['user_name'];$msg=$result['msg'];$mobile_no=$result['mobile_no'];$email_id=$result['email_id'];$status=$result['status'];$id=$result['id'];$user_role=$result['user_role'];

					$datas= array("user_name"=>$user_name, "msg"=>$msg,"mobile_no"=>$mobile_no,"email_id"=>$email_id,"status"=>$status,"id"=>$id,"user_role"=>$user_role,);
					//$this->session->userdata($user_name);
					$session_data=$this->session->set_userdata($datas);


						 $this->load->view('admin_header',$datas);
	 					$this->load->view('welcome/home',$datas);
	 					$this->load->view('admin_footer');
				break;
			}
		}
	elseif($msg=="Password Wrong"){
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', 'Password Wrong');
		redirect('welcome/login');
	}	elseif($msg=="emailverfiy"){
			$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
			$this->session->set_flashdata('msg', 'You have to Verify your Email to login');
			redirect('welcome/login');
		}
	else{
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', 'Email invalid');
		redirect('welcome/login');
	}
}




public function dashboard()
{
	$datas=$this->session->userdata();
	$user_id=$this->session->userdata('id');
	$user_role=$this->session->userdata('user_role');
	
	if($user_id){
		
			$datas['today_sales_res']=$this->salesmodel->today_sales_list();
			$datas['previous_day_sales_list']=$this->salesmodel->previous_day_sales_list();
			$datas['this_week_sales_list']=$this->salesmodel->this_week_sales_list();
			$datas['current_month_sales_list']=$this->salesmodel->current_month_sales_list();
		$this->load->view('admin_header');
		$this->load->view('dashboard',$datas);
		$this->load->view('admin_footer');
	}else{
		redirect('welcome/login');
	}
}

public function logout()
{
	$datas=$this->session->userdata();
	$this->session->unset_userdata($datas);
	$this->session->sess_destroy();
	redirect('/');
}












}
