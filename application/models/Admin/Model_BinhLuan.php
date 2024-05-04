<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BinhLuan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber()
	{
		$sql = "SELECT binhluan.*, baiviet.TieuDe, baiviet.DuongDan FROM binhluan, baiviet WHERE binhluan.TrangThai = 1 AND binhluan.MaBaiViet = baiviet.MaBaiViet";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT binhluan.*, baiviet.TieuDe, baiviet.DuongDan FROM binhluan, baiviet WHERE binhluan.TrangThai = 1 AND binhluan.MaBaiViet = baiviet.MaBaiViet ORDER BY binhluan.MaBinhLuan DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaBinhLuan){
		$sql = "SELECT binhluan.*, baiviet.TieuDe, baiviet.DuongDan FROM binhluan, baiviet WHERE binhluan.TrangThai = 1 AND binhluan.MaBaiViet = baiviet.MaBaiViet AND binhluan.MaBinhLuan = ?";
		$result = $this->db->query($sql, array($MaBinhLuan));
		return $result->result_array();
	}


	public function delete($MaBinhLuan){
		$sql = "UPDATE binhluan SET TrangThai = 0 WHERE MaBinhLuan = ?";
		$result = $this->db->query($sql, array($MaBinhLuan));
		return $result;
	}

	public function search($tieude, $thoigian, $start = 0, $end = 10){
		$tieude = "%".$tieude."%";
		$sql = "SELECT binhluan.*, baiviet.TieuDe, baiviet.DuongDan FROM binhluan, baiviet WHERE binhluan.TrangThai = 1 AND binhluan.MaBaiViet = baiviet.MaBaiViet AND (baiviet.tieude LIKE ? OR DATE(binhluan.ThoiGian) = ?) ORDER BY binhluan.MaBinhLuan DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($tieude, $thoigian, $start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($tieude, $thoigian){
		$tieude = "%".$tieude."%";
		$sql = "SELECT binhluan.*, baiviet.TieuDe, baiviet.DuongDan FROM binhluan, baiviet WHERE binhluan.TrangThai = 1 AND binhluan.MaBaiViet = baiviet.MaBaiViet AND (baiviet.tieude LIKE ? OR DATE(binhluan.ThoiGian) = ?)";
		$result = $this->db->query($sql, array($tieude, $thoigian));
		return $result->num_rows();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */