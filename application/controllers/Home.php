<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_t_product');
		//$this->load->model('Model_t_category');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
        //$this->output->cache(10); // penyimpanan cache dalam hitungan menit
		$data['page'] = 'Home';
		$data['product_dis'] = $this->Model_t_product->discount(0); //produk diskon
		$data['terlaris'] = $this->Model_t_product->terlaris(12); // terlaris limit 12
		$this->load->view('home/index',$data);
	}
}
