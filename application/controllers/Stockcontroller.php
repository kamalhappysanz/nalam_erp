<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockcontroller extends CI_Controller {


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
			$this->load->view('admin/stocks/add_stocks',$datas);
			$this->load->view('admin_footer');
		}else{
			redirect('welcome/login');
		}
	}











}
