<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ChuyenMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber($duongdan)
	{
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND chuyenmuc.DuongDan = ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC";
		$result = $this->db->query($sql, array($duongdan));
		return $result->num_rows();
	}

	public function getAllList($duongdan, $start = 0, $end = 8){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND chuyenmuc.DuongDan = ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($duongdan, $start, $end));
		return $result->result_array();
	}

	public function getBySlug($duongdan){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND DuongDan = ?";
		$result = $this->db->query($sql, array($duongdan));
		return $result->result_array();
	}

	public function getRandom(){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 ORDER BY RAND() LIMIT 6";
		$result = $this->db->query($sql);
		return $result->result_array();
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

	public function getAllDisplay(){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND ChuyenMucCha IS NULL ORDER BY MaChuyenMuc DESC LIMIT 6";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getByIdPost($mabaiviet){
		$sql = "SELECT chuyenmuc.* FROM baiviet_chuyenmuc, baiviet, chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.MaBaiViet = ? GROUP BY chuyenmuc.MaChuyenMuc ORDER BY MaChuyenMuc DESC";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result->result_array();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */