<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BinhLuan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($mabaiviet,$hoten,$email,$noidung,$thoigian){
		$data = array(
	        "MaBaiViet" => $mabaiviet,
	        "HoTen" => $hoten,
	        "Email" => $email,
	        "NoiDung" => $noidung,
	        "ThoiGian" => $thoigian,
	    );

	    $this->db->insert('binhluan', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function getByPostId($MaBaiViet){
		$sql = "SELECT * FROM binhluan WHERE MaBaiViet = ?";
		$result = $this->db->query($sql, array($MaBaiViet));
		return $result->result_array();
	}

}

/* End of file Model_BinhLuan.php */
/* Location: ./application/models/Model_BinhLuan.php */