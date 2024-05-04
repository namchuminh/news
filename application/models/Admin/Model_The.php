<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_The extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tenthe,$duongdan,$hienthiwidget){
		$data = array(
	        "TenThe" => $tenthe,
	        "DuongDan" => $duongdan,
	        "HienThiWidget" => $hienthiwidget
	    );

	    $this->db->insert('the', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM the WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM the WHERE TrangThai = 1 ORDER BY MaThe DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaThe){
		$sql = "SELECT * FROM the WHERE MaThe = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaThe));
		return $result->result_array();
	}

	public function update($tenthe,$duongdan,$hienthiwidget,$mathe){
		$sql = "UPDATE the SET TenThe = ?, DuongDan = ?, HienThiWidget = ? WHERE MaThe = ?";
		$result = $this->db->query($sql, array($tenthe,$duongdan,$hienthiwidget,$mathe));
		return $result;
	}

	public function delete($mathe){
		$sql = "UPDATE the SET TrangThai = 0 WHERE MaThe = ?";
		$result = $this->db->query($sql, array($MaThe));
		return $result;
	}

	public function checkSlug($duongdan){
		$sql = "SELECT * FROM the WHERE DuongDan = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($duongdan));
		return $result->result_array();
	}

	public function search($tenthe,$hienthiwidget, $start = 0, $end = 10){
		$tenthe = "%".$tenthe."%";
		$sql = "SELECT * FROM the WHERE TrangThai = 1 AND (TenThe LIKE ? OR HienThiWidget = ?) ORDER BY MaThe DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($tenthe,$hienthiwidget,$start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($tenthe,$hienthiwidget){
		$tenthe = "%".$tenthe."%";
		$sql = "SELECT * FROM the WHERE TrangThai = 1 AND (Tenthe LIKE ? OR HienThiWidget = ?)";
		$result = $this->db->query($sql, array($tenthe,$hienthiwidget));
		return $result->num_rows();
	}

}

/* End of file Model_the.php */
/* Location: ./application/models/Model_the.php */