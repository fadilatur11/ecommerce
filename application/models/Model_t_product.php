<?php
/**
* 
*/
class Model_t_product extends CI_Model
{
	
	protected $_table = 'product';

	function discount($discount)
	{
		$this->db->select('category_sector.id,category_sector.name_cat,product.id as idp,product.category_id,product.seller_id,product.name,product.condition,product.price,product.discount,product.price_dis,product.view,product.sold');
        $this->db->join('category_sector','product.category_id = category_sector.id');
		$this->db->where_not_in('discount',$discount);
		$this->db->order_by('id_artikel', 'random');
		return $this->db->get($this->_table)->result_array();
    }

    function terlaris($limit)
    {
        $this->db->join('category_sector','product.category_id = category_sector.id');
        $this->db->limit($limit);
		$this->db->order_by('sold', 'desc');
		return $this->db->get($this->_table)->result_array();
	}
	
	function search($category,$keyword)
	{
		$this->db->join('category_sector','product.category_id = category_sector.id');
		$this->db->where('category_id',$category);
		$this->db->like('name',$keyword);
		$this->db->order_by('sold', 'desc');
		return $this->db->get($this->_table)->result_array();
	}

	function search_all($keyword)
	{
		$this->db->join('category_sector','product.category_id = category_sector.id');
		$this->db->like('name',$keyword);
		$this->db->order_by('sold', 'desc');
		return $this->db->get($this->_table)->result_array();
	}

	function countsearch($category,$keyword)
	{
		$this->db->join('category_sector','product.category_id = category_sector.id');
		$this->db->where('category_id',$category);
		$this->db->like('name',$keyword);
		$this->db->order_by('sold', 'desc');
		return $this->db->from($this->_table)->count_all_results();
	}

	function countsearch_all($keyword)
	{
		$this->db->join('category_sector','product.category_id = category_sector.id');
		$this->db->like('name',$keyword);
		$this->db->order_by('sold', 'desc');
		return $this->db->from($this->_table)->count_all_results();
	}

	function product($id)
	{
		$this->db->select('category_sector.id,category_sector.name_cat,product.id as idp,product.category_id,product.seller_id,product.name,product.condition,product.price,product.discount,product.price_dis,product.view,product.sold,product.stock,product.description');
		$this->db->join('category_sector','product.category_id = category_sector.id');
		$this->db->where('product.id',$id);
		return $this->db->get($this->_table)->row_array();
    }
}
