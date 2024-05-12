<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaiViet extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_BaiViet');
		$this->load->model('Web/Model_ChuyenMuc');
		$this->load->model('Web/Model_The');
		$this->load->model('Web/Model_NguoiDung');
		$this->load->model('Web/Model_BinhLuan');
	}

	public function index()
	{
		if(isset($_GET['timkiem'])){
			$data['title'] = "Tìm kiếm: " . $_GET['timkiem'];
			$totalRecords = $this->Model_BaiViet->checkNumberSearch($_GET['timkiem']);
			$recordsPerPage = 8;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BaiViet->search($_GET['timkiem']);
			$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
			$data['recent'] = $this->Model_BaiViet->getRecent();
			$data['tagRandom'] = $this->Model_The->getRandom();
			$data['search'] = $_GET['timkiem'];
			return $this->load->view('Web/View_BaiViet', $data);
		}

		if(isset($_GET['thoigian'])){
			$data['title'] = "Thời gian: " . $_GET['thoigian'];
			$totalRecords = $this->Model_BaiViet->checkNumberTime($_GET['thoigian']);
			$recordsPerPage = 8;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BaiViet->time($_GET['thoigian']);
			$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
			$data['recent'] = $this->Model_BaiViet->getRecent();
			$data['tagRandom'] = $this->Model_The->getRandom();
			$data['time'] = $_GET['thoigian'];
			return $this->load->view('Web/View_BaiViet', $data);
		}
	}

	public function page($trang){
		if(isset($_GET['timkiem'])){
			$data['title'] = "Tìm kiếm: " . $_GET['timkiem'];
			$totalRecords = $this->Model_BaiViet->checkNumberSearch($_GET['timkiem']);
			$recordsPerPage = 8;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
			$data['recent'] = $this->Model_BaiViet->getRecent();
			$data['tagRandom'] = $this->Model_The->getRandom();
			$data['search'] = $_GET['timkiem'];
			if($trang < 1){
				return redirect(base_url('bai-viet/?timkiem='.$_GET['timkiem']));
			}

			if($trang > $totalPages){
				return redirect(base_url('bai-viet/?timkiem='.$_GET['timkiem']));
			}

			$start = ($trang - 1) * $recordsPerPage;


			if($start == 0){
				$data['totalPages'] = $totalPages;
				$data['list'] = $this->Model_BaiViet->search($_GET['timkiem']);
				return $this->load->view('Web/View_BaiViet', $data);
			}else{
				$data['totalPages'] = $totalPages;
				$data['list'] = $this->Model_BaiViet->search($_GET['timkiem'],$start);
				return $this->load->view('Web/View_BaiViet', $data);
			}
		}

		if(isset($_GET['thoigian'])){
			$data['title'] = "Thời gian: " . $_GET['thoigian'];
			$totalRecords = $this->Model_BaiViet->checkNumberTime($_GET['thoigian']);
			$recordsPerPage = 8;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
			$data['recent'] = $this->Model_BaiViet->getRecent();
			$data['tagRandom'] = $this->Model_The->getRandom();
			$data['time'] = $_GET['thoigian'];
			if($trang < 1){
				return redirect(base_url('bai-viet/?thoigian='.$_GET['thoigian']));
			}

			if($trang > $totalPages){
				return redirect(base_url('bai-viet/?thoigian='.$_GET['thoigian']));
			}

			$start = ($trang - 1) * $recordsPerPage;


			if($start == 0){
				$data['totalPages'] = $totalPages;
				$data['list'] = $this->Model_BaiViet->time($_GET['thoigian']);
				return $this->load->view('Web/View_BaiViet', $data);
			}else{
				$data['totalPages'] = $totalPages;
				$data['list'] = $this->Model_BaiViet->time($_GET['thoigian'],$start);
				return $this->load->view('Web/View_BaiViet', $data);
			}
		}
	}

	public function detail($duongdan){
		if(!isset($_GET['thoigian']) && !isset($_GET['timkiem'])){

			$data['title'] = $this->Model_BaiViet->detail($duongdan)[0]['TieuDe'];
			$data['detail'] = $this->Model_BaiViet->detail($duongdan);
			$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
			$data['recent'] = $this->Model_BaiViet->getRecent();
			$data['tagRandom'] = $this->Model_The->getRandom();
			$data['related'] = $this->Model_BaiViet->getRelated($this->Model_BaiViet->detail($duongdan)[0]['MaChuyenMuc']);
			$data['admin'] = $this->Model_NguoiDung->getById($this->Model_BaiViet->detail($duongdan)[0]['MaNguoiDung']);
			$data['comment'] = $this->Model_BinhLuan->getByPostId($this->Model_BaiViet->detail($duongdan)[0]['MaBaiViet']);
			return $this->load->view('Web/View_ChiTietBaiViet', $data);
		}
	}

}

/* End of file BaiViet.php */
/* Location: ./application/controllers/BaiViet.php */