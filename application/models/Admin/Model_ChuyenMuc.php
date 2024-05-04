<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ChuyenMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tenchuyenmuc,$duongdan,$hinhanh,$hienthitrenmenu,$chuyenmuccha,$hienthitrangchu,$hienthiwidget){
		$data = array(
	        "TenChuyenMuc" => $tenchuyenmuc,
	        "DuongDan" => $duongdan,
	        "AnhChinh" => $hinhanh,
	        "HienThiMenu" => $hienthitrenmenu,
	        "ChuyenMucCha" => $chuyenmuccha,
	        "HienThiTrangChu" => $hienthitrangchu,
	        "HienThiWidget" => $hienthiwidget
	    );

	    $this->db->insert('chuyenmuc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 ORDER BY MaChuyenMuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaChuyenMuc){
		$sql = "SELECT * FROM chuyenmuc WHERE MaChuyenMuc = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaChuyenMuc));
		return $result->result_array();
	}

	public function update($tenchuyenmuc,$duongdan,$hinhanh,$hienthitrenmenu,$chuyenmuccha,$hienthitrangchu,$hienthiwidget,$machuyenmuc){
		$sql = "UPDATE chuyenmuc SET TenChuyenMuc = ?, DuongDan = ?, AnhChinh = ?, HienThiMenu = ?, ChuyenMucCha = ?, HienThiTrangChu = ?, HienThiWidget = ? WHERE MaChuyenMuc = ?";
		$result = $this->db->query($sql, array($tenchuyenmuc,$duongdan,$hinhanh,$hienthitrenmenu,$chuyenmuccha,$hienthitrangchu,$hienthiwidget,$machuyenmuc));
		return $result;
	}

	public function delete($machuyenmuc){
		$sql = "UPDATE chuyenmuc SET TrangThai = 0 WHERE MaChuyenMuc = ?";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result;
	}

	public function checkSlug($duongdan){
		$sql = "SELECT * FROM chuyenmuc WHERE DuongDan = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($duongdan));
		return $result->result_array();
	}

	public function deleteParentId($chuyenmuccha){
		$sql = "UPDATE chuyenmuc SET ChuyenMucCha = NULL WHERE ChuyenMucCha = ?";
		$result = $this->db->query($sql, array($chuyenmuccha));
		return $result;
	}

	public function search($tenchuyenmuc, $hienthitrenmenu,$hienthitrangchu,$hienthiwidget, $start = 0, $end = 10){
		$tenchuyenmuc = "%".$tenchuyenmuc."%";
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND (TenChuyenMuc LIKE ? OR HienThiMenu = ? OR HienThiTrangChu = ? OR HienThiWidget = ?) ORDER BY MaChuyenMuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget,$start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget){
		$tenchuyenmuc = "%".$tenchuyenmuc."%";
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND (TenChuyenMuc LIKE ? OR HienThiMenu = ? OR HienThiTrangChu = ? OR HienThiWidget = ?)";
		$result = $this->db->query($sql, array($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget));
		return $result->num_rows();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */