<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ChuyenMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND HienThiMenu = 1 ORDER BY MaChuyenMuc DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getByIdParent($machuyenmuc){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND ChuyenMucCha = ? ORDER BY TenChuyenMuc ASC";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result->result_array();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */