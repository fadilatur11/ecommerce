<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_t_product');
		//$this->load->model('Model_t_category');
		date_default_timezone_set('Asia/Jakarta');
	}

	function index($category,$id,$title)
	{
        //$this->output->cache(5); // penyimpanan cache dalam hitungan menit
		$data['page'] = 'Product';
		$data['product'] = $this->Model_t_product->product($id);
		$this->load->view('product/index',$data);
	}
	
	function cart($id)
	{
		$product = $this->Model_t_product->product($id);
        if ($product['discount'] != 0) {
            $data = array(
                'id' => $product['id'],
                'qty' => 1,
                'price' => $product['price_dis'],
                'name' => $product['name']
            );
        }else {
            $data = array(
                'id' => $product['id'],
                'qty' => 1,
                'price' => $product['price'],
                'name' => $product['name']
            );
        }
		$this->cart->insert($data);
		echo $this->show();
	}

	function show()
    {
        $data = $this->cart->contents();
        echo "<pre>";
        print_r($data);
    }

    function destroy()
    {
        $this->cart->destroy();
        redirect('home');
    }
}
