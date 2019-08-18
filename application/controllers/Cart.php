<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('Model_t_product');
		//$this->load->model('Model_t_category');
		date_default_timezone_set('Asia/Jakarta');
	}

	function index()
	{
        $this->load->view('cart/index');
    }
}
