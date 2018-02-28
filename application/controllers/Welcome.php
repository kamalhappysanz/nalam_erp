<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('loginmodel');
		$this->load->model('salesmodel');
		$this->load->helper('url');
		$this->load->library('session');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function home()
	{
		$datas=$this->session->userdata();

		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			$this->load->view('admin_header');
			$this->load->view('dashboard');
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}


	}


	public function login()
	{
		$this->load->view('login');
	}
	public function calender()
	{
		$this->load->view('admin_header');
		$this->load->view('admin/calender');
		$this->load->view('admin_footer');

	}
	public function dashboard(){
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
}
