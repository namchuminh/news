<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LienHe extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($hoten,$email,$sodienthoai,$tieude,$noidung){
		$data = array(
	        "HoTen" => $hoten,
	        "Email" => $email,
	        "SoDienThoai" => $sodienthoai,
	        "TieuDe" => $tieude,
	        "NoiDung" => $noidung
	    );

	    $this->db->insert('lienhe', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

}

/* End of file Model_LienHe.php */
/* Location: ./application/models/Model_LienHe.php */