<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_The extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getRandom(){
		$sql = "SELECT * FROM the WHERE TrangThai = 1 ORDER BY RAND() LIMIT 12";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getByIdPost($mabaiviet){
		$sql = "SELECT the.* FROM baiviet_the, baiviet, the WHERE baiviet_the.MaBaiViet = baiviet.MaBaiViet AND baiviet_the.Mathe = the.Mathe AND baiviet.MaBaiViet = ? GROUP BY the.Mathe ORDER BY Mathe DESC";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result->result_array();
	}
}

/* End of file Model_The.php */
/* Location: ./application/models/Model_The.php */