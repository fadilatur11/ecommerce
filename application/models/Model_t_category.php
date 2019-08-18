<?php
/**
* 
*/
class Model_t_category extends CI_Model
{
	
	protected $_table = 'category_sector';

	function category()
	{
		$this->db->order_by('name_cat', 'asc');
		return $this->db->get($this->_table)->result_array();
    }
}
