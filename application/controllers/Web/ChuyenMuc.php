<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChuyenMuc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_ChuyenMuc');
		$this->load->model('Web/Model_BaiViet');
		$this->load->model('Web/Model_The');
	}

	public function index($duongdan)
	{
		$data['title'] = $this->Model_ChuyenMuc->getBySlug($duongdan)[0]['TenChuyenMuc'];
		$totalRecords = $this->Model_ChuyenMuc->checkNumber($duongdan);
		$recordsPerPage = 8;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getAllList($duongdan);
		$data['slug'] = $duongdan;
		$data['detail'] = $this->Model_ChuyenMuc->getBySlug($duongdan);
		$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
		$data['recent'] = $this->Model_BaiViet->getRecent();
		$data['tagRandom'] = $this->Model_The->getRandom();
		return $this->load->view('Web/View_BaiViet', $data);
	}

	public function page($duongdan,$trang)
	{
		$data['title'] = $this->Model_ChuyenMuc->getBySlug($duongdan)[0]['TenChuyenMuc'];
	    $totalRecords = $this->Model_ChuyenMuc->checkNumber($duongdan);
		$recordsPerPage = 8;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['slug'] = $duongdan;
		$data['detail'] = $this->Model_ChuyenMuc->getBySlug($duongdan);
		$data['listRandom'] = $this->Model_ChuyenMuc->getRandom();
		$data['recent'] = $this->Model_BaiViet->getRecent();
		$data['tagRandom'] = $this->Model_The->getRandom();
		if($trang < 1){
			return redirect(base_url('chuyen-muc/'.$duongdan.'/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('chuyen-muc/'.$duongdan.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllList($duongdan);
			return $this->load->view('Web/View_BaiViet', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllList($duongdan,$start);
			return $this->load->view('Web/View_BaiViet', $data);
		}
	}

}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */