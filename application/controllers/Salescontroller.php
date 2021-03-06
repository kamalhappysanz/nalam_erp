<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salescontroller extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('salesmodel');
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
			$this->load->view('admin/sales/daily_sales',$datas);
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}
	}

		public function daily_sales_report(){

			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_role');
			if($user_id){
				$product_id=$this->input->post('product_id');
				$sales_date=$this->input->post('sales_date');
				$units=$this->input->post('units');
				$price=$this->input->post('price');
				$comments=$this->input->post('comments');
				$datas=$this->salesmodel->daily_sales_report($user_id,$product_id,$sales_date,$units,$price,$comments);

			}else{
				redirect('welcome/login');
			}
		}


		public function view(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_role');
			if($user_id){
				$this->load->view('admin_header');
				$this->load->view('admin/sales/get_sales_date',$datas);
				$this->load->view('admin_footer');
			}else{
				redirect('welcome/login');
			}
		}

		public function date_wise_sales(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_role');
			if($user_id){
				$sales_date=$this->input->post('sales_date');
				$datas['res']=$this->salesmodel->date_wise_sales($sales_date);
				$datas['total']=$this->salesmodel->date_wise_sales_total($sales_date);
				$datas['total_sales']=$this->salesmodel->total_sales_of_day($sales_date);
				$datas['sales_date']=$sales_date;
				$this->load->view('admin_header');
				$this->load->view('admin/sales/date_wise_view',$datas);
				$this->load->view('admin_footer');
			}else{
				redirect('welcome/login');
			}
		}

		public function month_wise_sales(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_role');
			if($user_id){
				$sales_month=$this->input->post('sales_month');
				$sales_year=$this->input->post('sales_year');
				$datas['res']=$this->salesmodel->month_wise_sales($sales_month,$sales_year);
				$datas['total']=$this->salesmodel->month_wise_sales_total($sales_month,$sales_year);
				$datas['day_sales']=$this->salesmodel->day_sales($sales_month,$sales_year);
				$datas['total_sales']=$this->salesmodel->total_sales_of_month($sales_month,$sales_year);
				$datas['sales_month']=$sales_month;
				$datas['sales_year']=$sales_year;
				$this->load->view('admin_header');
				$this->load->view('admin/sales/date_wise_view',$datas);
				$this->load->view('admin_footer');
			}else{
				redirect('welcome/login');
			}
		}


		public function get_daywise_sales_list(){
			$datas['res']=$this->salesmodel->get_daywise_sales();
			echo json_encode($datas['res']);
		}

		public function delete_sales_id(){
			 $id=$this->input->post('id');
			 $datas['res']=$this->salesmodel->delete_sales_id($id);

		}

		public function get_price_for_product(){
			 $id=$this->input->post('selected_val');
			  $datas['res']=$this->productmodel->get_price_for_product($id);
		}

		public function update_sales_id(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_role');
			if($user_id){
				 $id=$this->input->post('id');
				 $product_units=$this->input->post('product_units');
				 $product_price=$this->input->post('product_price');
				 $datas['res']=$this->salesmodel->update_sales_id($id,$product_units,$product_price);

			}else{

			}
		}



}
