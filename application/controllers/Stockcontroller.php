<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockcontroller extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('stocksmodel');
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
			$datas['res']=$this->productmodel->list_of_products_active();
			$this->load->view('admin_header');
			$this->load->view('admin/stocks/add_stocks',$datas);
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}
	}

	public function view()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			$datas['res']=$this->stocksmodel->list_of_purchase();
			$this->load->view('admin_header');
			$this->load->view('admin/stocks/view_purchase',$datas);
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}
	}

	public function add_stocks(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			$purchase_date=$this->input->post('purchase_date');
			$item_name=$this->input->post('item_name');
			$item_units=$this->input->post('item_units');
			$item_price=$this->input->post('item_price');
			$total_price=$this->input->post('total_price');
			$comments=$this->input->post('comments');
			$datas=$this->stocksmodel->add_stocks($purchase_date,$item_name,$item_units,$item_price,$total_price,$comments,$user_id);
		}else{
			redirect('welcome/login');
		}
	}


	public function update_purchase_id(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_role');
		if($user_id){
			 $id=$this->input->post('id');
			 $item_name=$this->input->post('item_name');
			 $item_price=$this->input->post('item_price');
			 $item_units=$this->input->post('item_units');
			 $total_price=$this->input->post('total_price');
			 $comments=$this->input->post('comments');
			 $datas['res']=$this->stocksmodel->update_purchase_id($id,$item_name,$item_price,$item_units,$total_price,$comments,$user_id);
		}else{

		}
	}









}
