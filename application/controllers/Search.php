<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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
		$data['page'] = 'Search';
		$keyword = $this->input->post('keyword');
		$category = $this->input->post('category');
		if ($category != NULL && $keyword != NULL) {
			$data['datasearch'] = $this->Model_t_product->search($category,$keyword); //search with category and keyword
			$data['countdata'] = $this->Model_t_product->countsearch($category,$keyword); //  menghitung jumlah data hasil search
		}else{
			$data['datasearch'] = $this->Model_t_product->search_all($keyword); // search all categories
			$data['countdata'] = $this->Model_t_product->countsearch_all($keyword);
		}
		$this->load->view('search/index',$data);
	}
}
