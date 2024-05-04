<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class The extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_The');
	}

	public function index()
	{
		$totalRecords = $this->Model_The->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_The->getAll();
		$data['title'] = "Loại thẻ bài viết";
		return $this->load->view('Admin/View_The', $data);
	}

	public function page($trang){
		$data['title'] = "Loại thẻ bài viết";
		$totalRecords = $this->Model_The->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/loai-the/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/loai-the/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_The->getAll();
			return $this->load->view('Admin/View_The', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_The->getAll($start);
			return $this->load->view('Admin/View_The', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm Loại thẻ bài viết";
		$data['category'] = $this->Model_The->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenthe = $this->input->post('tenthe');
			$duongdan = $this->input->post('duongdan');
			$hienthiwidget = $this->input->post('hienthiwidget');

			if(empty($tenthe) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemThe', $data);
			}

			if(($hienthiwidget != 1) && ($hienthiwidget != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị thẻ trên widget!";
				return $this->load->view('Admin/View_ThemThe', $data);
			}

			if(count($this->Model_The->checkSlug($duongdan)) >= 1){
				$data['error'] = "Đường dẫn của thẻ đã tồn tại!";
				return $this->load->view('Admin/View_ThemThe', $data);
			}

			$this->Model_The->add($tenthe,$duongdan,$hienthiwidget);

			$this->session->set_flashdata('success', 'Thêm thẻ thành công!');
			return redirect(base_url('admin/loai-the/'));
		}
		return $this->load->view('Admin/View_ThemThe', $data);
	}

	public function update($mathe)
	{
		if(count($this->Model_The->getById($mathe)) <= 0){
			$this->session->set_flashdata('error', 'Thẻ không tồn tại!');
			return redirect(base_url('admin/loai-the/'));
		}

		$data['title'] = "Cập nhật thẻ bài viết";
		$data['detail'] = $this->Model_The->getById($mathe);
		$data['category'] = $this->Model_The->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenthe = $this->input->post('tenthe');
			$duongdan = $this->input->post('duongdan');
			$hienthiwidget = $this->input->post('hienthiwidget');

			if(empty($tenthe) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaThe', $data);
			}

			if(($hienthiwidget != 1) && ($hienthiwidget != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị thẻ trên widget!";
				return $this->load->view('Admin/View_SuaThe', $data);
			}

			$this->Model_The->update($tenthe,$duongdan,$hienthiwidget,$mathe);
			$data['success'] = "Cập nhật thẻ thành công!";
			$data['detail'] = $this->Model_The->getById($mathe);
			return $this->load->view('Admin/View_SuaThe', $data);
		}

		return $this->load->view('Admin/View_SuaThe', $data);
	}



	public function delete($mathe)
	{
		if(count($this->Model_The->getById($mathe)) <= 0){
			$this->session->set_flashdata('error', 'Loại thẻ không tồn tại!');
			return redirect(base_url('admin/loai-the/'));
		}
		$this->Model_The->delete($mathe);
		$this->Model_The->deleteParentId($mathe);

		$this->session->set_flashdata('success', 'Xóa Loại thẻ thành công!');
		return redirect(base_url('admin/loai-the/'));
	}

	public function search(){
		if(!isset($_GET['tenthe']) && !isset($_GET['hienthiwidget'])){
			return redirect(base_url('admin/loai-the/'));
		}

		$tenthe = $this->input->get('tenthe');
		$hienthiwidget = $this->input->get('hienthiwidget');

		if(empty($tenthe) && empty($hienthiwidget)){
			return redirect(base_url('admin/loai-the/'));
		}

		
		$data['post'] = array(
			'tenthe' => $tenthe,
			'hienthiwidget' => $hienthiwidget
		);

		if(empty($tenthe)){
			$tenthe = -99999;
		}

		if(empty($hienthiwidget)){
			$hienthiwidget = -99999;
		}

		if($hienthiwidget == -1){
			$hienthiwidget = 0;
		}

		$totalRecords = $this->Model_The->checkNumberSearch($tenthe,$hienthiwidget);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_The->search($tenthe,$hienthiwidget);
		$data['title'] = "Loại thẻ bài viết";
		return $this->load->view('Admin/View_TheTimKiem', $data);
	}

	public function pageSearch($trang)
	{
		if(!isset($_GET['tenthe']) && !isset($_GET['hienthiwidget'])){
			return redirect(base_url('admin/loai-the/'));
		}

		$tenthe = $this->input->get('tenthe');
		$hienthiwidget = $this->input->get('hienthiwidget');

		if(empty($tenthe) && empty($hienthiwidget)){
			return redirect(base_url('admin/loai-the/'));
		}

		
		$data['post'] = array(
			'tenthe' => $tenthe,
			'hienthiwidget' => $hienthiwidget,
		);

		if(empty($tenthe)){
			$tenthe = -99999;
		}

		if(empty($hienthiwidget)){
			$hienthiwidget = -99999;
		}

		if($hienthiwidget == -1){
			$hienthiwidget = 0;
		}

		$data['title'] = "Loại thẻ bài viết";
		$totalRecords = $this->Model_The->checkNumberSearch($tenthe,$hienthiwidget);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/loai-the/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/loai-the/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_The->search($tenthe,$hienthiwidget);
			return $this->load->view('Admin/View_TheTimKiem', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_The->search($tenthe,$hienthiwidget,$start);
			return $this->load->view('Admin/View_TheTimKiem', $data);
		}
	}
}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */