<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BaiViet extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tieude,$noidung,$manguoidung,$anhchinh,$duongdan,$hienthitrangchu,$hienthiwidget,$loaibaiviet){
		$data = array(
	        "TieuDe" => $tieude,
	        "NoiDung" => $noidung,
	        "MaNguoiDung " => $manguoidung,
	        "AnhChinh " => $anhchinh,
	        "DuongDan " => $duongdan,
	        "HienThiTrangChu " => $hienthitrangchu,
	        "HienThiWidget " => $hienthiwidget,
	        "LoaiBaiViet " => $loaibaiviet
	    );

	    $this->db->insert('baiviet', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM baiviet WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM baiviet WHERE TrangThai = 1 ORDER BY MaBaiViet DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($Mabaiviet){
		$sql = "SELECT * FROM baiviet WHERE MaBaiViet = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($Mabaiviet));
		return $result->result_array();
	}

	public function update($tieude,$noidung,$anhchinh,$duongdan,$hienthitrangchu,$hienthiwidget,$loaibaiviet,$mabaiviet){
		$sql = "UPDATE `baiviet` SET `TieuDe`=?,`NoiDung`=?,`AnhChinh`=?,`DuongDan`=?,`HienThiTrangChu`=?,`HienThiWidget`=?,`LoaiBaiViet`=? WHERE `MaBaiViet`=?";
		$result = $this->db->query($sql, array($tieude,$noidung,$anhchinh,$duongdan,$hienthitrangchu,$hienthiwidget,$loaibaiviet,$mabaiviet));
		return $result;
	}

	public function delete($mabaiviet){
		$sql = "UPDATE baiviet SET TrangThai = 0 WHERE MaBaiViet = ?";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result;
	}

	public function checkSlug($duongdan){
		$sql = "SELECT * FROM baiviet WHERE DuongDan = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($duongdan));
		return $result->result_array();
	}

	public function search($tieude,$loaibaiviet,$thoigian, $start = 0, $end = 1){
		$tieude = "%".$tieude."%";
		$sql = "SELECT * FROM baiviet WHERE TrangThai = 1 AND (TieuDe LIKE ? OR LoaiBaiViet = ? OR DATE(ThoiGian) = ?) ORDER BY MaBaiViet DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($tieude,$loaibaiviet,$thoigian,$start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($tieude,$loaibaiviet,$thoigian){
		$tieude = "%".$tieude."%";
		$sql = "SELECT * FROM baiviet WHERE TrangThai = 1 AND (TieuDe LIKE ? OR LoaiBaiViet = ? OR DATE(ThoiGian) = ?)";
		$result = $this->db->query($sql, array($tieude,$loaibaiviet,$thoigian));
		return $result->num_rows();
	}

	public function checkCategoryPost($mabaiviet, $machuyenmuc){
		return $this->db->query('SELECT * FROM `baiviet_chuyenmuc` WHERE MaBaiViet = ? AND MaChuyenMuc = ?', array($mabaiviet, $machuyenmuc))->result_array();
	}

	public function checkTagPost($mabaiviet, $mathe){
		return $this->db->query('SELECT * FROM `baiviet_the` WHERE MaBaiViet = ? AND MaThe = ?', array($mabaiviet, $mathe))->result_array();
	}

	public function getCategoryPost($mabaiviet){
		$sql = "SELECT chuyenmuc.* FROM baiviet_chuyenmuc, chuyenmuc WHERE baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet_chuyenmuc.MaBaiViet = ?";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result->result_array();
	}

	public function insertCategoryPost($mabaiviet, $machuyenmuc){
		$data = array(
	        "MaBaiViet" => $mabaiviet,
	        "MaChuyenMuc" => $machuyenmuc
	    );

	    $this->db->insert('baiviet_chuyenmuc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function getTagPost($mabaiviet){
		$sql = "SELECT the.* FROM baiviet_the, the WHERE baiviet_the.MaThe = the.MaThe AND baiviet_the.MaBaiViet = ?";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result->result_array();
	}

	public function insertTagPost($mabaiviet, $mathe){
		$data = array(
	        "MaBaiViet" => $mabaiviet,
	        "MaThe" => $mathe
	    );

	    $this->db->insert('baiviet_the', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function deleteCategoryPost($mabaiviet){
		$sql = "DELETE FROM `baiviet_chuyenmuc` WHERE MaBaiViet = ?";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result;
	}

	public function deleteTagPost($mabaiviet){
		$sql = "DELETE FROM `baiviet_the` WHERE MaBaiViet = ?";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result;
	}
}

/* End of file Model_BaiViet.php */
/* Location: ./application/models/Model_BaiViet.php */