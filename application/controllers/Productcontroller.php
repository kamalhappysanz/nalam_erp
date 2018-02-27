<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productcontroller extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('productmodel');
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
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){

			$datas['res']=$this->productmodel->list_of_products();

			$this->load->view('admin_header');
			$this->load->view('admin/products/add',$datas);
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}
	}

	public function home()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			$datas['res']=$this->productmodel->list_of_products();
			$this->load->view('admin_header');
			$this->load->view('dashboard',$datas);
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}

	}


	public function check_product_name()
	{
		$product_name=$this->input->post('product_name');
		$data=$this->productmodel->check_product_name($product_name);

	}
	public function check_product_short_code()
	{
		$product_short_code=$this->input->post('product_short_code');
		$data=$this->productmodel->check_product_short_code($product_short_code);

	}
	public function check_product_name_exist()
	{
		 $id=$this->uri->segment(3);
		$product_name=$this->input->post('product_name');
		$data=$this->productmodel->check_product_name_exist($product_name,$id);

	}
	public function check_product_short_exist()
	{
		$id=$this->uri->segment(3);
		$product_short_code=$this->input->post('product_short_code');
		$data=$this->productmodel->check_product_short_exist($product_short_code,$id);

	}

	public function create_product()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			$product_name=$this->input->post('product_name');
			$product_short_code=$this->input->post('product_short_code');
			$status=$this->input->post('status');
			$data=$this->productmodel->create_product($product_name,$product_short_code,$status,$user_id);

		}else{

		}

	}

	public function save_product()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			$product_name=$this->input->post('product_name');
			$product_id=$this->input->post('product_id');
			$product_short_code=$this->input->post('product_short_code');
			$status=$this->input->post('status');
			$data=$this->productmodel->save_product($product_name,$product_short_code,$status,$user_id,$product_id);

		}else{

		}

	}

	public function get_product_id($product_id){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
				$datas['res']=$this->productmodel->get_product_id($product_id);
				$this->load->view('admin_header');
				$this->load->view('admin/products/edit',$datas);
				$this->load->view('admin_footer');
		}else{

		}
	}



}
