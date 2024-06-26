<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BaiViet extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getRecent(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 4 ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTop(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 GROUP BY baiviet.MaBaiViet ORDER BY baiviet.LuotXem DESC LIMIT 4";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getHomePostMain(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.HienThiTrangChu = 1 GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getHomePostSmall(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.HienThiTrangChu = 2 GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 2";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTrending(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.LoaiBaiViet = 2 GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 12";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getCategoryHome(){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND HienThiTrangChu >= 1 AND ChuyenMucCha IS NULL ORDER BY MaChuyenMuc";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getByIdCategory($machuyenmuc){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND chuyenmuc.MaChuyenMuc = ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 5";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result->result_array();
	}

	public function getByIdCategoryParent($machuyenmuc){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND (chuyenmuc.MaChuyenMuc = ? OR chuyenmuc.ChuyenMucCha = ?) GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 5";
		$result = $this->db->query($sql, array($machuyenmuc, $machuyenmuc));
		return $result->result_array();
	}

	public function getByIdCategoryParentTopView($machuyenmuc){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND (chuyenmuc.MaChuyenMuc = ? OR chuyenmuc.ChuyenMucCha = ?) GROUP BY baiviet.MaBaiViet ORDER BY baiviet.LuotXem DESC LIMIT 5";
		$result = $this->db->query($sql, array($machuyenmuc, $machuyenmuc));
		return $result->result_array();
	}

	public function getByIdCategoryParentPopular($machuyenmuc){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.LoaiBaiViet = 3 AND (chuyenmuc.MaChuyenMuc = ? OR chuyenmuc.ChuyenMucCha = ?) GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 5";
		$result = $this->db->query($sql, array($machuyenmuc, $machuyenmuc));
		return $result->result_array();
	}

	public function getByIdCategoryParentHot($machuyenmuc){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.LoaiBaiViet = 4 AND (chuyenmuc.MaChuyenMuc = ? OR chuyenmuc.ChuyenMucCha = ?) GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 5";
		$result = $this->db->query($sql, array($machuyenmuc, $machuyenmuc));
		return $result->result_array();
	}

	public function getPopular(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND (baiviet.LoaiBaiViet = 3 OR baiviet.LoaiBaiViet = 4) GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 9";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getNews(){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1  GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT 7";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function search($tieude, $start = 0, $end = 8){
		$tieude = "%".$tieude."%";
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.TieuDe LIKE ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($tieude, $start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($tieude){
		$tieude = "%".$tieude."%";
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.TieuDe LIKE ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC";
		$result = $this->db->query($sql, array($tieude));
		return $result->num_rows();
	}

	public function time($thoigian, $start = 0, $end = 8){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND DATE(baiviet.ThoiGian) = ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($thoigian, $start, $end));
		return $result->result_array();
	}

	public function checkNumberTime($thoigian){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND DATE(baiviet.ThoiGian) = ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet DESC";
		$result = $this->db->query($sql, array($thoigian));
		return $result->num_rows();
	}

	public function detail($duongdan){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM, chuyenmuc.MaChuyenMuc FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.DuongDan = ? GROUP BY baiviet.MaBaiViet";
		$result = $this->db->query($sql, array($duongdan));
		return $result->result_array();
	}

	public function getRelated($machuyenmuc,$mabaiviet){
		$sql = "SELECT baiviet.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanCM FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND chuyenmuc.MaChuyenMuc = ? AND baiviet.MaBaiViet != ? GROUP BY baiviet.MaBaiViet ORDER BY RAND() LIMIT 9";
		$result = $this->db->query($sql, array($machuyenmuc, $mabaiviet));
		return $result->result_array();
	}

	public function getPrevPost($machuyenmuc, $mabaiviet){
		$sql = "SELECT baiviet.* FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.MaBaiViet < ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet ASC LIMIT 1";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result->result_array();
	}

	public function getNextPost($machuyenmuc, $mabaiviet){
		$sql = "SELECT baiviet.* FROM baiviet, chuyenmuc, baiviet_chuyenmuc WHERE baiviet_chuyenmuc.MaBaiViet = baiviet.MaBaiViet AND baiviet_chuyenmuc.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND baiviet.TrangThai = 1 AND baiviet.MaBaiViet > ? GROUP BY baiviet.MaBaiViet ORDER BY baiviet.MaBaiViet ASC LIMIT 1";
		$result = $this->db->query($sql, array($mabaiviet));
		return $result->result_array();
	}

}

/* End of file Model_BaiViet.php */
/* Location: ./application/models/Model_BaiViet.php */