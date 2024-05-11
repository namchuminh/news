<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_BaiViet');
		$this->load->model('Web/Model_ChuyenMuc');
		$this->load->model('Web/Model_GiaoDien');
	}

	public function index()
	{
		$data['title'] = "Trang chủ tin tức mới!";
		$data['recent'] = $this->Model_BaiViet->getRecent();
		$data['top'] = $this->Model_BaiViet->getTop();
		$data['postMain'] = $this->Model_BaiViet->getHomePostMain();
		$data['postSmall'] = $this->Model_BaiViet->getHomePostSmall();
		$data['trending'] = $this->Model_BaiViet->getTrending();
		$data['categoryHome'] = $this->Model_BaiViet->getCategoryHome();
		$data['popular'] = $this->Model_BaiViet->getPopular();
		$data['news'] = $this->Model_BaiViet->getNews();
		$data['bannerLogo'] = $this->Model_GiaoDien->getByType(1);
		$data['bannerMid'] = $this->Model_GiaoDien->getByType(2);
		$data['bannerWidget'] = $this->Model_GiaoDien->getByType(3);
		return $this->load->view('Web/View_TrangChu', $data);
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */