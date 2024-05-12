<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_NguoiDung extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($MaNguoiDung){
		$sql = "SELECT * FROM nguoidung WHERE MaNguoiDung = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaNguoiDung));
		return $result->result_array();
	}
}

/* End of file Model_NguoiDung.php */
/* Location: ./application/models/Model_NguoiDung.php */